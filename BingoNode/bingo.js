var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Promise = require("bluebird");
var randomNumber = require("random-number-csprng");
var mysql = require('mysql');
var he = require('he');
//const util = require('util');

var baseBingoArr = Array.from({length: 75}, (v, k) => k+1);
var bingoArr = baseBingoArr.slice();
shuffle(bingoArr);
var bingoPast = [];
var bingoNum = null;
//var limit = "0:15";
var timerSecs = 15;
var timerLimit = null;
var timer = null;
var gameNo = null;

/*
Status:
0: not started yet
1: starting counter
2: in progress
3: paused (general)
4: paused (bingo called)
5: ended 18002900886
*/
var bingoStatus = 0;
var clientList = {};
var clientChat = [];
/*
var con = mysql.createConnection({
  host: "localhost",
  database: "bingo",
  user: "",
  password: ""
});

con.connect(function(err) {
  if (err) throw err;
  console.log("MySQL Connected!");
  con.query("SELECT COALESCE(MAX(gameNo),0)+1 maxGameNo FROM numbers", function (err, result, fields) {
    if (err) throw err;
    gameNo = result[0].maxGameNo;
  });
});
*/

var gameNo = 1;

/*
app.get('/', function(req, res){
	res.sendFile(__dirname + '/index.html');
});
*/
io.on('connection', function(socket){
	let bclientID  = socket.handshake.query.id;
	let clientID   = bclientID;
	let clientName = socket.handshake.query.name;

	// console.log('a user connected: ' + socket.handshake.query.name + ' (' + socket.handshake.query.id + ')');

	let i = 0;
	do {
		clientID = bclientID + '_' + i;
		i++;
	}
	while (clientID in clientList);

	socket.handshake.query.id = clientID;
	clientList[clientID] = {baseID: bclientID, name: clientName + (clientID.substr(-1) !== '0' ? ' (' + (parseInt(clientID.substr(-1))+1) + ')' : ''), calledBingo: false, hasRow: false, hasCross: false, has4C: false, hasBoard: false};

	// Tell all participants that someone has joined
	io.emit('BingoPlayers', 'add', clientID, clientList[clientID]);

	//console.log('Updated to: ' + socket.handshake.query.name + ' (' + socket.handshake.query.id + ')');
	//console.log('Client List: ' + util.inspect(clientList, false, null));

	// Tell the person joining what the current status is, what the past numbers are and who is currently joined
	socket.emit('BingoInit', {status: bingoStatus, round: gameNo, speed: timerSecs}, bingoPast, clientList, clientChat);
	//console.log('PastNums: ' + util.inspect(bingoPast, false, null));

	if (bingoStatus > 0)
		socket.emit('BingoNum', bingoNum);

	// Tell everyone when someone disconnects, and remove them from the active list
	socket.on('disconnect', function(){
		io.emit('BingoPlayers', 'drop', socket.handshake.query.id);
		delete clientList[socket.handshake.query.id];
		//console.log(socket.handshake.query.id + ' disconnected');
		//console.log('Client List: ' + util.inspect(clientList, false, null));
	});

	// Handle commands sent from the clients
	socket.on('BingoCmd', function(cmd, callback){

		// Player Chat
		if (cmd === 'BingoChat') {
			let msgTxt = he.decode(callback.replace(/<[^>]+>/g, ''));
			let msg    = null;
			if (msgTxt.substr(0,5) === 'admin')
				msg = { id: 'admin', author: 'ADMIN', msg: msgTxt.substr(5,250) };
			else
				msg = { id: socket.handshake.query.id, author: clientList[socket.handshake.query.id].name, msg: msgTxt.substr(0,250) };

			if (clientChat.length > 50)
				clientChat.shift();
			clientChat.push(msg);
			io.emit('BingoChat', msg);
		// Reset the game (admin function)
		} else if (cmd === 'BingoReset') {
			gameNo++;

			if (gameNo == 4) {
				bingoArr = baseBingoArr.slice(0,15).concat(baseBingoArr.slice(60));
			} else if (gameNo == 3) {
				bingoArr = baseBingoArr.slice(0,30).concat(baseBingoArr.slice(45));
			} else {
				bingoArr = baseBingoArr.slice();
			}

			shuffle(bingoArr);

			for (let clientID in clientList) {
				clientList[clientID].calledBingo = false;
				clientList[clientID].hasRow      = false;
				clientList[clientID].hasCross    = false;
				clientList[clientID].has4C       = false;
				clientList[clientID].hasBoard    = false;
			}

			bingoPast = [];
			bingoNum = null;
			timerLimit = null;
			changeStatus(0);
			if (timer !== null)
				clearTimeout(timer);
			//bingoStatus = 1
			//bingoTimer();

		// Start the game (admin function)
		} else if (cmd === 'BingoStart') {
			changeStatus(1);
			if (timer !== null)
				clearTimeout(timer);
			
			if (gameNo !== null)
				bingoTimer();
			//bingoStatus = 2

		// Pause (admin function)
		} else if (cmd === 'BingoPause') {
			changeStatus(3);
			//bingoStatus = 3;

		// Unpause (admin function)
		} else if (cmd === 'BingoUnpause') {
			changeStatus(2);
			timerLimit = null;
			//bingoStatus = 3;

		// Pause (to verify bingo card) - someone called bingo. Notify everyone
		} else if (cmd === 'CallBingo') {
			clientList[socket.handshake.query.id].calledBingo = true;
			console.log(socket.handshake.query.id + " (" + clientList[socket.handshake.query.id].name + ") has called Bingo! => " + (new Date().toLocaleString()+' .'+new Date().getMilliseconds()));
			changeStatus(4, socket.handshake.query.id);
			//bingoStatus = 4;
			//io.emit('BingoCalled', socket.handshake.query.id);

		} else if (cmd === 'BingoGetCalls') {
			//console.log('admin is requesting a call list');
			callback(clientList);

		} else if (cmd === 'VerifyList') {
			//console.log('Verify Winners: ' + util.inspect(callback, false, null));

			for (let bclientID in callback) {
				//console.log(bclientID + ": row: " + callback[bclientID].row + " | cross: " + callback[bclientID].cross + " | board: " + callback[bclientID].board);

				if (!callback.hasOwnProperty(bclientID)) continue;

				let obj = callback[bclientID];
				//if (obj.row || obj.cross || obj.board) {
					for (let clientID in clientList) {
						//console.log("    " + clientID + " in CL: ");
						if (bclientID === clientList[clientID].baseID) {
							//console.log("        -matches, Update!");
							clientList[clientID].calledBingo = false;
							if (obj.row)   clientList[clientID].hasRow   = true;
							if (obj.cross) clientList[clientID].hasCross = true;
							if (obj['4c']) clientList[clientID].has4C    = true;
							if (obj.board) clientList[clientID].hasBoard = true;
						}
					}
				//}
			}

			io.emit('BingoWinners', clientList);
		} else if (cmd === 'ChangeTiming') {
			//console.log('Set timer to ' + callback);
			timerSecs = callback;
		}
	});
});

http.listen(8080, function(){
	console.log('listening on *:8080');
});

function changeStatus(newStatus, miscVal = null) {
	bingoStatus = newStatus;
	io.emit('BingoStatus', {status: bingoStatus, round: gameNo, speed: timerSecs}, miscVal);
}

function bingoTimer() {
	if (timerLimit === null) {
    	//timerLimit = limit.split(":");
		//timerLimit = timerLimit[0]*60 + timerLimit[1]*1 + 1;
		timerLimit = timerSecs;
	}

//var log = '';

	if (bingoStatus === 0) {
//log += "not started | tl: " + timerLimit;
	} else if (bingoStatus === 3) {
//log += "paused | tl: " + timerLimit;
	} else if (bingoStatus === 4) {
//log += "paused (bingo called) | tl: " + timerLimit;
	} else if (bingoStatus === 5) {
//log += "game ended | tl: " + timerLimit;
	} else {

	if (bingoStatus === 1) {
//log += "initiating | tl: " + timerLimit;
	} else if (bingoStatus === 2) {
//log += "in progress | tl: " + timerLimit;
	}

	    if (timerLimit === 1) {
//log += " | ==1";

			if (bingoArr.length === 1) {
				bingoPast.push(bingoNum);
				bingoNum = bingoArr[0];
			    io.emit('BingoNum', bingoNum);
			    changeStatus(5);
			    //bingoStatus = 5;
//console.log (log + " | last Num: " + bingoNum + " | status: " + bingoStatus);
				bingoPast.push(bingoNum);

			    con.query('INSERT INTO numbers SET ?', {gameNo:gameNo,number:bingoNum}, function (error, results, fields) {
				  if (error) throw error;
				});
			    return;
			}

			Promise.try(function() {
			    return randomNumber(0, bingoArr.length - 1);
			}).then(function(number) {
				//number = randomNumber(0, bingoArr.length - 1);

				if (bingoNum !== null)
					bingoPast.push(bingoNum);

				bingoNum = bingoArr.splice(number, 1)[0];

				if (bingoStatus !== 2)
					changeStatus(2);

//log += " | num: " + bingoNum;

			    io.emit('BingoNum', bingoNum);
			    io.emit('BingoTimer', '0:00');

			    con.query('INSERT INTO numbers SET ?', {gameNo:gameNo,number:bingoNum}, function (error, results, fields) {
				  if (error) throw error;
				});

			}).catch({code: "RandomGenerationError"}, function(err) {
				console.log("Something went wrong! Trying Again...");
			});

	    	//timerLimit = limit.split(":");
			//timerLimit = timerLimit[0]*60 + timerLimit[1]*1 + 1;
			timerLimit = timerSecs;
	    } else {
//log += " | >1";
		    timerLimit -= 1;
		    var curmin = Math.floor(timerLimit/60);
		    var cursec = timerLimit % 60;
		    var curtime = curmin + ":";
		    if (cursec < 10)
		        curtime += "0";
		    curtime += cursec;
		    io.emit('BingoTimer', curtime);
		}
	}
//console.log(log);
    timer = setTimeout(function(){bingoTimer();}, 1000);
}

function shuffle(a) {
    for (let i = a.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [a[i], a[j]] = [a[j], a[i]];
    }
    return a;
}

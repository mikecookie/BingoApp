<?php

	//$stringArr = array('v92ei','glt7n','x3sm0','6phdk','706co','20p6q','gjdez','umftf','tapy2','r7c00','jmzqy','p68xf','ggks6','9sy0n','nu8op','pd82w','4okyn','dckwx','benv9','w0h89','d5pux','8exxo','f1csk','3u0ku','92zlr','bbekn','k3wl3','6qnf0','iein9','mnfrt','yhvxf','h0068','2lr9a','hc7jn','ur65d','8ekbe','mh0v4','rrib1','fh3nx','9nyuj','i4tce','66qle','2kuc6','03ekx','p0tac','8peyn','g3ppx','tjqyj','bvvj4','ifx0r');
	//$nameArr = array(array('Michele','Santana'),array('Youssef','Bowers'),array('Kurt','Miranda'),array('Valentina','Davison'),array('Darcey','O\'Neill'),array('Kareena','Williams'),array('Leoni','Yoder'),array('Kelise','Mosley'),array('Jaskaran','Glass'),array('Afsana','Ferrell'),array('Abiha','Penn'),array('Annabelle','Aguilar'),array('Lillian','Cameron'),array('Nicole','Pollard'),array('Amani','Jensen'),array('Rudy','Dickson'),array('Ailsa','Lewis'),array('Zaina','Rollins'),array('Branden','Stanton'),array('Arley','Cooke'),array('Charly','Blackwell'),array('Dale','Read'),array('Murat','Rodriquez'),array('Finley','Keller'),array('Abida','Massey'),array('Aayat','Bone'),array('Dorothy','Powell'),array('Milena','Fry'),array('Seth','Friedman'),array('Brody','Aldred'),array('Mahira','Kouma'),array('Maison','Lindsey'),array('Murtaza','Petty'),array('Kamron','Le'),array('Iwan','Black'),array('Renesmee','Potts'),array('Donovan','Coleman'),array('Lacey-May','Lawrence'),array('Oriana','Buckner'),array('Zakaria','Salgado'),array('Fynley','Humphrey'),array('Alexis','Padilla'),array('Keyaan','Terry'),array('Malaika','Nava'),array('Alaina','Welch'),array('Hadiya','Edge'),array('Jia','Sellers'),array('Izabela','Burt'),array('Kaia','Branch'),array('Dora','Mccann'));

	//$randInt = random_int(0,49);
	//$randStr = $stringArr[$randInt];
	//$randFName = $nameArr[$randInt][0];
	//$randLName = $nameArr[$randInt][1];

	//$randStr = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),0,5);
	//$randFName = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),0,1) . substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'),0,rand(5,10));
	//$randLName = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),0,1) . substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'),0,rand(5,10));

  $user = 'ah283';

	if (isset($_REQUEST['public'])) {
		$user = 'public';
	}

	$admin = false;
	if ($user === 'ah283')
		$admin = true; //rand(0,1); //true;

?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Bingo App</title>
<style type="text/css">

body {
    font-family: Calibri;
    white-space: nowrap;
}

#BingoNum {
	font-size: 150pt;
	font-family: Gungsuh;
	font-weight: bold;
	width:100%;
	height:229px;
	text-align:center;
}

.leftDiv {
	//background: cyan;
	float: left;
	overflow: hidden;
	min-width: 400px;
}

.midDiv {
	//margin-top: 20px;
	//background: pink;
	float:left;
	overflow: hidden;
	padding: 0px 20px 20px 20px;
	width: 156px;
}

.rightDiv {
	//background: yellow;
	overflow: hidden;
	margin-left: 20px;
}

.bingoCall {
	border: 3px solid #000;

    font-size: 26pt;
    font-weight: bold;
    border-radius: 25px;

	width: 150px;
	height: 150px;
	margin: auto;
	display: flex;
	text-align: center;
	justify-content: center; /* align horizontal */
	align-items: center; /* align vertical */
}

div.pastNum {
  width: 100%;
  text-align: center;
  border-collapse: collapse;
}
.divTable.pastNum .divTableCell, .divTable.pastNum .divTableHead {
}
.divTable.pastNum .divTableBody .divTableCell {
  height: 30px;
  font-size: 20px;
}
.pNum {
    margin: 0 auto;
    width: 30px;
}
.pNum.picked {
    font-weight: bold;
    border: 1px solid #000;
    background-color: rgba(255, 255, 0, .75);
    border-radius: 12px;
}
.pNum.picked.l5 {
	background-color: rgba(255, 204, 0, .75);
}
.pNum.picked.l4 {
	background-color: rgba(255, 153, 0, .75);
}
.pNum.picked.l3 {
	background-color: rgba(255, 102, 0, .75);
}
.pNum.picked.l2 {
	background-color: rgba(255, 51, 0, .75);
}
.pNum.picked.l1 {
	background-color: rgba(255, 0, 0, .75);
}

.divTable.pastNum .divTableHeading {
}
.divTable.pastNum .divTableHeading .divTableHead {
  font-size: 35px;
  font-weight: bold;
  text-align: center;
}
.divTable{ display: table; }
.divTableRow { display: table-row; }
.divTableHeading { display: table-header-group;}
.divTableCell, .divTableHead { display: table-cell; vertical-align: middle;}
.divTableHeading { display: table-header-group;}
.divTableBody { display: table-row-group;}

.bingoChat  {
	font-size: 16pt;
    font-weight: bold;
    border: 1px solid #000;
    border-radius: 10px;
    margin: 10px;
    text-align: center;
}

.chatMsg {
    width: 100%;
    white-space: normal;
    border-bottom: 1px dashed #ccc;
}

.chatAuthor {
    font-weight:bold;
}

.HeaderMenu {
	border: 2px solid #000;
	margin-bottom: 20px;
	font-size: 14pt;
    font-weight: bold;
    border-radius: 25px;
}

<?php 
if ($admin) {
?>

.AdminMenu {
	border: 2px solid #000;
	margin-top: 20px;
	font-size: 14pt;
    font-weight: bold;
    border-radius: 25px;
}

.bingoReset, .bingoStart, .bingoPause, .bingoUnpause, .bingoVerify, .bingoVerifySave, .bingoTimingBut  {
	font-size: 16pt;
    font-weight: bold;
    border: 1px solid #000;
    border-radius: 10px;
    margin: 10px;
    text-align: center;
}

.bingoTimingTxt  {
    text-align: center;
    margin-left: 10px;
    margin-bottom: 10px;
    width:35px;
    height:18px;
}

/* Modal Content/Box */
.modal-content {
	display: none; /* Hidden by default */
    background-color: #fefefe;
    border: 3px solid #aaa;
    border-radius: 25px;
    padding: 2px 5px 10px 5px;
    z-index: 1;

    position: fixed;
    top: 200px;
    left: 50%;
    width: 710px;
    margin-left: -300px;
    //height: 400px;
    //margin-top: 200px;
}

.verify-container {
	display: grid;
	display: -ms-grid;
	grid-template-columns: auto auto auto auto auto auto;
	-ms-grid-columns: auto 8px auto 8px auto 8px auto 8px auto 8px auto;
	-ms-grid-rows: auto;
	margin: auto;
	width: 687px;
	grid-gap: 8px;
	padding: 0px;
}

.verify-container > div {
	font-size: 12pt;
    border: 1px solid #ccc;
    border-radius: 3px;
    height: 25px;
	display: flex;
	text-align: center;
	justify-content: center; /* align horizontal */
	align-items: center; /* align vertical */
}

.verify-container > div.sm {
	width: 90px;
}

.verify-container > div.lg {
	width: 190px;
}

.verify-container > div.but {
	background-image: url(images/redx.png);
	background-size: auto 80%;
	background-repeat: no-repeat;
	background-position: center; 
}

.verify-container > div.but2 {
	background-color: red;
}

.verify-container > div.sel {
	background-image: url(images/greencheck.png);
}

.verify-container > div.hdr {
  font-size: 16pt;
  border: 1px solid #000;
  border-radius: 10px;
  font-weight:bold;
  background: #ccc;
}

<?php 
}
?>

.disabled {
	background: #ddd;
	color: #888;
}

.bingoAdminMO {
	background: #888;
	color: #fff;
	border-color: #888;
	cursor: pointer;
}

.bingoCallMO {
	background: #f00;
	color: #ff0;
	border-color: #ff0;
	cursor: pointer;
}

.headerText {
	background: #ccc;
	border-radius: 10px;
	padding: 3px;
	padding-left:15px;
	font-weight:bold;
	font-size: 18pt;
}

.r {
	color:red;
}

.cssanimation, .cssanimation span {
    animation-duration: 1s;
    animation-fill-mode: both;
}

.cssanimation span { display: inline-block }

.leFlyInBottom span { animation-name: leFlyInBottom }
@keyframes leFlyInBottom {
    0% {
        transform: translate(0px, 80px);
        opacity: 0
    }
    50% {
        transform: translate(10px, -50px);
        animation-timing-function: ease-in-out
    }
}

input[type=text] {
	padding:5px;
	border:2px solid #ccc; 
	-webkit-border-radius: 5px;
    border-radius: 5px;
    font-family: Calibri;
    font-size: 18px;
}
input[type=text]:focus {border-color:#333; }

div.adminMsg {
	color:#f00;
}

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript">
var socket;
var bingoStatus;
var last5Nums = [];

$(document).ready(function() {
	$(function () {
		socket = io('ws://bingo-node-svr-bingoapp.apps.ca-central-1.starter.openshift-online.com:80', { transports: ['websocket'], query: { id: '<?=$randStr?>', name: '<?=$randFName?> <?=$randLName?>'} });
    
		socket.on('BingoTimer', function(msg){
			$('#bingoStatus').text('Next Number in: ' + msg);
		});

		socket.on('BingoChat', function (msg){
			$('#bingoChat').append('<div class="chatMsg'+(msg.id==='admin'?' adminMsg':'')+'"><span class="chatAuthor">'+msg.author+':</span> '+msg.msg+'</div>').animate({ scrollTop: $('#bingoChat').prop("scrollHeight")}, 1000);
		});

/*
Status:
0: not started yet
1: starting counter
2: in progress
3: paused (general)
4: paused (bingo called)
5: ended
*/

		// Handle various status changes:
		socket.on('BingoStatus', function(gameInfo, miscVar) {
//console.log("BingoStatus: => " + newStatus); // {status: bingoStatus, round: gameNo, speed: timerSecs}
			bingoStatus = gameInfo.status;
			updateRound(gameInfo.round);
			handleStatus(miscVar);
		});

		// Server sets a bingoStatus message on first join
		socket.on('BingoInit', function(gameInfo, bingoPast, clientList, clientChat) {
//console.log("BingoInit: => " + currentStatus + ": update bingoPast & clientlist");  // {status: bingoStatus, round: gameNo, speed: timerSecs}
//console.log(clientList);
			bingoStatus = gameInfo.status;
			updateRound(gameInfo.round);
			handleStatus(null);

			if (bingoStatus > 0) {
				for (let i=bingoPast.length-1; i>=0; i--) {
					$("#pn"+bingoPast[i]).addClass('picked');
					updateLastFive(bingoPast[i]);
				}
				lastFiveCSS();
			}

			$.each(clientList, function (clientID, clientData) {
				if ( clientID.substr(0,6)!=='public' && !$("#" + clientID).length )
					$("#clientList").append("<li " + (clientData.calledBingo ? 'class="r" ' : '') + "id='" + clientID + "' cB='" + clientData.calledBingo*1 + "' hR='" + (clientData.hasRow*1 + clientData.hasCross*1 + clientData.has4C*1 + clientData.hasBoard*1) + "'>" + clientData.name + (clientData.calledBingo ? ' - Called BINGO!' : '') + "</li>");
			});

			$("#clientList li").sort(sortPlayers).appendTo("#clientList");
			$.each(clientChat, function (idx, msg) {
				$('#bingoChat').append('<div class="chatMsg'+(msg.id==='admin'?' adminMsg':'')+'"><span class="chatAuthor">'+msg.author+':</span> '+msg.msg+'</div>');
			});
			$('#bingoChat').animate({ scrollTop: $('#bingoChat').prop("scrollHeight")}, 1000);
		});

		// Change to the # of players
		socket.on('BingoPlayers', function (change, clientID, clientData) {
//console.log("BingoPlayers: " + change + " " + clientID + " (" + clientData.name + ")");
			if (change === 'add') {
				if ( clientID.substr(0,6)!=='public' && !$("#" + clientID).length )
					$("#clientList").append("<li " + (clientData.calledBingo ? 'class="r" ' : '') + "id='" + clientID + "' cB='" + clientData.calledBingo*1 + "' hR='" + (clientData.hasRow*1 + clientData.hasCross*1 + clientData.has4C*1 + clientData.hasBoard*1) + "'>" + clientData.name + (clientData.calledBingo ? ' - Called BINGO!' : '') + "</li>");
			} else if (change === 'drop') {
				$("#" + clientID).remove();
			}
			$("#clientList li").sort(sortPlayers).appendTo("#clientList");
		});

		// Update all players
		socket.on('BingoWinners', function (clientList) {

			$("#clientList li:contains(' -')").each(function(item) {
				$(this).text($(this).text().substr(0,$(this).text().indexOf(" -")));
			}).removeClass('r');

			$.each(clientList, function (clientID, clientData) {
				if ( clientID.substr(0,6)!=='public' && !$("#" + clientID).length )
					$("#clientList").append("<li id='" + clientID + "' cB='" + clientData.calledBingo*1 + "' hR='" + (clientData.hasRow*1 + clientData.hasCross*1 + clientData.has4C*1 + clientData.hasBoard*1) + "'>" + clientData.name + "</li>");
				else {
					if ('calledBingo' in clientData) {
						if (clientData.calledBingo) {
							$("li[id^=" + clientID.substr(0,5) + "]").each(function(item){
								$(this).text($(this).text() + ' - Called BINGO!').attr('cB',1);
							}).addClass('r');
						} else {
							if (clientData.hasRow && clientData.hasCross && clientData.hasBoard) {
								$("li[id^=" + clientID.substr(0,5) + "]").each(function(item){
									$(this).text($(this).text() + ' - Has a line, an \'X\' and the board!')
								}).addClass('r');
							} else if (clientData.hasRow && clientData.hasCross) {
								$("li[id^=" + clientID.substr(0,5) + "]").each(function(item){
									$(this).text($(this).text() + ' - Has a line and an \'X\'!')
								}).addClass('r');
							} else if (clientData.hasRow && clientData.hasBoard) {
								$("li[id^=" + clientID.substr(0,5) + "]").each(function(item){
									$(this).text($(this).text() + ' - Has a line and the board!')
								}).addClass('r');
							} else if (clientData.hasCross && clientData.hasBoard) {
								$("li[id^=" + clientID.substr(0,5) + "]").each(function(item){
									$(this).text($(this).text() + ' - Has an \'X\' and the board!')
								}).addClass('r');
							} else if (clientData.hasRow) {
								$("li[id^=" + clientID.substr(0,5) + "]").each(function(item){
									$(this).text($(this).text() + ' - Has a line!')
								}).addClass('r');
							} else if (clientData.hasCross) {
								$("li[id^=" + clientID.substr(0,5) + "]").each(function(item){
									$(this).text($(this).text() + ' - Has an \'X\'!')
								}).addClass('r');
							} else if (clientData.has4C) {
								$("li[id^=" + clientID.substr(0,5) + "]").each(function(item){
									$(this).text($(this).text() + ' - Has 4 Corners!')
								}).addClass('r');
							} else if (clientData.hasBoard) {
								$("li[id^=" + clientID.substr(0,5) + "]").each(function(item){
									$(this).text($(this).text() + ' - Has a board!')
								}).addClass('r');
							}
						}
					}
				}
			});
			$("#clientList li").sort(sortPlayers).appendTo("#clientList");
			$("#clientList li[cB=1],li[hR!=0]").addClass('r');
			$("#clientList").parent().animate({ scrollTop: 0}, 1000);

		});

		// New Bingo number received
		socket.on('BingoNum', function(bingoNum){
			if (bingoNum === null)
				return;

			updateLastFive(bingoNum);

			$("#pn"+bingoNum).addClass('picked');
			lastFiveCSS();

			$('#BingoNum').text();

			animateBingoNum(getBingoNum(bingoNum));
		});

		
	});

	$(document).on("mouseenter mouseleave click", ".bingoCall", function(event) {
		if (!(bingoStatus === 2 || bingoStatus === 4)) {
			$(this).removeClass("bingoCallMO");
			return;
		}

		if (event.type === 'click')
			socket.emit('BingoCmd', 'CallBingo');
        else if (event.type === 'mouseenter')
            $(this).addClass("bingoCallMO");
        else
            $(this).removeClass("bingoCallMO");
	});

	$(document).on("click", ".bingoChat", function(event) {
		if ($(".bingoChat").hasClass('disabled'))
			return;
		else
			sendChat();
	});

	$(document).on("mouseenter mouseleave", ".bingoChat", function(event) {
		if (event.type === 'mouseenter')
            $(this).addClass("bingoAdminMO");
        else
            $(this).removeClass("bingoAdminMO");
	});

	$('#BingoChatTxt').keypress(function(event){
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if (keycode == '13')
			sendChat();

	});

<?php 
if ($admin) {
?>
	$(document).on("mouseenter mouseleave", ".bingoReset, .bingoStart, .bingoPause, .bingoUnpause, .bingoVerify, .bingoVerifySave, .bingoTimingBut", function(event) {
		if ($(event.target).hasClass('disabled')) {
			$(this).removeClass("bingoAdminMO");
			return;
		}

		if (event.type === 'mouseenter')
            $(this).addClass("bingoAdminMO");
        else
            $(this).removeClass("bingoAdminMO");
	});

	$(document).on("click", ".bingoReset", function(event) {
		if ($(".bingoReset").hasClass('disabled'))
			return;
		else if (confirm("Are you sure you wish to reset the game to the start?"))
			socket.emit('BingoCmd', 'BingoReset');
	});

	$(document).on("click", ".bingoStart", function(event) {
		if ($(".bingoStart").hasClass('disabled'))
			return;
		else
			socket.emit('BingoCmd', 'BingoStart');
	});

	$(document).on("click", ".bingoUnpause", function(event) {
		if ($(".bingoUnpause").hasClass('disabled'))
			return;
		else
			socket.emit('BingoCmd', 'BingoUnpause');
	});

	$(document).on("click", ".bingoPause", function(event) {
		if ($(".bingoPause").hasClass('disabled'))
			return;
		else
			socket.emit('BingoCmd', 'BingoPause');
	});

	$(document).on("click", ".bingoTimingBut", function(event) {
		socket.emit('BingoCmd', 'ChangeTiming', $('.bingoTimingTxt').val());
	});

	$(document).on("click", ".bingoVerify", function(event) {
		if ($(".bingoVerify").hasClass('disabled'))
			return;
		else {
			socket.emit('BingoCmd', 'BingoGetCalls', function(data){
				$('.verify-container > div:gt(5)').remove();
				$('.verify-container').css('grid-rows', 'auto')
				let rNum = 3;
				$.each(data, function (key, val) {
					if ('calledBingo' in val && val.calledBingo) {
						if(!$(".verify-container > div:gt(5)[client^=" + key.substr(0,5) + "]").length) {
							$('.verify-container').css('grid-rows', $('.verify-container').css('grid-rows') + ' 8px auto');
							$('.verify-container').append(
								$('<div style="-ms-grid-row:' + rNum + ';-ms-grid-column:1;" client="' + key.substr(0,5) + '">' + val.name + '</div><div style="-ms-grid-row:' + rNum + ';-ms-grid-column:3;" class="but"></div><div style="-ms-grid-row:' + rNum + ';-ms-grid-column:5;" class="but"></div><div style="-ms-grid-row:' + rNum + ';-ms-grid-column:7;" class="but"></div><div style="-ms-grid-row:' + rNum + ';-ms-grid-column:9;" class="but"></div><div style="-ms-grid-row:' + rNum + ';-ms-grid-column:11;" class="but2"></div>')
							);
							rNum += 2;
						}
					}
				});
				$('.modal-content').show();
			});
		}
	});

	$(document).on("click", ".bingoVerifySave", function(event) {
		let verifyList = {};
		let divs = $('.verify-container > div:gt(5)');
		for (let i = 0; i < divs.length; i += 6)
			verifyList[$(divs[i+0]).attr('client')] = {row: $(divs[i+1]).hasClass('sel'), cross: $(divs[i+2]).hasClass('sel'), '4c': $(divs[i+3]).hasClass('sel'), board: $(divs[i+4]).hasClass('sel')};
		socket.emit('BingoCmd', 'VerifyList', verifyList);
		$('.modal-content').hide();
	});

	$(document).on("mouseover mouseout click", ".verify-container > div.but", function() {
		if (event.type === 'click')
			$(this).toggleClass("sel");
        else if (event.type === 'mouseover')
            $(this).addClass("bingoAdminMO");
        else
            $(this).removeClass("bingoAdminMO");
	});

	$(document).on("mouseover mouseout click", ".verify-container > div.but2", function() {
		if (event.type === 'click') {
			let nameNode = $(this).prev().prev().prev().prev().prev();
			let clientID = nameNode.attr('client').substr(0,5);
			$.ajax({
				url: "bingoverify.php?verifyUserId=" + clientID + "&dataOnly=1",
				dataType: "json",
				cache: false
			}).done(function( json ) {
				//console.log (json);
				if (json[clientID].lines > 0) {
					nameNode.next().addClass('sel').html("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + json[clientID].lines);
				}
				if (json[clientID].cross > 0)
					nameNode.next().next().addClass('sel');
				if (json[clientID]['4corners'] > 0)
					nameNode.next().next().next().addClass('sel');
				if (json[clientID].board > 0)
					nameNode.next().next().next().next().addClass('sel');
			});
		}
        else if (event.type === 'mouseover')
            $(this).addClass("bingoAdminMO");
        else
            $(this).removeClass("bingoAdminMO");
	});

<?php 
}
?>
});

function updateLastFive(newNum) {
	last5Nums.unshift(newNum);

	if (last5Nums.length > 5)
		last5Nums.pop();
}

function lastFiveCSS() {
	for (let i=0; i<last5Nums.length; i++)
		$('div.pNum').removeClass('l' + (i+1));

	for (let i=last5Nums.length-1; i>=0; i--) {
		$("#pn"+last5Nums[i]).addClass('l' + (i+1));

	}
}

function updateRound(roundNo) {
	$('#roundNo').text(roundNo);
	if (roundNo == 1)
		$('#winType').text('1 Line');
	else if (roundNo == 2)
		$('#winType').text('2 Lines');
	else if (roundNo == 3)
		$('#winType').text('\'X\' (Cross)');
	else if (roundNo == 4)
		$('#winType').text('4 Corners');
	else if (roundNo >= 5)
		$('#winType').text('Full Card');
}

function sendChat() {
	if ($('BingoChatTxt').val() != '') {
		socket.emit('BingoCmd', 'BingoChat', $('#BingoChatTxt').val());
		$('#BingoChatTxt').val('');
	}
}

function sortPlayers (a,b) {
	if (a.getAttribute('cB') == 1 && b.getAttribute('cB') == 1)
		return (a.innerText > b.innerText ? 1 : -1);
	if (a.getAttribute('cB') == 1)
		return -1;
	if (b.getAttribute('cB') == 1)
		return 1;
	if (a.getAttribute('hR') > 0 || b.getAttribute('hR') > 0) {
		if (a.getAttribute('hR') == b.getAttribute('hR'))
			return (a.innerText > b.innerText ? 1 : -1);
		return (a.getAttribute('hR') > b.getAttribute('hR') ? -1 : 1);
	}
	return (a.innerText > b.innerText ? 1 : -1);
}

function handleStatus(miscVar) {
	if (bingoStatus === 0) {
		last5Nums = [];
		$('div.pNum').removeClass('picked');
		lastFiveCSS();
		$('#BingoNum').html('');
		$("#clientList li[cB=1],li:contains('BINGO')").each(function(item) {
			$(this).text($(this).text().substr(0,$(this).text().indexOf(" -")));
		}).removeClass('r').attr('cB',0);
		$("#clientList li").sort(sortPlayers).appendTo("#clientList");
		<?=($admin?'adminButtons(0, 1, 0, 0, 0);':'')?>

		$('#bingoStatus').text('Waiting for Bingo to start...');

	} else if (bingoStatus === 1) {
		$("#clientList li[cB=1],li:contains('BINGO')").each(function(item) {
			$(this).text($(this).text().substr(0,$(this).text().indexOf(" -")));
		}).removeClass('r').attr('cB',0);
		$("#clientList li").sort(sortPlayers).appendTo("#clientList");
		<?=($admin?'adminButtons(1, 0, 1, 0, 0);':'')?>

		$('div.pNum').removeClass('picked');
		lastFiveCSS();
		$('#BingoNum').html('');

	} else if (bingoStatus === 2) {
		$("#clientList li[cB=1],li:contains('BINGO')").each(function(item) {
			$(this).text($(this).text().substr(0,$(this).text().indexOf(" -")));
		}).removeClass('r').attr('cB',0);
		$("#clientList li").sort(sortPlayers).appendTo("#clientList");
		<?=($admin?'adminButtons(1, 0, 1, 0, 0);':'')?>


	} else if (bingoStatus === 3) {
		<?=($admin?'adminButtons(1, 0, 0, 1, 0);':'')?>

		$('#bingoStatus').text('Game Paused! Please wait...');

	} else if (bingoStatus === 4) {
		<?=($admin?'adminButtons(1, 0, 0, 1, 1);':'')?>

		$('#bingoStatus').text('BINGO has been called!');
		if (miscVar !== null) {
			$("li[id^=" + miscVar.substr(0,5) + "]:not(:contains('BINGO'))").each(function(item){
				$(this).text($(this).text() + ' - Called BINGO!').attr('cB',1);
			}).addClass('r');
			$("#clientList li").sort(sortPlayers).appendTo("#clientList");
			$("#clientList").parent().animate({ scrollTop: 0}, 1000);

<?php
if ($admin) {
?>
			if(!$(".verify-container > div:gt(4)[client^=" + miscVar.substr(0,5) + "]").length) {
				$('.verify-container').css('grid-rows', $('.verify-container').css('grid-rows') + ' 8px auto');
				let rNum = ( $(".verify-container > div").length / 5) * 2 + 1;
				$('.verify-container').append(
					$('<div style="-ms-grid-row:' + rNum + ';-ms-grid-column:1;" client="' + miscVar.substr(0,5) + '">' + $("li[id^=" + miscVar.substr(0,5) + "]").text().substr(0,$("li[id^=" + miscVar.substr(0,5) + "]").text().indexOf(" -")) + '</div><div style="-ms-grid-row:' + rNum + ';-ms-grid-column:3;" class="but"></div><div style="-ms-grid-row:' + rNum + ';-ms-grid-column:5;" class="but"></div><div style="-ms-grid-row:' + rNum + ';-ms-grid-column:7;" class="but"></div><div style="-ms-grid-row:' + rNum + ';-ms-grid-column:9;" class="but"></div><div style="-ms-grid-row:' + rNum + ';-ms-grid-column:11;" class="but2"></div>')
				);
			}
<?php
}
?>
		}
	} else if (bingoStatus === 5) {
		<?=($admin?'adminButtons(1, 0, 0, 0, 0);':'')?>

		$('#bingoStatus').text('Game Over!');
	}
}
<?php
if ($admin) {
?>
function adminButtons(resetVal, startVal, pauseVal, unpauseVal, verifyVal) {
	if (resetVal) $('.bingoReset').removeClass('disabled'); else $('.bingoReset').addClass('disabled');
	if (startVal) $('.bingoStart').removeClass('disabled'); else $('.bingoStart').addClass('disabled');
	if (pauseVal) $('.bingoPause').removeClass('disabled'); else $('.bingoPause').addClass('disabled');
	if (unpauseVal) $('.bingoUnpause').removeClass('disabled'); else $('.bingoUnpause').addClass('disabled');
	if (verifyVal) $('.bingoVerify').removeClass('disabled'); else $('.bingoVerify').addClass('disabled');
}
<?php
}
?>
function getBingoNum(bingoNum) {
	if (bingoNum <= 15)
		return 'C' + bingoNum; 
	else if (bingoNum <= 30)
		return 'O' + bingoNum;
	else if (bingoNum <= 45)
		return 'V' + bingoNum;
	else if (bingoNum <= 60)
		return 'I' + bingoNum;
	else
		return 'D' + bingoNum;
}

function animateBingoNum(bNum) {
	let str = '';
	let delay = 100;
	for (l = 0; l < bNum.length; l++) {
	    if (bNum[l] != ' ') {
	        str += '<span style="animation-delay:' + delay + 'ms; -moz-animation-delay:' + delay + 'ms; -webkit-animation-delay:' + delay + 'ms; ">' + bNum[l] + '</span>';
	        delay += 150;
	    } else
	        str += letter[l];
	}
	$('#BingoNum').html(str);
}
</script>
</head>
<body>
<div class="leftDiv">
	<div class="headerText" id="bingoStatus">Waiting to start...</div>
	<div id="BingoNum" class="cssanimation leFlyInBottom"></div>
	<div class="headerText">Past Numbers</div>
	<div class="divTable pastNum">
	    <div class="divTableHeading">
	        <div class="divTableRow">
	            <div class="divTableHead">C</div>
	            <div class="divTableHead">O</div>
	            <div class="divTableHead">V</div>
	            <div class="divTableHead">I</div>
	            <div class="divTableHead">D</div>
	        </div>
	    </div>
	    <div class="divTableBody">
<?php
for ($i=1;$i<=15;$i++)
echo '<div class="divTableRow">
<div class="divTableCell"><div class="pNum" id="pn'.(15*0+$i).'">'.(15*0+$i).'</div></div>
<div class="divTableCell"><div class="pNum" id="pn'.(15*1+$i).'">'.(15*1+$i).'</div></div>
<div class="divTableCell"><div class="pNum" id="pn'.(15*2+$i).'">'.(15*2+$i).'</div></div>
<div class="divTableCell"><div class="pNum" id="pn'.(15*3+$i).'">'.(15*3+$i).'</div></div>
<div class="divTableCell"><div class="pNum" id="pn'.(15*4+$i).'">'.(15*4+$i).'</div></div>
</div>';
?>
	    </div>
	</div>
<br>
	<div>
		<span style="display:inline-block;width: 120px;padding-left: 5px;padding-right:5px;margin:1px;font-weight:bold">LEGEND:</span><br>
		<span style="display:inline-block;width: 120px;padding-left: 5px;padding-right:5px;margin:1px" class="pNum picked l1">Current</span>

		<span style="display:inline-block;width: 120px;padding-left: 5px;padding-right:5px;margin:1px" class="pNum picked l4">3rd Last</span><br>

		<span style="display:inline-block;width: 120px;padding-left: 5px;padding-right:5px;margin:1px" class="pNum picked l2">Last Number</span>

		<span style="display:inline-block;width: 120px;padding-left: 5px;padding-right:5px;margin:1px" class="pNum picked l5">4th Last</span><br>

		<span style="display:inline-block;width: 120px;padding-left: 5px;padding-right:5px;margin:1px" class="pNum picked l3">2nd Last</span>

		<span style="display:inline-block;width: 120px;padding-left: 5px;padding-right:5px;margin:1px" class="pNum picked">All Prior</span>
	</div>
</div>

<div class="midDiv">
	<div class="HeaderMenu">
		<div style="text-align:center"><?=($user!=='public'?$firstName:'PUBLIC')?></div>
		<div style="text-align:center">Round: <span id="roundNo">1</span></div>
		<div style="text-align:center">Goal: <span id="winType">1 Line</span></div>
	</div>

	<?=($user!=='public'?'<div class="bingoCall">CALL<br>BINGO!</div>':'')?>
<?php
if ($admin) {
?>
	<div class="AdminMenu">
		<div style="text-align:center"><u>Admin Menu</u></div>
		<div class="bingoReset">Reset</div>
		<div class="bingoStart">Start</div>
		<div class="bingoUnpause">Unpause</div>
		<div class="bingoPause">Pause</div>
		<div class="bingoVerify">Verify</div>
		<input type="text" class="bingoTimingTxt" value="15"><div class="bingoTimingBut" style="display:inline-block;padding-left:5px;padding-right:5px;margin-top:0px">Timer</div>
	</div>

<?php
}
?>
</div>

<div class="rightDiv">

	<div class="headerText">Current Participants</div>
	<div style="overflow-y: auto; height:223px; margin-top:3px; margin-bottom:3px"><ul id="clientList" style="border-top: 1px solid #e2e2e2; border-bottom: 1px solid #e2e2e2"></ul></div>
	<div class="headerText">Chat</div>
	<div style="overflow-y: auto; height:438px; width:97%; margin-top:3px; margin-bottom:3px" id="bingoChat"></div>
	<?=($user!=='public'?'<div><input type="text" id="BingoChatTxt" style="display:inline-block;width:80%;height:25px;padding:0px;border-radius: 10px;"><div class="bingoChat" style="display:inline-block;padding-left:8px;padding-right:8px">Submit</div></div>':'')?>
</div>

<?php
if ($admin) {
?>

  <div class="modal-content">
    <h2 style="text-align:center; font-weight:bold">Verify Bingo Calls</h2>
    <div class='verify-container'>
    	<div class="hdr lg" style="-ms-grid-row: 1;-ms-grid-column: 1;">Name</div>
    	<div class="hdr sm" style="-ms-grid-row: 1;-ms-grid-column: 3;">Lines</div>
    	<div class="hdr sm" style="-ms-grid-row: 1;-ms-grid-column: 5;">'X'</div>
    	<div class="hdr sm" style="-ms-grid-row: 1;-ms-grid-column: 7;">4 Corners</div>
    	<div class="hdr sm" style="-ms-grid-row: 1;-ms-grid-column: 9;">Board</div>
    	<div class="hdr sm" style="-ms-grid-row: 1;-ms-grid-column: 11;">Check</div>
    </div>
    <div class="bingoVerifySave" style="margin-top: 20px">Save Verifications</div>
  </div>

<?php
}
?>

</body></html>

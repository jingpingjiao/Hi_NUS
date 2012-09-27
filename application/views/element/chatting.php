<!-- chat -->
<script>
	var smallScreenLeftDiv = 0;
	function hideAllForSmallScreen()
	{
				$('#slideOutDiv').animate({
					height : $(window).height() - heightToSubtract/2
				}, 'slow');
				if(smallScreenLeftDiv == 0)
				{
				$('#slideOutDiv').animate({
					width : 250
				}, 'slow');
				//$('#hidePeopleBtn').html('<< Hide')
				$('#hidePeopleBtn').animate({
					'left' : '-=50px'
				}, 'slow');
				$('#showPeopleBtn').hide();
				$('#hidePeopleBtn').show();
				$('#hidePeopleBtn').css({
					'visibility' : 'visible'
				});
				$('#hidePeopleBtn').animate({
					'left' : '+=300px'
				}, 'slow');
				$('#slideOutDiv').animate({
					'left' : '+=500px'
				}, 'slow');
				$('#contentBox').css({
					'visibility' : 'collapse'
				});;
				/*$('#chatTable').css({
					'visibility' : 'collapse'
				});;*/
				$('#goToMap').css({
					'visibility' : 'collapse'
				});;
				$('#enterButton').css({
					'visibility' : 'collapse'
				});;
				$('#sendBtn').css({
					'visibility' : 'collapse'
				});;
				
				}
				
	}
	function showAllForSmallScreen()
	{
				if(smallScreenLeftDiv == 1)
				{
				$('#slideOutDiv').animate({
					width : 300
				}, 'slow');
				//$('#hidePeopleBtn').prop('value', 'Hide People')
				$('#hidePeopleBtn').animate({
					'left' : '+=50px'
				}, 'slow');
				$('#showPeopleBtn').fadeIn(3000);
				$('#hidePeopleBtn').hide();
				$('#hidePeopleBtn').css({
					'visibility' : 'collapse'
				});
				$('#hidePeopleBtn').animate({
					'left' : '-=300px'
				}, 'slow');
				$('#slideOutDiv').animate({
					'left' : '-=500px'
				}, 'slow');
				$('#contentBox').css({
					'visibility' : 'visible'
				});;
				/*$('#chatTable').css({
					'visibility' : 'visible'
				});;*/
				$('#goToMap').css({
					'visibility' : 'visible'
				});;
				$('#enterButton').css({
					'visibility' : 'visible'
				});;
				$('#sendBtn').css({
					'visibility' : 'visible'
				});;
			
				}
	}
	function showDiv() {
		if (divShown == 0) {
			if(!(navigator.platform == 'Win32' || navigator.platform == 'MacIntel' || navigator.platform == 'iPad'))
			{
				// this means not computer or ipad - so screen too small
				hideAllForSmallScreen();
				smallScreenLeftDiv = 1;
			}
			else
			{
				$('#showPeopleBtn').hide();
				$('#hidePeopleBtn').show();
				$('#hidePeopleBtn').css({
					'visibility' : 'visible'
				});
				$('#hidePeopleBtn').animate({
					'left' : '+=300px'
				}, 'slow');
				$('#slideOutDiv').animate({
					'left' : '+=500px'
				}, 'slow');
				$('#contentBox').animate({
					'left' : '+=300px',
					width: $(window).width()*.8 - 300
				},'slow');
				/*$('#msgRcv').animate({
					width :  $(window).width() - 300
				}, 'slow');
				
				$('#chatTable').animate({
					'left' : '+=300px',
					width :  $(window).width() - 300
				},'slow');*/
				$('#sendBtn').animate({
					width: $(window).width()*.2
				},'slow');
			}
		}
		divShown = 1;
		addPeopleToList(window.get_near_peope());
	}

	function hideDiv() {
		if (divShown == 1) {
			
			if(!(navigator.platform == 'Win32' || navigator.platform == 'MacIntel' || navigator.platform == 'iPad'))
			{
				// this means not computer or ipad - so screen too small
				showAllForSmallScreen();
				smallScreenLeftDiv = 0;
			}
			else
			{
				$('#slideOutDiv').animate({
					'left' : '-=500px'
				}, 'slow');
				$('#hidePeopleBtn').animate({
					'left' : '-=300px'
				}, 'slow', function() {
					$('#hidePeopleBtn').hide();
					$('#showPeopleBtn').show();
				});
				$('#contentBox').animate({
					'left' : '-=300px',
					width: $(window).width()*.8
				},'slow');
				/*$('#msgRcv').animate({
					width :  $(window).width()
				}, 'slow');
				$('#chatTable').animate({
					'left' : '-=300px',
					width :  $(window).width()
				}, 'slow');*/
				$('#sendBtn').animate({
					width: $(window).width()*.2
				},'slow');
			}
		}
		divShown = 0;

	}
	function switchToChat() {
	
		if(chatScreen == 0)
		{
			chatScreen = 1;
			autoChangeDiv();
		}
		else if(chatScreen == 1)
		{
			chatScreen = 0;
			hideDiv();
		}
			
	}
	
	function autoChangeDiv() {
			if(chatScreen == 0)
				return;
			pageWidth = $(window).width();
			if (pageWidth > 900 && $(window).height() > 600) {
				if(navigator.platform == 'Win32' || navigator.platform == 'MacIntel')
					if(smallScreenLeftDiv == 1)
					showDiv();
			} else {
				if(smallScreenLeftDiv == 0)
				hideDiv();
			}
			$('#contentBox').animate({
				width: $(window).width()*.8 - (divShown * 300)
			},'slow');
			$('#slideOutDiv').animate({
					height : $(window).height() - heightToSubtract/2
				}, 'slow');
			$('#contentBox').animate({
				'bottom' : heightToSubtract/2,
			}, 'slow');
			$('#sendBtn').animate({
				'bottom' : heightToSubtract/2,
			}, 'slow');
			$('#waitImg').animate({
				'bottom' : heightToSubtract/2,
				'right': $(window).width()*.22,
			}, 'slow');
		
		  
			$('#conversation').animate({
					height : $(window).height() - (heightToSubtract * 2)
				}, 'slow');
		  $('#sendBtn').animate({
					width: $(window).width()*.2
				},'slow');
		
		 
		  
		
	}
	function makeNameBold(str)
	{
		var n=str.split(" ");
		var i;
		for(i = 0; n[i].indexOf(":") == -1; i++)
			n[i] = "<b>" + n[i] + "</b>";
		n[i] = "<b>" + n[i] + "</b>";
		var str1 = "";
		for(i = 0; i < n.length; i++)
		{
			str1 += (n[i] + " ");
		}
		return str1;
	}
	function removeName(str)
	{
		var n=str.split(" ");
		var i;
		for(i = 0; n[i].indexOf(":") == -1; i++)
			n[i] = "";
		n[i] = "";
		var str1 = "";
		for(i = 0; i < n.length; i++)
		{
			str1 += (n[i] + " ");
		}
		return str1;
	}
	function gotMessage(msg)
	{
		  
		  if($(window).width() < 300)
		  {
			$('.sendMsg').css('max-width',$(window).width()*.3);
			$('.recvMsg').css('max-width',$(window).width()*.3);
		  }
		  
		 
		if(msg == $('#self_profile_name').html() + ': ' + $('#contentBox').val())
			appendSend("<b>You: </b>" + removeName(msg));
		else
			appendRecv(makeNameBold(msg));
	}
	function getTime()
	{
	
		var d = new Date();
		//var day = d.getdate(); // day of month
		//var year = d.getFullYear(); // year - 4 digits
		//var hours = d.getHours(); // hour 0 - 23
		//var min = d.getMinutes(); // minutes 0 - 59
		//var sec = d.getSeconds(); // sec 0 - 59
		
		//var fulltime = "";
		//fulltime += (hours + minutes + ',' + day + '/' + month);
		//var fulltime = d;
		var temp = ""
		temp += d;
		var fulltime=temp.split(" ");
		var day = fulltime[0];// day is 1st
		var time = fulltime[4];// time is 4th
		return day + ", " + time;
	}
	function appendRecv(msg)
	{
			//$('#msgRcv').append('<div class="recvMsg">'+msg+'</div><br>');
			msg = ("<div class='timeStyle'><i>Recd At: </i>" + getTime() + "</div><br>") + msg;
			$('#conversation').append('<div class="recvMsg">'+msg+'</div>');
			$('#conversation').append('<br><br><br><br>');
			for(var i = 2; i < msg.length/50; i++)
				$('#conversation').append('<br>');
			
			$("#conversation").scrollTop(1000);
			
	}
	function appendSend(msg)
	{
		
		$('#contentBox').val('');
		msg = ("<div class='timeStyle'><i>Sent At: </i>" + getTime() + "</div>") + msg;
		//$('#msgRcv').append('<div class="sendMsg">'+msg+'</div><br><br><br>');
		$('#conversation').append('<div class="sendMsg">'+msg+'</div>');
		$('#conversation').append('<br><br><br><br>');
		for(var i = 2; i < msg.length/50; i++)
			$('#conversation').append('<br>');
		endSending();
		$("#conversation").scrollTop(1000);
	}

	function startSending()
	{
			$('#enterButton').button('disable');
			$('#contentBox').attr('disabled',true);
			$('#waitImg').css('visibility', 'visible');
	}
	function endSending()
	{
			$('#enterButton').button('enable');
			$("#contentBox").removeAttr('disabled');
			$('#waitImg').css('visibility', 'collapse');
	}
</script>
<style>

.timeStyle
{
	font-size: 0.7em;
	
}
.recvMsg
{
	
	!position: absolute;
	background: url('../application/views/images/chatrecv.png');
	padding:20px; 
	height: auto;
	width: auto;
	font-size: 1em;
	text-align: right;
	background-repeat: no-repeat;
	background-size: 100% 100%;
	font-family:arial; 
	overflow: auto;
	word-wrap: break-word;
	max-width:250px;
	padding-top: 10px;
	
}
.sendMsg
{
	
	!position: absolute;
	background: url('../application/views/images/chatsend.png');
	padding:20px; 
	height: auto;
	width: auto;
	font-size: 1em;
	text-align: left;
	background-repeat: no-repeat;
	background-size: 100% 100%;
	float: right;
	color: #FFFFFF;
	font-family:arial; 
	overflow: auto;
	word-wrap: break-word;
	max-width:250px;
	padding-top: 10px;
	
}
#contentBox
{
	position: absolute;
    left: 0px;
	width: 90%;
	float: left;
	overflow: scroll;
	
}
#sendBtn
{
	position: absolute;
    right: 0px;
	width: 10%;
	
}

#waitImg
{
	position: absolute;
	visibility: collapse;
	padding-bottom: 20px;
}

#conversation
{
	height: 400px; 
	overflow-y: scroll;
}
</style>
<div data-role="page" id="page4" height="350px">
	<div data-theme="a" data-role="header">
		<a data-role="button" data-transition="fade" href="#" class="ui-btn-left" onClick="showDiv()" id="showPeopleBtn"> People </a>
		<a data-role="button" data-transition="fade" href="#" class="ui-btn-left" onClick="hideDiv()" id="hidePeopleBtn" style="visibility: hidden;"> << Hide </a>
		<a data-role="button" data-transition="flip" href="#page1" onClick="switchToChat();" class="ui-btn-right" id="goToMap">
			Map
		</a>
		<h3 id="location_title"> Somewhere Near SoC </h3>
	</div>
	
	<div data-role="content" class="middlecontent">
	
	
	<div id="conversation">
	</div>
	<div>
	<input type="text" id="contentBox" style="max-height: 9%;height: 9%;overflow: auto"/>
	<img src="../application/views/images/spinner.gif" id="waitImg"/>
	<div id="sendBtn" valign="middle">
		<input type="button" onClick="startSending();"  style="height: 9%;min-height:9%;max-height:9%;" id="enterButton" style="font-size: 0.5em" value="Go" disabled='true'/>
	</div>
	
	</div>
	</div>
	<div data-role="footer">
		<div data-role="navbar" data-iconpos="left" data-theme="a">
			<ul>
				<li>
					<a href="#page1" data-theme="" onClick="switchToChat();" data-icon="home">
						Nearby
					</a>
				</li>
				<li>
					<a href="#page5" data-theme="" onClick="switchToChat();" data-icon="plus">
						Friends
					</a>
				</li>
				<li>
					<a href="#page6" data-theme="" onClick="switchToChat();" data-icon="info">
						Profile
					</a>
				</li>
				<li>
					<a href="#page7" data-theme="" onClick="switchToChat();" data-icon="gear">
						Setting
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<html>
<head>
<link rel="shortcut icon" href="favicon.ico" >
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<base href="http://www.2fun2watch.com/st">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="style/css/buttons.css" />
<style>
.counter
{
	position:absolute;
              font-align:center;
	background-color:#38352e;
	color:white;
              font-size:7px;
	border-style:solid;
	border-width:1px;
	border-color:#38352e;
	top:0px;
	left:0px;
	width:20px;
}

.text
{
	position:absolute;
	background-color:#38352e;
	border-style:solid;
	border-width:1px;
	border-color:#38352e;
	font-size:13px;
	color:grey;
	top:0px;
	left:20px;
}
.link
{
	position:absolute;
	background-color:#38352e;
	border-style:solid;
	border-width:1px;
	border-color:gray;
	top:50px;
	left:0px;
	width:338px;
	height:282px;
}
.advwindow
{
	display:none;
	position:absolute;
	background-color:black;
	top:0px;
	left:0px;
	width:338px;
	height:282px;
}

a, a:link, a:visited, a:active
{
	font-size:20px;
	color:#00c0ff;
}
aa, a:hover
{
	font-size:19px;
	color:#e4e4e4;
}
.thx
{
	font-size:20px;
	color:white;
}
.oadv
{
border-style:solid;
border-width:1px;
border-color:red;
width:336px;
height:280px;
}
.gadv
{
border-style:solid;
border-width:1px;
border-color:green;
width:336px;
height:280px;
}
</style>

<script language="JavaScript">
var c=0;
var t;
var timer_is_on=0;

function timedCount()
{
	document.getElementById('counter').value=c;
	c=c+1;
	t=setTimeout("timedCount()",1000);
	if(c>10)
	{
		stopCount();
	}
}

function doTimer()
{
	if(!timer_is_on)
	{
		timer_is_on=1;
		timedCount();
	}
}
function stopCount()
{
	clearTimeout(t);
	timer_is_on=0;
}

function setVisibility(id, visibility)
{	
	if(c<11)
	{
		document.getElementById(id).style.display = visibility;
	}
	else if(c>11)
	{
		document.getElementById(id).style.display = '';
	}
	else if(c=11)
	{
		document.getElementById(id).style.display = '';
	}
}
</script>

<script type="text/javascript" language="JavaScript">
function toggle() {
var ele = document.getElementById("toggleText");
var text = document.getElementById("displayText");
if(ele.style.display == "block") {
ele.style.display = "none";
}
else {
ele.style.display = "block";
}
} 
</script>
</head>

<body onload="doTimer()" style="background-color:#38352e;">
<form><input type="text" id="counter" class="counter"></form>
<br>
<div class="link" onMouseOver="setVisibility('advbox', 'inline');" onMouseOut="setVisibility('advbox','none');">
<font color="#dedede" size="7"><a href="<?php echo $row[3]; ?>" target="_blank" onclick="javascript:toggle();">
<div align="center"><b>Press here to watch!</b></div></a></font>
<center>
<div id="toggleText" class="thx" style="display: none">
Thank you for using 2fun2Watch!</div></center>
<div id='advbox' class='advwindow'>
<?php
$random=rand(1, 2);
if($random==1 || ($random==2)) {
?>
<div class="oadv">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-4346215055925627";
/* ad6 */
google_ad_slot = "0695694681";
google_ad_width = 336;
google_ad_height = 280;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
<?php
}
if($random==3) {
?>
<div class="gadv">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-4962755074982371";
/* kefet */
google_ad_slot = "9294662032";
google_ad_width = 250;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
<?php
}
?>
</div>
</div>
</div>
</body>
</html>

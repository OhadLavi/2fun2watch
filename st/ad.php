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
	background-color:#353231;
	color:white;
	border-style:solid;
	border-width:1px;
	border-color:#353231;
	top:0px;
	left:0px;
	width:20px;
}

.text
{
	position:absolute;
	background-color:#353231;
	border-style:solid;
	border-width:1px;
	border-color:#353231;
	font-size:13px;
	color:grey;
	top:0px;
	left:20px;
}
.link
{
	position:absolute;
	background-color:#353231;
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
	if(c>60)
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
	if(c<21)
	{
		document.getElementById(id).style.display = visibility;
	}
	else if(c>21)
	{
		document.getElementById(id).style.display = '';
	}
	else if(c=21)
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
<body onload="doTimer()" style="background-color:#353231;">
<form>
<input type="text" id="counter" class="counter">
<i class="text">
Wait 20 secounds until the <font color="red">advertisement</font> will disappear
<br>
If you dont want to wait 20 seconds click on the
<br>
<font color="red">advertisement</font> and you will wait only 10 secounds
</i>
</form>
<br>
<div class="link" onMouseOver="setVisibility('advbox', 'inline');" onMouseOut="setVisibility('advbox','none');">
<font color="#dedede"><a href="<?php echo $row[3]; ?>" target="_blank" onclick="javascript:toggle();">
press here to watch</a></font>
<center>
<div id="toggleText" class="thx" style="display: none">
Thank you for using 2fun2Watch!</div></center>
<div id='advbox' class='advwindow'>
$random=rand(1, 2);
if($random==1){
<div class="oadv">
<script type="text/javascript">
<!--
google_ad_client = "ca-pub-4195622678811351";
/* ad1 */
google_ad_slot = "1628091494";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
}
else {
<div class="gadv">
<script type="text/javascript">
<!--
google_ad_client = "ca-pub-4195622678811351";
/* ad1 */
google_ad_slot = "1628091494";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
}
</div>
</div>
</div>
</body>
</html>

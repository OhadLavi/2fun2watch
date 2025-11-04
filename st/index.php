<?php
if(isset($_GET['url']))
{
$url1 = $_GET['url'];

function curPageURL() {
$pageURL = 'http';
if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
$pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
} else {
$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
}
return $pageURL;
}
$d = curPageURL();

$connect = @mysql_connect("free4watchcom.ipagemysql.com", "hapoel", "hapoel1");
$select = @mysql_select_db("hapoel", $connect);
$result = mysql_query("SELECT * FROM `short_urls` WHERE `ul` = '$url1'") or die(mysql_error());

if (mysql_num_rows($result) < 1) {
$connect = @mysql_connect("free4watchcom.ipagemysql.com", "hapoel", "hapoel1");
$select = @mysql_select_db("hapoel", $connect);
$result2 = mysql_query("SELECT * FROM `short_urls` WHERE `delete` = '$url1'") or die(mysql_error());
if (mysql_num_rows($result2) == 1) 
{
$result3 = mysql_query("DELETE FROM `short_urls` WHERE `delete` = '$url1'") or die(mysql_error());
echo "The link was successfully deleted!";
}
else
echo "no such link";
}
else {
$row = mysql_fetch_row($result);
include ('ad.php');
?>
 
<font color="#dedede"><a href="<?php echo $row[3]; ?>"  target="_blank" onclick="javascript:toggle();">
press here to watch</a></font>
<center>
<div id="toggleText" class="thx" style="display: none">
Thank you for using 2fun2Watch!
</div></center>
<div id='advbox' class='advwindow'>
<style>
.oadv
{
border-style:solid;
border-width:1px;
border-color:red;
width:336px;
height:280px;
}
</style>
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
</div>
</div>
</div>
</body>
</html>
<?php
}
}
else
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1. Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="he" lang="he" dir="rtl">
<head>
<meta http-equiv="content-type" content="text/html; charset=windows-1255" />
<meta name="author" content="Orel Lazri" />
<title>ShortURL</title>
<link rel="stylesheet" type="text/css" href="default.css" />
</head>
<body>
<div id="main">
<div id="block">
<div class="header">shorting links</div>
<?php
if (isset($_POST['doShort'])) {
$url = $_POST['url'];
if (empty($url)) {
echo '<div class="error">please provide a vaild url</div>';
} 
else {
$address = "http://www.2fun2watch.com/st/index.php?url=";
$return = "";
$delete = "";
$setup = "";
if (substr($url, 0, 7) != 'http://') 
$url = 'http://' . $url;
$lowercase = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
$uppercase = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

for ($i = 0; $i <= 2; $i ++) {
$return .= $lowercase[rand(0, count($lowercase) - 1)] . $uppercase[rand(0, count($uppercase) - 1)];
}
$newurl = $address . $return;
for ($i = 0; $i <= 0; $i ++) {
$delete1= $return."".$lowercase[rand(0, count($lowercase) - 1)] . $uppercase[rand(0, count($uppercase) - 1)];
}
$delete2= $address . $delete1;
for ($i = 0; $i <= 0; $i ++) {
$setup1=$delete1 . $lowercase[rand(0, count($lowercase) - 1)] . $uppercase[rand(0, count($uppercase) - 1)];
}
$setup2= $address  . $setup1;

$connect = @mysql_connect("free4watchcom.ipagemysql.com", "hapoel", "hapoel1");
$select = @mysql_select_db("hapoel", $connect);
if(!$select)
{
echo 'could not connect to the sql';
}

$query = "SELECT short  FROM `short_urls` WHERE `short` = '$out'";
$result = mysql_query($query);

if (mysql_num_rows <1){
$insert_query = "INSERT INTO `short_urls` (`id`, `short`, `ul`, `url`, `delete`, `setup`, `stamped`) VALUES (NULL, '$newurl', '$return', '$url', '$delete1', '$setup1', NOW());";
$result = mysql_query($insert_query);
}
if (isset($_POST['doShort'])) {
?>
<textarea cols="40" rows="1"><iframe src="<?php echo $newurl; ?>" frameBorder="0" width="400" height="400" SCROLLING="NO"></iframe></textarea>
<?php
echo '<div class="success"><input type="text" name="newurl" id="newurl" value="' . $newurl . '" size="40" /> :your shorted link</div>';
echo '<div class="success"><input type="text" name="delete" id="delete" value="' . $delete2 . '" size="40" /> :delete link</div>';
echo '<div class="success"><input type="text" name="setup" id="setup" value="' . $setup2 . '" size="40" /> :setup link</div>';
}
}
}
 ?>
<div id="text">
<form method="post" action="" name="linkmakerform" onSubmit="return checklink(document.form.doShort.value)">
<table align="center">
<tr>
<td><input type="submit" name="doShort" id="doShort" value="short link" /></td>
<td><input align="center" type="text" name="url" id="url" size="40" /></td>
</tr>
</table>
</form>
</div>
</div>
</div>
</body>
</html>
<?php } ?>
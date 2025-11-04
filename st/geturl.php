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
if (mysql_num_rows($result2) > 0) 
{
$result3 = mysql_query("DELETE FROM `short_urls` WHERE `delete` = '$url1'") or die(mysql_error());
echo "The link was successfully deleted!";
}
else {
$select = @mysql_select_db("hapoel", $connect);
$result4 = mysql_query("SELECT * FROM `short_urls` WHERE `setup` = '$url1'") or die(mysql_error());
if (mysql_num_rows($result4) > 0) 
{
$url2= substr($url1, 0, 6);
?>
Old link: <input type="text" name="old" size="5" align="left" value="<?php echo $url2 ?>"/>
<br>
New link: <input type="text" name="new" size="5" align="left" value=""/>
<br>
<input type="submit" value="submit" size="3" />
<?php
}
}
echo "no such link";
}
else {
$row = mysql_fetch_row($result);
include ('ad.php');
}
}
?>
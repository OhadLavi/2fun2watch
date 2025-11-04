<?php
if(isset($_GET['url']))
{
$url = $_GET['url'];
$connect = @mysql_connect("free4watchcom.ipagemysql.com", "hapoel", "hapoel1");
$select = @mysql_select_db("hapoel", $connect);
$result = mysql_query("SELECT * FROM `short_urls` WHERE `ul` = '$url'") or die(mysql_error());
$result2 = mysql_query("SELECT * FROM `short_urls` WHERE `delete` = '$url'") or die(mysql_error());
$result4 = mysql_query("SELECT * FROM `short_urls` WHERE `setup` = '$url'") or die(mysql_error());

if (mysql_num_rows($result) > 0) {
$row = mysql_fetch_row($result);
include ('ad.php');
}
elseif (mysql_num_rows($result2) > 0) {
$result3 = mysql_query("DELETE FROM `short_urls` WHERE `delete` = '$url'") or die(mysql_error());
echo "The link was successfully deleted!";
}	 
elseif (mysql_num_rows($result4) > 0) {
$url2= substr($url, 0, 6);
$address = "http://www.2fun2watch.com/st/index.php?url=";
$oldurl = $address.$url2;
$row = mysql_fetch_row($result4);
?> 
<form method="post" action="" name="newlink">
Old link: <input type="text" name="old" size="30" align="left" value="<?php echo $row[3]; ?>"/>
<br>
New link: <input type="text" name="new" size="30" align="left" value=""/>
<br>
<input type="submit" value="submit" name="do" id="do" size="3" /> 
</form>
<?php
} 	
$newurl = $_POST['new'];	 
if (isset($_POST['do'])) {
if (empty($newurl))
echo '<div class="error">Please provide a vaild url!</div>';
else {
if (substr($newurl, 0, 7) != 'http://') 
$newurl = 'http://' . $newurl;
$result5 = mysql_query("UPDATE `short_urls` SET `url` = '$newurl' WHERE `url` = '$row[3]'") or die(mysql_error()); 
echo "The link had been successfully upated!";
}
}
}
?>
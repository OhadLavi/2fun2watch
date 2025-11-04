<?php
if (isset($_POST['doShort'])) {
$url = $_POST['url'];
if (empty($url))
echo '<div align="center">קישור לא תקין</div>';

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
echo 'Could not connect to the sql';
}

$query = "SELECT short  FROM `short_urls` WHERE `short` = '$out'";
$result = mysql_query($query);

if (mysql_num_rows <1){
$insert_query = "INSERT INTO `short_urls` (`id`, `short`, `ul`, `url`, `delete`, `setup`, `stamped`) VALUES (NULL, '$newurl', '$return', '$url', '$delete1', '$setup1', NOW());";
$result = mysql_query($insert_query);
}
if (isset($_POST['doShort'])) {
?>
<script type="text/javascript">
function select0() { document.getElementById("iframe").select(); }
function select1() { document.getElementById("original").select(); }
function select2() { document.getElementById("newurl").select(); }
function select3() { document.getElementById("delete").select(); }
function select4() { document.getElementById("setup").select(); }
</script>
<textarea id="iframe" onclick="select0()" cols="30" rows="1"><iframe src="<?php echo $newurl; ?>" frameBorder="0" width="400" height="400" SCROLLING="NO"></iframe></textarea> :לינק לאתר 
<?php
echo '<div class="success"><input type="text" name="original" id="original" value="' . $url . '" size="40" onclick="select1()" /> :קישור מקורי</div>';
echo '<div class="success"><input type="text" name="newurl" id="newurl" value="' . $newurl . '" size="40" onclick="select2()"  /> :קישור מקוצר</div>';
echo '<div class="success"><input type="text" name="delete" id="delete" value="' . $delete2 . '" size="40" onclick="select3()"  /> :למחיקת קישור מקוצר</div>';
echo '<div class="success"><input type="text" name="setup" id="setup" value="' . $setup2 . '" size="40" onclick="select4()"  /> :לשנות קישור</div>';
}
}
}
 ?>
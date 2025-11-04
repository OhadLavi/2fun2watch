<?php
if(isset($_GET['url']))
{
 include('geturl.php');
}
else { ?>
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
<div id="text">
<form method="post" action="" name="linkmakerform">
<table align="center">
<tr>
<td><input type="submit" name="doShort" id="doShort" value="short link" /></td>
<td><input align="center" type="text" name="url" id="url" size="40" /></td>
</tr>
</table>
</form>
<br/>
<?php
 include('code.php'); ?>
</div>
</div>
</div>
</body>
</html>
<?php } ?>
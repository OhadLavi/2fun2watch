<?php
if(isset($_GET['url']))
{
 include('geturl.php');
}
else { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<title>ShortUrl2fun2watch</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div class="sidebar2" align="center">
<ul>
<li>
<h2>קיצור לינקים</h2>
<ul>
<li>
<form method="post" action="" name="linkmakerform">
<table>
<tr>
<td><input type="submit" name="doShort" id="doShort" value="קצר לינק" /></td>
<td><input align="center" type="text" name="url" id="url" size="40" /></td>
</tr>
<tr>
<td align="center"><br/></td>
<td align="center"><br/><?php include('code.php'); ?></td>
</tr>
</table>
</form>
</li>
</ul>
</li>
</ul>
</div>

</body>
</html>
<?php } ?>

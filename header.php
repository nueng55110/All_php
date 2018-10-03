<?php
if(!isset($_SESSION["pass"]) || $_SESSION["pass"] != "yes") {
header("Location: loginpage.php");
	exit;
}
?>

<html><head><title>burin</title></head>
<meta http-equiv="content-type"
content="text/html;charset=tis-620" />
<body bgcolor=#FFFFCC>
<table width=100% bgcolor=pink><tr><td>
<span style="font-size:30px;">Hello world</span>
</td></tr></table>
<table width=100% bgcolor=#dddddd><tr>
<td><a href=myweb.php>home</a></td>
<td><a href=myweb_mul.php>multiple</a></td>
<td><a href=myweb_friend1.php>friend</a></td>
<td><a href=myweb_me1.php>about us</a></td>
<td><a href=logout.php>logout</a></td>
</tr></table>

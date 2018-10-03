<?php

if(!isset($_SESSION["pass"]) || $_SESSION["pass"] != "yes") {
header("Location: loginpage.php");
	exit;
}
?>

<table width=100% bgcolor=#FFCCCC><tr><td>
<span style="font-size:20px;text-align:center;">
<td colspan="3"><Marquee scrollamount="15"><font size=5 face="Impact">สามารถติดต่อได้ที่ เบอร์โทรศัพท์ 098-581-5473</Marquee></td>
</span>
</td></tr></table>
</body></html>

<?php 
session_start();
include('header.php');
/*include('head.php');*/
# ������ http://www.thaiall.com/perlphpasp/source.pl?9137
# ===
# ��ǹ��˹����������鹢ͧ�к�
$host     = "localhost";
$db       = "surawit";  
$tb       = "customers"; 
$user     = "root"; // ���ʼ���� ����ͺ����ҡ�������к�
$password = "";    // ���ʼ�ҹ ����ͺ����ҡ�������к�
$create_table_sql = "create table test (id varchar(20),  ns varchar(20), salary varchar(20))";
if (isset($_REQUEST{'action'})) $act = $_REQUEST{'action'}; else $act = "";
# ===
# ��ǹ�ʴ�����ѡ ��駻��� �����ѧ������ del ���� edit
if (strlen($act) == 0 || $act == "del" || $act == "edit") {
  $connect = new mysqli($host,$user,$password,$db);
  $result = $connect->query("select * from $tb")  or die ("phpmyadmin - " . $create_table_sql . "<br/>" . mysql_error());
  echo "<table>";
  while ($o = $result->fetch_object()) {
    if (isset($_REQUEST{'CustomerID'}) && $_REQUEST{'CustomerID'}  == $o->CustomerID) $chg = " style='background-color:#f9f9f9"; else $chg = " readonly style='background-color:#ffffdd";
    echo "<tr><form action='' method=post>
      <td><input name=CustomerID size=5 value='". $o->CustomerID . "' style='background-color:#dddddd' readonly></td>
      <td><input name=CompanyName size=40 value='". $o->CompanyName . "' $chg'></td>
      <td><input name=ContactName size=20 value='". $o->ContactName . "' $chg;text-align:right'></td>
      <td>";
    if (isset($_REQUEST{'CustomerID'}) && $_REQUEST{'CustomerID'} == $o->CustomerID) {
      if ($act == "del") echo "<input type=submit name=action value='del : confirm' style='height:40;background-color:yellow'>";
      if ($act == "edit") echo "<input type=submit name=action value='edit : confirm' style='height:40;background-color:#aaffaa'>";
    } else {
      echo "<input type=submit name=action value='del' style='height:26'> <input type=submit name=action value='edit' style='height:26'>";
    }
    echo "</td></form></tr>";
  }	
  echo "<tr><form action='' method=post><td><input name=CustomerID size=5></td><td><input name=CompanyName size=40></td><td><input name=ContactName size=20></td><td><input type=submit name=action value='add' style='height:26'></td></tr>
  </form></table>";
  if (isset($_SESSION["msg"])) echo "<br>".$_SESSION["msg"];
  $_SESSION["msg"] = ""; 
  /*include('foot.php');*/
    include('footer.php');
  exit;
} 
# ===
# ��ǹ����������
if ($act == "add") {
   $connect = new mysqli($host,$user,$password,$db);
   $result = $connect->query("insert into $tb (CustomerID,CompanyName,ContactName) values('". $_REQUEST{'CustomerID'} . "','". $_REQUEST{'CompanyName'} . "','". $_REQUEST{'ContactName'} . "')");   
  if ($result) $_SESSION["msg"] = "insert : completely";
  mysqli_close($connect);  
  header("Location: ". $_SERVER["SCRIPT_NAME"]);
}
# ===
# ��ǹź������
if ($act == "del : confirm") {
   $connect = new mysqli($host,$user,$password,$db);
   $result = $connect->query("delete from $tb where CustomerID ='". $_REQUEST{'CustomerID'} . "'");   
   if ($result) $_SESSION["msg"] = "delete : completely";
  mysqli_close($connect);
  header("Location: ". $_SERVER["SCRIPT_NAME"]);
}
# ===
# ��ǹ��䢢�����
if ($act == "edit : confirm") {
  $connect = new mysqli($host,$user,$password,$db);
  $result = $connect->query("update $tb set CompanyName ='". $_REQUEST{'CompanyName'} . "',  ContactName ='". $_REQUEST{'ContactName'} . "' where CustomerID =" . $_REQUEST{'CustomerID'});      
  if ($result) $_SESSION["msg"] = "edit : completely";
  mysqli_close($connect);
  header("Location: ". $_SERVER["SCRIPT_NAME"]);
}
?>
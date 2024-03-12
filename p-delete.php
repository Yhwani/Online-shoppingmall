<? include ("top.html"); ?>
<br><br><br><br><br><br><br><br><br>
<?
echo("
<link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
<link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
<link href=\"https://fonts.googleapis.com/css2?family=Outfit:wght@800&display=swap\" rel=\"stylesheet\">
<style>
.p {
    font-family:'Outfit', sans-serif;
	font-weight: 900;
    }
.p1 {
    font-family:'Poor Story', cursive;
    }
</style>
<style>
	.b {background:black;
		font-size : 5;}
	.tag {border-left:0 solid black; border-right:0 solid black; border-top:0 solid black;
		border-bottom:1px solid black;}
	.tag1 {border-left:0 solid black; border-right:0 solid black; border-top:0 solid black;
		border-bottom:2px solid black;}
	.tag2 {border-left:1px solid lightgray; border-right:1px solid lightgray; border-top:1px solid lightgray;
	border-bottom:1px solid lightgray;}
	.tag3{border-spacing: 40px;
  border-collapse: separate;}
</style>");

$con=mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("shopmall", $con);

$result = mysql_query("select * from product where code='$code'", $con);

$name=mysql_result($result,0,"name");

echo ("
    <table border=0 width=650 align=center>
	<tr><td width=100 align=right>상품코드 :</td>
    <td width=325><b>&nbsp;$code</b></td></tr>
	<tr><td width=325 align=right>상품이름 :</td><td width=325 align><b>&nbsp;$name</b></td></tr>
	<tr><td colspan=2 height=50 align=center valign=center>위 상품을 삭제하시겠습니까?</td></tr></table>
	<table border=0 width=650 align=center class='tag3'>
	<tr><td align=center class='b' width=325><form method=post action='p-delete2.php?code=$code'><button type=\"submit\" class='b'><font color=white size=3>확인</button></form></td>
	<td align=center class='b' width=325><form method=post action= p-adminlist.php ><button type=submit class='b'><font color=white size=3>돌아가기</button></form></td></tr>
	</table>");
	
mysql_close($con);

?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<? include ("bottom.html"); ?>
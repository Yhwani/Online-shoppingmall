<? include ("top.html"); ?>

<br><br><br>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@800&display=swap" rel="stylesheet">
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
</style>

<table border=0 width=500 align=center class='tag1'>
<tr><td align=center class='p'><font size=5><b>*** 관리자메뉴  ***</b></font></td></tr>
<tr><td align=center height=45></td></tr>
</table><br><br>
<table border=0 width=1200 align=center class='tag3'>
<tr><td width=350 height=350 align=center class='p, tag2'><a href=membershow.php class='fas fa-id-badge fa-lg'>Profile<br><br><font size=3><b>회원목록</b></font>
	</a><br><br><font size=2>회원들의 개인정보를 관리하는 공간입니다.</font></td>
    <td width=350 height=350 align=center class='p, tag2'><a href=p-input.php class='fas fa-check fa-lg'>Product<br><br><font size=3><b>상품등록</b></font>
	</a><br><br><font size=2>관리자가 상품을 등록하실 수 있습니다.</font></td>
	<td width=350 height=350 align=center class='p, tag2'><a href=orderlist.php class='fas fa-boxes fa-lg'>Order<br><br><font size=3><b>주문내역</b></font>
	</a><br><br><font size=2>관리자가 회원들의 주문내역을 확인하실 수 있습니다.</font></td>
	<td width=350 height=350 align=center class='p, tag2'><a href=p-adminlist.php class='fas fa-list-ol fa-lg'>Modify<br><br><font size=3><b>상품수정</b></font>
	</a><br><br><font size=2>관리자가 상품을 수정하실 수 있습니다.</font></td>
</tr>

</table>
<br><br><br>
<?

$con=mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);

$result = mysql_query("select * from product where code='$code'", $con);

$class=mysql_result($result,0,"class");
$name=mysql_result($result,0,"name");
$price1=mysql_result($result,0,"price1");
$price2=mysql_result($result,0,"price2");
$content=mysql_result($result,0,"content");
$userfile=mysql_result($result,0,"userfile");
		
echo ("
    <table align=center border=0 width=900>     
	<form method=post action=p-modify2.php?code=$code enctype='multipart/form-data'>
	<tr height=45><td width=200 align=right>상품코드  : &nbsp;</td>
	<td align=left width=150><b>$code</b></td><td width=70>상품분류 : &nbsp;</td>
	<td><select name=class>");

switch($class) {
    case 1:
		echo ("<option value=1 selected>OUTER</option>
			<option value=2>TOP</option>
            <option value=3>PANTS</option>
			<option value=4>Y.LABEL</option>");
		break;
	case 2:
		echo ("<option value=1>OUTER</option>
			<option value=2 selected>TOP</option>
            <option value=3>PANTS</option>
			<option value=4>Y.LABEL</option>");
		break;
	case 3:
       echo ("<option value=1>OUTER</option>
			<option value=2>TOP</option>
            <option value=3 selected>PANTS</option>
			<option value=4>Y.LABEL</option>");
		break;
	case 4:
       echo ("<option value=1>OUTER</option>
			<option value=2>TOP</option>
            <option value=3>PANTS</option>
			<option value=4 selected>Y.LABEL</option>");
		break;
}

echo ("</select></td></tr>
	<tr height=45><td align=right>상품이름 : &nbsp;</td><td colspan=3><input type=text name=name size=40 value='$name'></td></tr>
	<tr height=45><td align=left colspan=4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<textarea name=content rows=15 cols=75>$content</textarea></td></tr>
	<tr height=45><td align=right>정상가격 : &nbsp;</td><td width=170><input type=text name=price1 size=15 value=$price1>원</td><td width=85>할인가격 : &nbsp;</td>
	<td><input type=text name=price2 size=15 value=$price2>원</td></tr>
	<tr height=45><td align=right>상품사진 : &nbsp;</td><td colspan=3><input type=file size=30 name=userfile><-- $userfile</td></tr>
	<tr height=45></tr><tr height=45><td align=center colspan=4><button type=submit class='b' style='height:70px; width:300px;'><font color=white size=3>수정완료</button></td></tr></form></table>
");

mysql_close($con);

?>
<br><br><br>
<? include ("bottom.html"); ?>
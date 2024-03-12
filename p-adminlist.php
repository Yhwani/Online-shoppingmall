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
    .tag4 {border-left:0 solid lightgray; border-right:0 solid lightgray; border-top:1px solid lightgray;
	border-bottom:1px solid lightgray;}
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
echo("<link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
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
  .tag5 {border-left:0 solid lightgray; border-right:0 solid lightgray; border-top:1px solid lightgray;
	border-bottom:1px solid lightgray;}
	.table1 {
    border-top: 1px solid #444444;
	border-left:0 solid black; border-right:0 solid black; border-bottom:0 solid black;
    border-collapse: collapse;
  }
  .td1 {
    border-bottom: 1px solid #444444;
    padding: 10px;
  }
</style>"
);

$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);
	
$result = mysql_query("select * from product order by name", $con);

$total = mysql_num_rows($result);

echo("<table border=0 width=500 align=center class='tag1'><tr><td align=center class='p'><font size=4><b>상품수정</b></font></td></tr>
<tr><td height=45></td></tr></table>");

echo ("<br><br>
	<table border=0 width=1200 align=center class='table1'>
	<tr height=50><td align=center class='td1'><font size=3><b>상품명</b></td>
	<td align=center class='td1'><font size=3><b>카테고리</b></td>
	<td colspan=2 align=center class='td1'><font size=3><b>상품명</b></td>
	<td align=right class='td1'><font size=3><b>권장가격</b></td>
	<td align=right class='td1'><font size=3><b>판매가격</b></td>
	<td align=center class='td1'><font size=3><b>수정/삭제</b></td></tr>");
							
if (!$total) {

  echo("<tr><td colspan=6 align=center>아직 등록된 상품이 없습니다</td></tr>");

} else {

	$counter = 0;

	while ($counter < $total) :

		$code=mysql_result($result,$counter,"code");
		$class=mysql_result($result,$counter,"class");
		$name=mysql_result($result,$counter,"name");
		$userfile=mysql_result($result,$counter,"userfile");
		$price1=mysql_result($result,$counter,"price1");
		$price2=mysql_result($result,$counter,"price2");

		echo ("
		   <tr height=70><td width=100 align=center><font size=2><b>$code</b></td>
			 <td width=100 align=center><font size=2><b>$class</b></td>
			 <td align=center width=30><img src=./photo/$userfile width=40 height=40 border=0></td>
			   <td width=350 align=left><a href=p-show.php?code=$code><font size=2><b>$name</b></a></td>
			   <td align=right width=70><font size=2><strike><b>$price1&nbsp;원</b></strike></td>
			   <td align=right width=70><font size=2><b>$price2&nbsp;원</b></td>
			   <td width=70 align=center><font size=2><b><a href=p-modify.php?code=$code>수정</a>/<a href=p-delete.php?code=$code>삭제</a></b></td></tr>");

		$counter++;
	endwhile;
}

echo ("</table>");
	     
mysql_close($con);
echo("<br><br><br>");
?>

<br><br><br>
<? include ("bottom.html"); ?>
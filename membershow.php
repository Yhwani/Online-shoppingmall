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

if ($UserID != 'admin') {
	echo ("<script>
		window.alert('관리자만 접근 가능한 기능입니다')
		history.go(-1)
		</script>");
    exit;
} 

$con = mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("shopmall", $con);
	
$result = mysql_query("select * from member order by uname", $con);
$total = mysql_num_rows($result);

echo ("
	<table border=0 width=690 align=center class='tag1'>
    <tr><td align=center><font size=4><b>회원목록</b></td></tr><tr height=45><td></td></tr></table><br><br><br> ");


echo ("
	<table border=0 width=900 align=center class='table1'>
	<tr height=45>
	<td align=center width=60 class='td1'><font size=3><b>ID</b></td>
	<td align=center width=50 class='td1'><font size=3><b>이름</b></td>
	<td align=center width=340 class='td1'><font size=3><b>주소</b></td>
	<td align=center width=100 class='td1'><font size=3><b>전화번호</b></td>
	<td align=center width=100 class='td1'><font size=3><b>이메일</b></td>
	<td align=center width=40 class='td1'><font size=3><b>승인</b></td></tr>
");	
$i = 0;	
while($i < $total):
	$uid = mysql_result($result, $i, "UID");
	$uname = mysql_result($result, $i, "UNAME");
	$zip = mysql_result($result, $i, "ZIPCODE");
	$addr1 = mysql_result($result, $i, "ADDR1");
	$addr2 = mysql_result($result, $i, "ADDR2");
	$mphone = mysql_result($result, $i, "MPHONE");
	$email = mysql_result($result, $i, "EMAIL");
	$approved = mysql_result($result, $i, "APPROVED");

	$address = "(" . $zip .   ")" . "&nbsp;" . $addr1 . "&nbsp;" .   $addr2;
	
    echo ("<tr height=30><td align=center><font size=2><b>$uid</b></td>
		<td align=center><font size=2><b>$uname</b></td>
		<td><font size=2><b>$address</b></td>
		<td align=center><font size=2><b>$mphone</b></td>
		<td align=center><font size=2><b>$email</b></td>");
		
	if ($approved == 0) {
		echo ("<td align=center><a href=memberchange.php?uid=$uid><font size=2>대기</a></td></tr>");
	} else {
		echo ("<td align=center><a href=memberchange.php?uid=$uid><font size=2>완료</a></td></tr>");
	}
	      
	$i++;
endwhile;

echo ("</table>");
mysql_close($con);
echo("<br><br><br>");
?>
<br><br><br>
<? include ("bottom.html"); ?>
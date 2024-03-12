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

echo ("
	<table border=0 width=690 align=center class='tag1'>
    <tr><td align=center><font size=4><b>주문내역</b></td></tr><tr height=45><td></td></tr></table><br><br><br> ");
	  	  
$con = mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("shopmall",   $con);
	
$result = mysql_query("select * from receivers order by buydate desc", $con);
$total = mysql_num_rows($result);
echo ("
	<table border=0 width=900 align=center class='table1'>
	<tr height=45>
	<td align=center width=90 class='td1'><font size=3><b>주문번호</b></td>
	<td align=center width=120 class='td1'><font size=3><b>주문일자</b></td>
	<td align=center width=300 class='td1'><font size=3><b>주문내역</b></td>
	<td align=center width=100 class='td1'><font size=3><b>주문총액</b></td>
	<td align=center width=100 class='td1'><font size=3><b>상태변경</b></td></tr>
");	


if ($total > 0) {	

	$counter = 0;
		
	while($counter < $total) :

		$session =  mysql_result($result, $counter, "session");
		$buydate = mysql_result($result, $counter, "buydate");
		$ordernum = mysql_result($result, $counter, "ordernum");
		$status = mysql_result($result, $counter, "status");
			 
		switch ($status) {
			case 1:
				$tstatus = "주문신청";
				break;
			case 2:
				$tstatus = "주문접수";
				break;
			case 3: 
				$tstatus = "배송준비중";
				break;
			case 4:
				$tstatus = "배송중";
				break;
			case 5:
				$tstatus = "배송완료";
				break;
			case 6:
				$tstatus = "구매완료";
				break;
		}
		  
		$subresult = mysql_query("select * from orderlist where session='$session'",   $con);
		$subtotal = mysql_num_rows($subresult);

		$subcounter=0;
		$totalprice=0;

		while ($subcounter < $subtotal) :
			$pcode = mysql_result($subresult, $subcounter, "pcode");
			$quantity = mysql_result($subresult, $subcounter, "quantity");
			$tmpresult = mysql_query("select * from product where code='$pcode'", $con);
			$pname = mysql_result($tmpresult, 0, "name");
			$price = mysql_result($tmpresult, 0, "price2");
		   
			$subtotalprice = $quantity * $price;
			$totalprice = $totalprice + $subtotalprice;
			$subcounter++;
		endwhile;
		
		$items = $subtotal - 1;
		
		echo ("<tr><td align=center><a href=#   onclick=\"window.open('detailview.php?ordernum=$ordernum', '_new', 'width=940, height=250, scrollbars=yes');\"><font size=2>$ordernum</a></td>
			<td align=center><font size=2>$buydate</td>
			<td><font size=2>$pname 외 $items 종</td>
			<td align=center><font size=2>&nbsp;&nbsp;$totalprice 원</td>
			<td align=center><font size=2>");
		if ($status < 6) { 
			echo ("<a href=changestatus.php?ordernum=$ordernum> <b>$tstatus</b></a></td></tr>");
		} else {
		  echo ("<b>$tstatus</b></td></tr>");
		}
		
		$counter++;

	endwhile;

} else {
       echo ("<tr><td align=center colspan=5><font size=2><b>주문 내역이 존재하지 않습니다</b></td></tr>");
}

echo ("</table>");

mysql_close($con);
echo("<br><br><br><br><br><br>");
?>
<? include ("bottom.html"); ?>
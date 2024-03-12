<? include ("top.html"); ?>
<br><br><br>

<?
echo("<style>
	.b {background:black;
		padding: 13px 65px;
		font-size : 5;}
	.tag {border-left:0 solid black; border-right:0 solid black;border-top:0 solid black;
		border-bottom:1px solid black;}
	.tag1 {border-left:0 solid black; border-right:0 solid black;border-top:0 solid black;
		border-bottom:2px solid black;}
</style>");
?>

<?

$con = mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("shopmall",   $con);
$result = mysql_query("select * from member where uid='$UserID'", $con);
	
$uid = mysql_result($result, 0,   "UID");
$uname = mysql_result($result, 0,   "UNAME");
$email = mysql_result($result, 0,   "EMAIL");
$zip = mysql_result($result, 0,   "ZIPCODE");
$addr1 = mysql_result($result, 0,   "ADDR1");
$addr2 = mysql_result($result, 0,   "ADDR2");
$mphone = mysql_result($result, 0,   "MPHONE");

?>
<table width=900 border=0 align=center>
<tr><td align=center class='tag1'><font size=4 class='p'><b> 회원 정보 </b></font></td></tr>
<tr height=45><td align=right><a href=umodify.php><font size=3 class='p'>회원정보수정</a></td></tr>
</table><br>

<table border=0 width=900 align=center>
<tr height=50><td width=100 align=right><font size=3 class='p'>이름 &nbsp;: &nbsp;&nbsp;</td>
<td width=100><font size=3 class='p'><? echo $uname; ?></td></tr><tr height=50>
<td width=80 align=right><font size=3 class='p'>휴대전화 &nbsp;: &nbsp;&nbsp;</td>
<td width=140><font size=3 class='p'><? echo $mphone; ?></td></tr><tr height=50>
<td width=80 align=right><font size=3 class='p'>이메일 &nbsp;: &nbsp;&nbsp;</td>
<td width=170><font size=3 class='p'><? echo $email; ?></td></tr>
<tr height=50><td align=right><font size=3 class='p'>주소 &nbsp;: &nbsp;&nbsp;</td>
<td colspan=5><font size=3 class='p'><? echo $zip . " " . $addr1 . " " . $addr2;   ?></td></tr>
</table>
<br><br>

<?
$result = mysql_query("select * from receivers where id='$UserID' order by buydate desc", $con);
$total = mysql_num_rows($result);

echo ("
	<table width=900 border=0 align=center class='tag1'>
	<tr height=50><td   align=center class='tag'><font size=4 class='p'><b>구매내역</b></td></tr>
	<tr height=35><td>* <font color=red   size=2 class='p'>주문 물품이 배송 이전 단계이면 온라인으로 주문   취소가 가능합니다.</td></tr>
	<tr height=35><td>* <font size=2 class='p'>배송중이거나 구매 완료된 제품에 대한 반품 및 환불 요청은     당사 고객센터(전화: 070-4065-8670)로 문의바랍니다.</td></tr>
	</table>
	<table border=0 width=900 align=center class='tag1'>
	<tr height=40><td align=center><font size=3>구매번호</td>
	<td align=center><font size=3>구매일자</td>
	<td align=center><font size=3>주문내역</td>
	<td align=center><font size=3>금액</td>
	<td align=center><font size=3>주문상태</td></tr></table>
	<table border=0 width=900 align=center>");	

if ($total > 0) {	
	$counter = 0;
	while($counter < $total) :
		$session = mysql_result($result, $counter, "session");
		$buydate = mysql_result($result, $counter, "buydate");
		$ordernum = mysql_result($result, $counter, "ordernum");
		$status = mysql_result($result, $counter, "status");
		$oldstatus = $status;
	 
		switch ($status) {
		  case 1:
				$status = "주문신청";
				break;
		  case 2:
				$status = "주문접수";
				break;
		  case 3: 
				$status = "배송준비중";
				break;
		  case 4:
				$status = "배송중";
				break;
		  case 5:
				$status = "배송완료";
				break;
		  case 6:
				$status = "구매완료";
				break;
		}
	 
		$subresult = mysql_query("select * from orderlist where session='$session'",   $con);
        $subtotal =  mysql_num_rows($subresult);

        $subcounter=0;
        $totalprice=0;

        while ($subcounter <   $subtotal) :
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
	
        echo ("<tr><td align=center><font size=2>
			<a href=# onclick=\"window.open('detailview.php?ordernum=$ordernum', '_new',   'width=940, height=250, scrollbars=yes');\">$ordernum</a></td><td   align=center><font size=2>$buydate</td>
			<td><font size=2>$pname 외 $items 종</td><td ><font   size=2>$totalprice 원</td>
			<td ><font size=2>$status");
      
		if ($oldstatus < 4) echo ("<br>(<a href=ordercancel.php?ordernum=$ordernum>주문취소</a>)");

		echo ("</td></tr>");

		$counter++;
	endwhile;

} else {

	echo ("<tr height=40><td align=center colspan=5><font size=3><b>주문 내역이 존재하지 않습니다</b></td></tr>");

}

echo ("</table>");

mysql_close($con);	

?>
<br><br><br><br><br><br>
<? include ("bottom.html"); ?>
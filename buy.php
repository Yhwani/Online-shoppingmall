<? include ("top.html"); ?>
<br><br><br>

<script language='Javascript'>
	function go_zip(){
		window.open('zipcode2.php', 'zipcode',   'width=470, height=180, scrollbars=yes');
	}
</script>

<table align=center width=900 border=0>
<tr height=70><td align=center class="tag1"><font size=3 class='p'><b>상품 구매 단계</b></td></tr>
<tr height=70><td align=right><font size=3 class='p'><b><? echo $UserName; ?></b>님의 구입 예정   품목</td>
</table>

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
</style>");

$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);

// 전체 쇼핑백 테이블에서 특정 사용자의 구매 정보만을 읽어낸다
$result = mysql_query("select * from shoppingbag where session='$Session'", $con);
$total = mysql_num_rows($result);

echo ("
	<table border=0 width=900 align=center>
    <tr><td width=200 align=center><font size=3 class='p'>상품사진</td>
	<td width=300 align=center><font size=3 class='p'>상품이름</td>
	<td width=150 align=center><font size=3 class='p'>가격(단가)</td>
	<td width=100 align=center><font ssize=3 class='p'>수량</td>
	<td width=120 align=center><font size=3 class='p'>품목별합계</td></tr>
	");

if (!$total) {
     echo("<tr><td colspan=5 align=center><font   size=2><b>쇼핑백에 담긴 상품이   없습니다.</b>
        </font></td></tr></table>");
} else {

    $counter=0;
    $totalprice=0;    // 총 구매 금액  

    while ($counter < $total) :
		$pcode = mysql_result($result, $counter, "pcode");
		$quantity = mysql_result($result, $counter, "quantity");
      
		$subresult = mysql_query("select * from product where code='$pcode'", $con);
		$userfile = mysql_result($subresult, 0, "userfile");
		$pname = mysql_result($subresult, 0, "name");
		$price = mysql_result($subresult, 0, "price2");
       
		$subtotalprice = $quantity * $price;
		$totalprice = $totalprice + $subtotalprice; 
	 
		echo("<tr><td align=center><a href=#   onclick=\"window.open('./photo/$userfile', '_new', 'width=450, height=450')\"><img src='./photo/$userfile' width=125 border=0></a></td>
			<td align=center><font size=3 class='p'><a href=p-show.php?code=$pcode>$pname</a></td>
			<td align=right><font size=3 class='p'>$price&nbsp;원</td>
			<td align=center><font size=3 class='p'>$quantity&nbsp;개</td>
			<td align=right><font size=3 class='p'>$subtotalprice&nbsp;원</td></tr>");

		$counter++;

    endwhile;
 
     echo("<tr height=60><td colspan=5 align=right><font size=3 class='p'>총 구매 금액: $totalprice 원</td></tr></table>");
}

mysql_close($con);	//데이터베이스 연결해제

echo ("<br>
		<table border=0 width=900 align=center>
        <tr><td align=center><font size=3>입금 계좌: <b>기업 123-123123-12345 (예금주: 이영환)</b><br><br>
		* 구입하신 물품은 입금 확인후 배송되며, 주문 진행 상황은 MYPAGE에서 확인하실 수 있습니다.<br>
		* 물품 배송 이전에 주문 취소를 원하시면 MYPAGE에서 직접 주문 취소 요청을 하시면 됩니다.<br>
		* 물품을 배송 받으신 후에 구매 취소를 원하시면 고객센터(전화:010-1234-1234)로 연락주세요.
       </td></tr>
       </table>");

echo("
    <br><br><br><br>
	<table width=900 border=0 align=center class='tag1'>
	<tr height=70><td align=center><font size=3 class='p'><b>배송정보 입력</b></td></tr>
	</table>
	<br><br>
	<table width=900 border=0 align=center>
	<form method=post action=endshopping.php name=buy>
	<tr><td align=right><font size=3 class='p'>받는이</td>
	<td><input type=text name=receiver size=10></td>
	</tr>
	<tr height=50>
	<td align=right><font size=3 class='p'>전화번호</td>
	<td><input type=text name=phone   size=20></td>
	</tr>
	<tr height=50><td height=30 align=right><font size=3 class='p'>배송주소</td>
	<td align=left><input type=text size=6 name=zip readonly=readonly>
	<font size=3 class='p'>[<a href='javascript:go_zip()'>우편번호검색</a>]<br><br>
	<input  type=text size=55 name=addr1 readonly=readonly style='font-size:10pt; font-family:Tahoma;'>
	<input type=text size=30 name=addr2   style='font-size:10pt; font-family:Tahoma;'></td>
	<tr height=50><td align=right><font size=3 class='p'>주문요구사항</td>
	<td height=50><textarea name=message rows=4 cols=65></textarea></td></tr>
	<tr height=100><td align=center colspan=2>
	<button type=submit class='tag, b'><font class='p' size=3 color=white>구매완료</button></td></tr>
	</table>
	</form>
	</center>
");

?>
<br><br><br>
<? include ("bottom.html"); ?>
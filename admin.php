
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
<? include ("bottom.html"); ?>
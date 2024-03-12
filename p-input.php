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
<table border=0 width=690 align=center class='tag1'>
    <tr><td align=center><font size=4><b>상품등록</b></td></tr><tr height=45><td></td></tr></table><br><br><br>
<table border=0 width=650 align=center>
<form method=post action=p-process.php enctype='multipart/form-data'>
<tr>
<td width=100 align=right>상품분류 :&nbsp;</td>
<td width=30>
	<select name=class>
	<option value=1>OUTER</option>
	<option value=2>TOP</option>
	<option value=3>PANTS</option>
	<option value=4>Y.LABEL</option>
	</select>
</td>
<td align=right width=80>상품코드 :&nbsp;&nbsp;&nbsp;</td><td><input type=text name=code size=20></td>
</tr>
<tr>
<td align=right>상품이름 :&nbsp;</td>
<td colspan=3><input type=text name=name size=70></td>
</tr>
<tr>
<td colspan=4 align=center><textarea name=content rows=15 cols=83></textarea></td>
</tr>
<tr height=50>
<td align=right>정상가격 : &nbsp;</td>
<td width=175><input type=text name=price1 size=15>원</td>
<td align=right width=150>할인가격 : &nbsp;</td>
<td><input type=text name=price2 size=15>원</td>
</tr>
<tr height=50>
<td align=right>상품사진 : &nbsp;</td>
<td colspan=3 ><input type=file size=30 name=userfile class='tag1'></td>
</tr>
<tr height=35><td colspan=4></td></tr>
<tr>
<td colspan=4 align=center>
<button type=submit class='b' style="height:60px; width:180px"><font color=white class='p' size=3>등록</button></td>
</tr>
</form>
</table>
<br><br><br>
<? include ("bottom.html"); ?>
<? include ("top.html"); ?>
<br><br><br>
<? 
$con =   mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("shopmall",   $con);
	
$result = mysql_query("select * from member where uid='$UserID'", $con);
	
$uname = mysql_result($result, 0, "uname");
$email = mysql_result($result, 0, "email");
$zip = mysql_result($result, 0, "zipcode");
$addr1 = mysql_result($result, 0,  "addr1");
$addr2 = mysql_result($result, 0,  "addr2");
$mphone = mysql_result($result, 0, "mphone");

echo ("

<style type=\"text/css\">
   .topline{border-top:2px solid black;
   } 
   .botline{border-bottom:2px solid black; 
   }
   .buttonline{border-top:2px solid black; 
               border-bottom:2px solid black; 
   }
 a:visited {text-decoration: none; color: #333333; 
 }
 
	.b {background:black;
		font-size : 5;}
	.tag {border-left:0 solid black; border-right:0 solid black;border-top:0 solid black;
		border-bottom:1px solid black;}
	.tag1 {border-left:0 solid black; border-right:0 solid black;border-top:0 solid black;
		border-bottom:2px solid black;}
</style>
	<script language='Javascript'>
	function go_zip(){
		window.open('zipcode.php','ZIP','width=470, height=180, scrollbars=yes');
	}
	</script>

	<form action=register2.php method=post name=comma>
	<table width=920 border=0 cellpadding=0 cellspacing=5 align=center class='tag1'>
	<tr height=40><td height=40 align=center><font size=4 class='p'><b>회원정보수정</b></td></tr>
	</table><br><br>
	<table border=1 width=900 align=center>
	<tr><td>
		<table width=900 border=0 align=center>
			<tr height=35><td width=5% align=right>*</td>
			<td width=15% height=30><font size=2>회원 ID</td>
			<td width=80%><font   size=2><b>$UserID</b></td></tr>
			<tr height=35><td align=right>*</td>
			<td height=30><font size=2>비밀번호</font></td>
			<td><input type=password   maxlength=15 style='height:20;' size=20 name=upass1></td></tr>
			<tr height=35><td   align=right>*</td>
			<td height=30><font size=2>비밀번호확인</font></td>
			<td><input type=password   maxlength=15 style='height:20;' size=20 name=upass2></td></tr>
			<tr height=35><td align=right>*</td>
			<td height=30><font size=2>이 름</font></td>
			<td><input type=text size=10   name=uname value=$uname></td></tr>
			<tr height=35><td align=right>*</td>
			<td height=30><font size=2>휴대전화</font></td>
			<td><input type=text size=20 name=mphone value=$mphone></td> </tr>
			<tr height=35><td align=right>*</td>
		    <td height=30><font size=2>이메일</td>
		    <td><input type=text size=30 name=email value=$email></td></tr>
			<tr height=35><td align=right>*</td>
		    <td height=30><font size=2>집주소</td>
		    <td><input type=text size=7   name=zip value=$zip readonly=readonly> <font size=2>[<a   href='javascript:go_zip()'>우편번호검색</a>]</font><br>
			<input type=text size=50 name=addr1 value='$addr1' readonly=readonly><br><input type=text size=35 name=addr2 value='$addr2'> 
			</td></tr>
		</table>
    </td></tr>
	</table>
	<br><br>
	<table width=670 border=0 cellpadding=0 cellspacing=5 align=center>
	<tr><td height=40 align=center><button type=submit class='tag, b' style=\"height:70px; width:175px\"><font color=white size=4 class='p'>회원정보수정</button></td></tr>
	</table>
	</form>
");

?>
<br><br><br><br><br><br>
<? include ("bottom.html"); ?>
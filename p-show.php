<? include ("top.html"); ?>
<br><br><br>
<?

$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);

$result = mysql_query("select * from product where code='$code'", $con);
$total = mysql_num_rows($result);

$name=mysql_result($result,0,"name");
$content=mysql_result($result,0,"content");
$content=nl2br($content);

$price1=mysql_result($result,0,"price1");
$price2=mysql_result($result,0,"price2");
$userfile=mysql_result($result,0,"userfile");

echo("<style>

  .table3 {
    border: 1px solid #444444;
  }
  .td6 {
    border-bottom: 1px solid #444444;
    padding: 10px;
  } 
</style>");

echo ("
	<table width=650 border=0 align=center>
    <tr><td width=250 align=center>
	<a href=# onclick=\"window.open('./photo/$userfile', '_new', 'width=450, height=450')\"><img src='./photo/$userfile' width=250 border=1></a></td>
    <td width=400 valign=top>
    <table border=0 width=100%>
	  <tr><td align=center>상품이름: </td>
	  <td>&nbsp;&nbsp;$name</td></tr>
	  <tr><td align=center>상품가격: </td>
	  <td>&nbsp;&nbsp;<strike>$price1&nbsp;원</strike></td></tr>
	  <tr><td align=center>할인가격: </td>
	  <td>&nbsp;&nbsp;<b>$price2&nbsp;원</b></td></tr>
    	  <tr><td colspan=2 height=100 valign=bottom align=center>
	     <form method=post action=tobag.php?code=$code>
	     <input type=text size=3 name=quantity value=1>&nbsp;
	     <input type=submit value=담기>
	     </td></tr></form>
	</table>
	</td>
	</tr>
	</table>	
	<br><br><br><br>
	<table width=650 border=0 align=center>
	<tr><td align=center>[상품 상세 설명]</td></tr>
	<tr><td><hr size=1></td></tr>
	<tr><td>$content</td></tr>
	</table><br><br><br>
");

$id = $code;
mysql_close($con);

$con2=mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con2);

$result=mysql_query("select * from comment where id='$id'",$con2);
$total = mysql_num_rows($result);

echo("<table border=0 align=center class='table3'>");
$count = 0;
if ($total >0){
while ($count < $total) :
	$writer=mysql_result($result,$count,"writer");
	$passwd=mysql_result($result,$count,"passwd");
	$wdate=mysql_result($result,$count,"wdate");
	$content=mysql_result($result,$count,"content");
	echo("<tr height=60 class='td6'><td width=100 align=center class='p'><font size=3>$writer</td><td width=500 class='p'><font size=3>$content</td>
	<td align=right class='p'><font size=3>$wdate</td></tr></tr>");
	$count++;
endwhile;
echo("</table>");
}

echo("<br><br>
	<form method=post action=p-comment.php?&id=$id>
	<table width=700 border=0 align=center>
	<tr>
	<td width=40 align=left class='p'><b>이름</b></td><td align=left width=70><input type=text name=writer size=15>
	<td rowspan=2 align=left><textarea name=content rows=3 cols=59></textarea></td>
	<td align=left rowspan=\"2\">
	<button type=submit class='fas fa-check fa-lg'>
	</td>
	</tr>
	<tr><td width=40 align=left class='p'><b>암호</b></td><td width=70><input type=password name=passwd size=15></td>
	</tr>
	</table>
	</form>
");

mysql_close($con2);
?>

<br><br><br>
<? include ("bottom.html"); ?>
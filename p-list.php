<? include ("top.html"); ?>
<br><br><br>

<?						
echo("<style>
tag3{border-spacing: 40px;
  border-collapse: separate;}
  .a2 {color:lightgrey;}</style>");

$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);
	   
if (!isset($class)) $class=0;

switch($class) {
   case 0:        // 초기화면에 출력할 인기 상품 목록
       $result = mysql_query("select * from product class=$class order by hit desc", $con);
		break;
   default:       // 카테고리별 메뉴 화면에 출력할 상품 목록
       $result = mysql_query("select * from product where class=$class order by hit desc", $con);
		break;
}

$total = mysql_num_rows($result);


switch($mode) {
   case 4:        
       $result = mysql_query("select * from product where class=$class && name like \"%자켓%\"", $con);
		break;
   case 1:        
       $result = mysql_query("select * from product where class=$class && name like \"%코트%\"", $con);
		break;
   case 2:        
       $result = mysql_query("select * from product where class=$class && name like \"%패딩%\"", $con);
		break;
   case 3:        
       $result = mysql_query("select * from product where class=$class && name like \"%블레이저%\"", $con);
		break;
}

$total = mysql_num_rows($result);

if ($class == 1) {
echo("<table align=center border=0><tr align=center><td colspan=4><font class='p' size=7 color=grey>OUTER</td></tr></table><br><br>");
echo("<table align=center class='tag3'><tr align=center><td><font class='p' size=5 color=lightgrey>
|&nbsp;&nbsp;&nbsp;<a href=p-list.php?class=1&mode=1 class='a2'>코트</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href=p-list.php?class=1&mode=2 class='a2'>패딩</a>
&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href=p-list.php?class=1&mode=3 class='a2'>
블레이저</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href=p-list.php?class=1&mode=4 class='a2'>자켓</a>&nbsp;&nbsp;&nbsp;|</td></tr></table>");
}
if ($class == 2) {
echo("<table align=center border=0><tr align=center><td colspan=4><font class='p' size=7 color=grey>TOP</td></tr></table><br><br>");
echo("<table align=center class='tag3'><tr align=center><td><font class='p' size=5 color=lightgrey>
|&nbsp;&nbsp;&nbsp;<a href=p-list.php?class=1&mode=1 class='a2'>티셔츠</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href=p-list.php?class=1&mode=2 class='a2'>맨투맨</a>
&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href=p-list.php?class=1&mode=3 class='a2'>
셔츠</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href=p-list.php?class=1&mode=4 class='a2'>니트</a>&nbsp;&nbsp;&nbsp;|</td></tr></table>");
}
if ($class == 3) {
echo("<table align=center border=0><tr align=center><td colspan=4><font class='p' size=7 color=grey>PANT</td></tr></table><br><br>");
echo("<table align=center class='tag3'><tr align=center><td><font class='p' size=5 color=lightgrey>
|&nbsp;&nbsp;&nbsp;<a href=p-list.php?class=1&mode=1 class='a2'>청바지</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href=p-list.php?class=1&mode=2 class='a2'>슬랙스</a>
&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href=p-list.php?class=1&mode=3 class='a2'>
면바지</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href=p-list.php?class=1&mode=4 class='a2'>스포츠</a>&nbsp;&nbsp;&nbsp;|</td></tr></table>");
}
if ($class == 4) {
echo("<table align=center border=0><tr align=center><td colspan=4><font class='p' size=7 color=grey>OUTER</td></tr></table><br><br>");
echo("<table align=center class='tag3'><tr align=center><td><font class='p' size=5 color=lightgrey>
|&nbsp;&nbsp;&nbsp;<a href=p-list.php?class=1&mode=1 class='a2'>코트</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href=p-list.php?class=1&mode=2 class='a2'>패딩</a>
&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href=p-list.php?class=1&mode=3 class='a2'>
블레이저</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href=p-list.php?class=1&mode=4 class='a2'>자켓</a>&nbsp;&nbsp;&nbsp;|</td></tr></table>");
}
	
echo ("<br><br><br><br><br><table border=0 width=690 align=center style=\"border-spacing:60px; 120px; border-collapse:separate;\"><tr>");



if (!$total){
	echo ("<td align=center><font color=red>아직 등록된 상품이 없습니다</td>");
} else {

	$counter = 0;
	$row_counter = 0;
	while ($counter < $total && $counter < 15) :

		if ($counter > 0 && ($counter % 4) == 0) echo ("</tr><tr><td colspan=5><hr size=1 color=green width=100%></td></tr><tr>");

		$code=mysql_result($result,$counter,"code");
		$name=mysql_result($result,$counter,"name");
		$userfile=mysql_result($result,$counter,"userfile");
		$price2=mysql_result($result,$counter,"price2");

		switch(strlen($price2)) {
		  case 6: 
			 $price2 = substr($price2, 0, 3) . "," . substr($price2, 3, 3);
			 break;
		  case 5:
			 $price2 = substr($price2, 0, 2) . "," . substr($price2, 2, 3);
			 break;
		  case 4:
			 $price2 = substr($price2, 0, 1) . "," . substr($price2, 1, 3);
			 break;		   
		}
		
		echo ("<td width=135 align=center><a href=p-show.php?code=$code> <img src='./photo/$userfile' width=300 height=275 border=0><br><font color=blue style='text-decoration:none; font-size:10pt;'>
		$name</a></font><br>");
		echo ("<font color=red size=2>$price2&nbsp;원</font></td>");
		$counter++;
	endwhile;
}

echo ("</tr></table>");
   
mysql_close($con);

?>
<br><br><br><br><br><br><br><br><br>
<? include ("bottom.html"); ?>
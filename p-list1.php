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

$result = mysql_query("select * from product order by code desc", $con);
$total = mysql_num_rows($result);



echo("<table align=center border=0><tr align=center><td colspan=4><font class='p' size=7 color=grey>New</td></tr></table><br><br>");

echo ("<br><br><br><br><br><table border=0 width=690 align=center style=\"border-spacing:60px; 120px; border-collapse:separate;\"><tr>");



if (!$total){
	echo ("<td align=center><font color=red>아직 등록된 상품이 없습니다</td>");
} else {

	$counter = 0;
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

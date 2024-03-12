<? include ("top.html"); ?>
<br><br><br>
<br><br><br>
<?
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);
$result = mysql_query("select * from $board order by id desc", $con);

echo("
<link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
<link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
<link href=\"https://fonts.googleapis.com/css2?family=Poor+Story&display=swap\" rel=\"stylesheet\">
");


echo("<script src=\"https://kit.fontawesome.com/682470664d.js\" crossorigin=\"anonymous\"></script>
	<table border=0 align=center width=700>
	<tr><td align=left><form method=post action=search.php?board=$board>
	<select name=field>
	<option value=writer>글쓴이</option>
	<option value=topic>제목</option>
	<option value=content>내용</option>
	</select>
	<input type=text name=key size=13>
	<button type=submit class='fas fa-search'></button>
	</td><td align=right><a href=input.php?board=$board class='fas fa-pen fa-lg'></a></td></tr></form>

	
	");
?>
<? echo ("<style>
</style>");	
echo("
	<table border=0 width=700 align = center class=\"p\">
	<tr bgcolor=\"skyblue\"><td align=center width=50><b>번호</b></td>
	<td align=center width=100><b>글쓴이</b></td>
	<td align=center width=400><b>제목</b></td>
	<td align=center width=150><b>날짜</b></td>
	<td align=center width=50><b>조회</b></td>
	</tr>
");

if (!$total){
	echo("
		<tr><td colspan=5 align=center>아직 등록된 글이 없습니다.</td></tr>
	");
} else {

	if   ($cpage=='') $cpage=1;    // $cpage -  현재 페이지 번호
	$pagesize = 8;                // $pagesize - 한 페이지에 출력할 목록 개수

	$totalpage = (int)($total/$pagesize);
	if (($total%$pagesize)!=0) $totalpage = $totalpage + 1;

	$counter=0;
	while($counter<$pagesize):
		$newcounter=($cpage-1)*$pagesize+$counter;
		if ($newcounter == $total) break;

		$id=mysql_result($result,$newcounter,"id");
		$writer=mysql_result($result,$newcounter,"writer");
		$topic=mysql_result($result,$newcounter,"topic");
		$hit=mysql_result($result,$newcounter,"hit");
		$wdate=mysql_result($result,$newcounter,"wdate");
		$space=mysql_result($result,$newcounter,"space");
		$filename=mysql_result($result,$newcounter,"filename");
		$result1 = mysql_query("select * from $board where id=$id", $con);
		$total1 = mysql_num_rows($result1);
		$t="";

		if   ($space>0) {
			for ($i=0 ; $i<=$space ; $i++)
				$t = $t . "&nbsp;";     // 답변 글의 경우 제목 앞 부분에 공백을 채움
		
		
		if ($total1 > 0 && $filename){
		echo("
			<tr><td align=center>$id</td>
			<td align=center >$writer</td>
			<td align=left>$t [RE]<a href=content.php?board=$board&id=$id>$topic</a> [$total1] <a href=./pds/$filename class='fas fa-save'></a></td>
			<td align=center >$wdate</td><td align=center>$hit</td>
			</tr>
		");
		}
		elseif ($total1 > 0 && !$filename){
		echo("
			<tr><td align=center>$id</td>
			<td align=center >$writer</td>
			<td align=left >$t [RE]<a href=content.php?board=$board&id=$id>$topic</a> [$total1]</td>
			<td align=center >$wdate</td><td align=center>$hit</td>
			</tr>
		");
		}
		elseif ($total1 == 0 && $filename){
		echo("
			<tr><td align=center>$id</td>
			<td align=center >$writer</td>
			<td align=left >$t [RE]<a href=content.php?board=$board&id=$id>$topic <a href=./pds/$filename class='fas fa-save'></a></a></td>
			<td align=center >$wdate</td><td align=center>$hit</td>
			</tr>
		");
		}
		else {
		echo("<tr><td align=center>$id</td>
			<td align=center >$writer</td>
			<td align=left >$t [RE]<a href=content.php?board=$board&id=$id>$topic</a></td>
			<td align=center >$wdate</td><td align=center>$hit</td>
			</tr>");
		}
		}
		
		else{
			if ($total1 > 0 && $filename){
		echo("
			<tr><td align=center>$id</td>
			<td align=center >$writer</td>
			<td align=left >$t<a href=content.php?board=$board&id=$id>$topic</a> [$total1] <a href=./pds/$filename class='fas fa-save'></a></td>
			<td align=center >$wdate</td><td align=center>$hit</td>
			</tr>
		");
		}
		elseif ($total1 > 0 && !$filename){
		echo("
			<tr><td align=center>$id</td>
			<td align=center >$writer</td>
			<td align=left >$t<a href=content.php?board=$board&id=$id>$topic</a> [$total1]</td>
			<td align=center >$wdate</td><td align=center>$hit</td>
			</tr>
		");
		}
		elseif ($total1 == 0 && $filename){
		echo("
			<tr><td align=center>$id</td>
			<td align=center >$writer</td>
			<td align=left >$t<a href=content.php?board=$board&id=$id>$topic <a href=./pds/$filename class='fas fa-save'></a></a></td>
			<td align=center >$wdate</td><td align=center>$hit</td>
			</tr>
		");
		}
		else {
		echo("<tr><td align=center>$id</td>
			<td align=center >$writer</td>
			<td align=left >$t<a href=content.php?board=$board&id=$id>$topic</a></td>
			<td align=center >$wdate</td><td align=center>$hit</td>
			</tr>");
		}
		}
		$counter = $counter + 1;

	endwhile;

	echo("</table>");

	echo ("<table border=0 width=700 align=center>
		  <tr><td align=center>");
		   
	// 화면 하단에 페이지 번호 출력
	if ($cblock=='') $cblock=1;   // $cblock - 현재 페이지 블록값
	$blocksize = 3;             // $blocksize - 화면상에 출력할 페이지 번호 개수

	$pblock = $cblock - 1;      // 이전 블록은 현재 블록 - 1
	$nblock = $cblock + 1;     // 다음 블록은 현재 블록 + 1
		
	// 현재 블록의 첫 페이지 번호
	$startpage = ($cblock - 1) * $blocksize + 1;	

	$pstartpage = $startpage - 1;  // 이전 블록의 마지막 페이지 번호
	$nstartpage = $startpage + $blocksize;  // 다음 블록의 첫 페이지 번호
	if ($pblock > 0)        // 이전 블록이 존재하면 [이전블록] 버튼을 활성화
		echo ("<a onMouseOver=\"this.style.backgroundColor='skyblue'\"
				  onMouseOut=\"this.style.backgroundColor=''\" href=show.php?board=$board&cblock=$pblock&cpage=$pstartpage class='fas fa-arrow-left fa-lg'></a> ");

	// 현재 블록에 속한 페이지 번호를 출력	
	$i =   $startpage;
	while($i < $nstartpage):
	   if ($i > $totalpage) break;  // 마지막 페이지를 출력했으면 종료함
	   echo ("<a onMouseOver=\"this.style.backgroundColor='skyblue'\"
				  onMouseOut=\"this.style.backgroundColor=''\" href=show.php?board=$board&cblock=$cblock&cpage=$i><font size=5>$i </font></a>");
	   $i = $i + 1;
	endwhile;
	 
	// 다음 블록의 시작 페이지가 전체 페이지 수보다 작으면 [다음블록] 버튼 활성화  
	if ($nstartpage <= $totalpage)   
		echo ("<a onMouseOver=\"this.style.backgroundColor='gray'\"
				  onMouseOut=\"this.style.backgroundColor=''\" href=show.php?board=$board&cblock=$nblock&cpage=$nstartpage class='fas fa-arrow-right fa-lg'></a> ");

	echo ("</td></tr></table>");
}
echo("");
	
mysql_close($con);

?>

<? include ("bottom1.html"); ?>

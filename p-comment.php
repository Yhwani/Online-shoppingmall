
<?
if (!$writer){
	echo("
		<script>
		window.alert('이름을 입력 해주세요.')
		history.go(-1)
		</script>
	");
	exit;
}

if(!$content){
	echo("
		<script>
		window.alert('내용을 입력 해주세요.')
		history.go(-1)
		</script>
	");
	exit;
}
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);
$wdate = date("Y-m-d");

mysql_query("insert into comment(id, writer, passwd, content, wdate) values('$id', '$writer', '$passwd', '$content', '$wdate')",$con);
mysql_close($con);

echo("<meta http-equiv='Refresh' content='0; url=p-show.php?&code=$id'>");

?>
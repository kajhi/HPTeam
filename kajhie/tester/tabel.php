<?php
$host = "localhost";
$user = "root";
$pass = "";

$base = "kwitansi";

$con = mysql_connect($host, $user, $pass) or die("Server ERROR.");
mysql_select_db($base);

// $sql = "SELECT * FROM `data`";

// $data = mysql_query($sql);

// if (mysql_num_rows($data)>0) {
// 	while ($row = mysql_fetch_array($data)) {
// 		echo $row['no']."|".$row['dari']."|".$row['nominal']."|".$row['kebutuhan']."<br/>";
// 	}
// 	mysql_close();
// } else {
// 	echo "tidak ada data";
// }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tabel</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<center>
<h3> Table Gaji </h3>
<table class="table" border="1">
	<tr>
		<th>No</th>
		<th>Diterima Untuk</th>
		<th>Nominal</th>
		<th>Kebutuhan</th>
		<th>Status</th>
		<th>Operasi</th>
	</tr>
<?php
//select `data`.*, `nama_status` as `status` from `data` join `status` where `data`.`no`=`status`.`id_status`
// and  `status`.`nama_status`='Belum Lunas'
	$sql = "SELECT `data`.*, `nama_status` as `status` from `data` join `status` where `data`.`no`=`status`.`id_status`";

	$hasil = mysql_query($sql);
	while ($data = mysql_fetch_array($hasil)) {
?>
	<tr>
		<td><?php echo $data['no']?></td>
		<td><?php echo $data['dari']?></td>
		<td><?php echo $data['nominal']?></td>
		<td><?php echo $data['kebutuhan']?></td>
		<td><?php echo $data['status']?></td>
		<td>
			<a href="" class="button"s>Update</a> <a href="proses_hapus.php?id=<?php echo $data['no']?>" class="button button1">Delete</a>
		</td>
	</tr>
	<?php
}
	?>
</table>
</center>
</body>
</html>
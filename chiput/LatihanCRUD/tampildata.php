 <!DOCTYPE html>
 <html>
 <head>
 	<title> Tampil Database </title>
 	<style>
		table {
		    border-collapse: collapse;
		    width: 50%;
		}

		th, td {
		    text-align: center;
		    padding: 8px;
		    font-style: italic;
		}

		tr:nth-child(even){background-color: #FFDAB9}

		th {
		    background-color: #DC143C;
		    color: white;
		}

		h2{
			font-family: "Baron Neue Black";
			src:url(Baron Neue Black.otf);
			color: #DC143C;
			text-shadow: 1px 1px 5px #FFFAFA;
		}
		.button1{
			background-color:  #ffcc00; /* Green */
		    border: none;
		    border-radius: 5px;
		    color: white;
		    padding: 3px 10px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		    font-size: 16px;
		    margin: 5px 3px;
		    cursor: pointer;
		}
		.button2{
			background-color: #f44336;
			border: none;
			border-radius: 5px;
		    color: white;
		    padding: 3px 10px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		    font-size: 16px;
		    margin: 5px 3px;
		    cursor: pointer;
		}
		
	</style>
 </head>
 <body>
  <center>
	<h2> Table Data User </h2>
	<table border="1px">
		<tr>
			<center>
			<th>No.</th>
			<th>Nama Lengkap</th>
			<th>Username</th>
			<th>Password</th>
			<th>Status</th>
			<th>Operasi</th>
			</center>
		</tr>
	</center>

	<?php  

		include "connection.php";

		$sql_data = "SELECT `user`.*,`user_role`.`status` as `status` FROM `user` JOIN `user_role` WHERE `user`.`id_user`=`user_role`.`id` ORDER BY `id_user` DESC";

		$data = mysql_query($sql_data);

		// echo $sql;
		// die();

		$i = 1;

		if (mysql_num_rows($data) > 0) { 
			while ($row = mysql_fetch_array ($data)){ 
		?> 
			        <tr>
				        <td><center><?php echo $i ?></center></td>
				        <td><?php echo $row['nama_user'] ?></td>
				        <td><?php echo $row['username'] ?></td>
				        <td><?php echo $row['password'] ?></td>
				        <td><?php echo $row['status'] ?></td>
				        <td>
				        <a href="hapus.php?id=<?php echo $row['id_user'] ?>" class="button1 button2">Hapus</a> 
				        <a href="ubah.php?id=<?php echo $row['id_user'] ?>" class="button1">Ubah</a>
				        <a href="tambahakun.php?id=<?php echo $row['id_user'] ?>" class="button1">Tambah</a>
				        </td>
			        </tr>   
		<?php
		$i++;
		}
			mysql_close(); 
		} else {
			echo "Tidak ada data";
		}
	?>
	</table>
 </body>
 </html>




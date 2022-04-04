<!DOCTYPE html>
<html>
<head>
	<title>Mari Belajar Coding</title>
	<?php
	include 'koneksi.php';
	?>
</head>
<body>

	<table>
		<!--form upload file-->
		<form method="post" enctype="multipart/form-data" >
			<tr>
				<td>Pilih File</td>
				<td><input name="filemhsw" type="file" required="required"></td>
			</tr>
			<tr>
				<td></td>
				<td><input name="upload" type="submit" value="Import"></td>
			</tr>
		</form>
	</table>
	
	<?php
	if (isset($_POST['upload'])) {

		require('spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
		require('spreadsheet-reader-master/SpreadsheetReader.php');

		//upload data excel kedalam folder uploads
		$target_dir = "uploads/".basename($_FILES['filemhsw']['name']);
		
		move_uploaded_file($_FILES['filemhsw']['tmp_name'],$target_dir);

		$Reader = new SpreadsheetReader($target_dir);

		foreach ($Reader as $Key => $Row)
		{
			// import data excel mulai baris ke-2 (karena ada header pada baris 1)
			if ($Key < 1) continue;			
			$query= mysqli_query ($con,"INSERT INTO tbdata(id,nama,nik,umur,alamat) VALUES ('".$Row[0]."', '".$Row[1]."','".$Row[2]."','".$Row[3]."','".$Row[4]."')");
		}
		if ($query) {
				echo "Import data berhasil";
			}else{
				echo "<script>alert('Gagal')</script>";
			}
	}
	?>
	<h2>Data</h2>
	<table border="1">
		<tr>
			<th>NO</th>
			<th>NAMA</th>
			<th>NIK</th>
			<th>UMUR</th>
			<th>ALAMAT</th>
		<?php
		include 'koneksi.php';
		$data = mysqli_query($con, "SELECT * FROM tbdata");
		if ($data === FALSE){
			die(mysqli_error());
		}
		while($d = mysqli_fetch_assoc($data)){
			?>
			<tr>
				<td><?=$d['id']; ?></td>
				<td><?=$d['nama']; ?></td>
				<td><?=$d['nik']; ?></td>				
				<td><?=$d['umur']; ?></td>
				<td><?=$d['alamat']; ?></td>
			</tr>
			<?php 
		}
		?>
	</table>
</body>
</html>
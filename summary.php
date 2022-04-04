<!DOCTYPE html>
<html>
<head>
	<title>Summary Data VA</title>
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
			if ($Key <5) continue;			
			$query= mysqli_query ($con,"INSERT INTO tbdata(id,filename,mainno,controlno,revno,targetpartno,partno,partnoo,partnooo,partname,ppn,ppno,ppnoo,ppnooo,parentname,country,supp,sn,mc,vai,secashpur,lopur,ashpur,cost,date,bfre,aftr,crplan,invstmnt,currency,theme_title,prop_summary,bfp,prop_class,target_model,section_hg,jud_pur,jud_hg,judgement,reason) VALUES ('".$Row[0]."', '".$Row[1]."','".$Row[2]."','".$Row[3]."','".$Row[4]."','".$Row[5]."','".$Row[6]."','".$Row[7]."','".$Row[8]."','".$Row[9]."','".$Row[10]."','".$Row[11]."','".$Row[12]."','".$Row[13]."','".$Row[14]."','".$Row[15]."','".$Row[16]."','".$Row[17]."','".$Row[18]."','".$Row[19]."','".$Row[20]."','".$Row[21]."','".$Row[22]."','".$Row[23]."','".$Row[24]."','".$Row[25]."','".$Row[26]."','".$Row[27]."','".$Row[28]."','".$Row[29]."','".$Row[30]."','".$Row[31]."','".$Row[32]."','".$Row[33]."','".$Row[34]."','".$Row[35]."','".$Row[36]."','".$Row[37]."','".$Row[38]."','".$Row[39]."')");
		}
        if ($query) {
				echo "<script>alert('Import data berhasil')</script>";
			}else{
				echo "<script>alert('Gagal')</script>";
			}
	}
	?>
	<h2>Summary Data VA</h2>
         <center><a href="index.php" class="btn btn-warning btn-xs">Kembali</a></center>
	<table class="table" border="1" cellpadding="10" cellspacing="0">
    <thead class="table-dark">
    ...
  
  
    ...
 
		<tr>
            <th rowspan="2">No.</th>
			<th colspan="4"rowspan="2">Target Part No</th>
            <th rowspan="2">Part Name</th>
            <th colspan="4"rowspan="2">Parent Part No</th>
            <th rowspan="2">Parent Part Name</th>
            <th rowspan="2">Country</th>
            <th rowspan="2">Supplier</th>
            <th rowspan="2">Short Name</th>
            <th rowspan="2">MC Category</th>
            <th rowspan="2">VA Idea Timing</th>
            <th colspan="2">Base Cost</th>
            <th colspan="3">CR Effect for target part</th>
            <th rowspan="2">Theme Title</th>
            <th rowspan="2">Proposal Summary</th>
            <th rowspan="2">Proposal Class</th>
            <th rowspan="2">Target Model</th>
            <th rowspan="2">Section HG</th>
            <th rowspan="2">Judgement</th>
            <th rowspan="2">Reason for Judgement</th>
        </tr>
       
        <tr>
            
           
            <th>Cost</th>
            <th>Date</th>
            <th>Before</th>
            <th>After</th>
            <th>CR Plan</th>
           
            

           
        </tr>
        </thead>
            
		<?php
		include 'koneksi.php';
		$data = mysqli_query($con, "SELECT * FROM tbdata");
		if ($data === FALSE){
			die(mysqli_error());
		}
		while($d = mysqli_fetch_assoc($data)){
			?>
            <tbody>
			<tr>
                <td><?=$d['id']; ?></td>
                <td><?=$d['targetpartno']; ?></td>
                <td><?=$d['partno']; ?></td>
                <td><?=$d['partnoo']; ?></td>
                <td><?=$d['partnooo']; ?></td>
                <td><?=$d['partname']; ?></td>
                <td><?=$d['ppn']; ?></td>
                <td><?=$d['ppno']; ?></td>
                <td><?=$d['ppnoo']; ?></td>
                <td><?=$d['ppnooo']; ?></td>
                <td><?=$d['parentname']; ?></td>
                <td><?=$d['country']; ?></td>
                <td><?=$d['supp']; ?></td>
                <td><?=$d['sn']; ?></td>
                <td><?=$d['mc']; ?></td>
                <td><?=$d['vai']; ?></td>
                <td><?=$d['cost']; ?></td>
                <td><?=$d['date']; ?></td>
                <td><?=$d['bfre']; ?></td>
                <td><?=$d['aftr']; ?></td>
                <td><?=$d['crplan']; ?></td>
                <td><?=$d['theme_title']; ?></td>
                <td><?=$d['prop_summary']; ?></td>
                <td><?=$d['prop_class']; ?></td>
                <td><?=$d['target_model']; ?></td>
                <td><?=$d['section_hg']; ?></td>
                <td><?=$d['judgement']; ?></td>
                <td><?=$d['reason']; ?></td>
              
             

                
                
                
			</tr>
			<?php 
		}
		?>
         </tbody>
    </table>
	
</body>
</html>
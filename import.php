<?php
// Load file koneksi.php
include "koneksi.php";

// Load file autoload.php
require 'vendor/autoload.php';

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
	$nama_file_baru = $_POST['namafile'];
    $path = 'tmp/' . $nama_file_baru; // Set tempat menyimpan file tersebut dimana

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load($path); // Load file yang tadi diupload ke folder tmp
    $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
    //echo json_encode($sheet);
	  $numrow = 1;
    $namafileori = $_POST['namafileori'];
	 foreach($sheet as $row){
     $filename = $row['B'];
	// 	// Ambil data pada excel sesuai Kolom
	// 	$filename = $row['A']; // Ambil data NIS
	// 	$mainno = $row['B']; // Ambil data nama
	// 	$controlno = $row['C']; // Ambil data jenis kelamin
	// 	$revno = $row['D']; // Ambil data telepon
	// 	$targetpartno = $row['ABCD']; // Ambil data alamat
  //   $partno = $row['F'];
  //   $partnoo = $row['G'];
  //   $partnooo = $row['H'];
  //   $partname = $row[''];
  //   $ppn = $row['J'];
  //   $ppno = $row['K'];
  //   $ppnoo = $row['L'];
  //   $ppnooo = $row['M'];
  //   $parentname = $row['J'];
  //  // $country = $row['O'];
  //   $supp = $row['P'];
  //   $sn = $row['Q'];
  //   $mc = $row['R'];
  //   $vai = $row['S'];
  //   $secashpur = $row['T'];
  //   $lopur = $row['E'];
  //   $ashpur = $row['E'];
  //   $cost = $row['E'];
  //   $date = $row['E'];
  //   $bfre = $row['E'];
  //   $aftr = $row['E'];
  //   $crplan = $row['E'];
  //   $invstmnt = $row['E'];
  //   $currency = $row['E'];
  //   $theme_title = $row['K'];
  //   $prop_summary = $row['E'];
  //   $bfp = $row['E'];
  //   $prop_class = $row['E'];
  //   $target_model = $row['E'];
  //   $section_hg = $row['E'];
  //   $jud_pur = $row['E'];
  //   $jud_hg = $row['E'];
  //   $judgement = $row['T'];
     $judgement = $row['AM']; 
     $reason = $row['AN'];
	// 	// Cek jika semua data tidak diisi
	 	//if($nis == "" && $nama == "" && $jenis_kelamin == "" && $telp == "" && $alamat == "")
	// 		continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

	// 	// Cek $numrow apakah lebih dari 1
	// 	// Artinya karena baris pertama adalah nama-nama kolom
	// 	// Jadi dilewat saja, tidak usah diimport
  if($numrow >= 7){
      //echo $numrow. '.' . $judgement;
			// Buat query Insert
			//$query = "UPDATE tbdata SET ('" . $judgement . "') where";
      //
      
      $querys = "UPDATE tbdata set judgement='$judgement', reason='$reason' where filename='$filename'";
      //echo $querys;
      //echo "<br><br><br>";
			// Eksekusi $query
			mysqli_query($con, $querys);
      //echo $judgement; 
      
		}

		$numrow++; // Tambah 1 setiap kali looping
	}

    //unlink($path); // Hapus file excel yg telah diupload, ini agar tidak terjadi penumpukan file
  //echo $nama_file_baru;
  //echo $_POST['namafileori'];
}
//}
echo "<script>alert('success import');document.location='upload.php'</script>"; // Redirect ke halaman awal
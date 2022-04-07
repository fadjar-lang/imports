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
		$mainno = $row['C']; 
		$controlno = $row['D']; 
		$revno = $row['E']; 
		$targetpartno = $row['F'];
    $partno = $row['G'];
    $partnoo = $row['H'];
    $partnooo = $row['I'];
    $partname = $row['J'];
    $ppn = $row['K'];
    $ppno = $row['L'];
    $ppnoo = $row['M'];
    $ppnooo = $row['N'];
    $parentname = $row['O'];
    $country = $row['P'];
    $supp = $row['Q'];
    $sn = $row['R'];
    $mc = $row['S'];
    $vai = $row['T'];
    $secashpur = $row['U'];
    $lopur = $row['V'];
    $ashpur = $row['W'];
    $cost = $row['X'];
    $date = $row['Y'];
    $bfre = $row['Z'];
    $aftr = $row['AA'];
    $crplan = $row['AB'];
    $invstmnt = $row['AC'];
    $currency = $row['AD'];
    $theme_title = $row['AE'];
    $prop_summary = $row['AF'];
    $bfp = $row['AG'];
    $prop_class = $row['AH'];
    $target_model = $row['AI'];
    $section_hg = $row['AJ'];
    $jud_pur = $row['AK'];
    $jud_hg = $row['AL'];
    //$judgement = $row['T'];
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
      
      $querys = "INSERT INTO tbdatas VALUES('" . $filename . "','" . $mainno . "','" . $controlno . "','" . $revno . "','" . $targetpartno . "','" . $partno . "','" . $partnoo . "','" . $partnoo . "','" . $partnooo . "','" . $partname . "','" . $ppn . "','" . $ppno . "','" . $ppnoo . "','" . $ppnooo . "','" . $parentname . "','" . $country . "','" . $supp . "','" . $sn . "','" . $mc . "','" . $vai . "','" . $secashpur . "','" . $lopur . "','" . $ashpur . "','" . $cost . "','" . $date . "','" . $bfre . "','" . $aftr . "','" . $crplan . "','" . $invstmnt . "','" . $currency . "','" . $theme_title . "','" . $prop_summary . "','" . $bfp . "','" . $prop_class . "','" . $target_model . "','" . $section_hg . "','" . $jud_pur . "','" . $jud_hg . "','" . $judgement . "','" . $reason . "')";
      //echo $querys;
      //echo "<br><br><br>";
			// Eksekusi $query
			mysqli_query($con, $querys);
      //print_r ($querys);
      //echo $judgement; 
      
		}

		$numrow++; // Tambah 1 setiap kali looping
	}

    //unlink($path); // Hapus file excel yg telah diupload, ini agar tidak terjadi penumpukan file
  //echo $nama_file_baru;
  //echo $_POST['namafileori'];
}
//}
echo "<script>alert('success import');document.location='addsummary.php'</script>"; // Redirect ke halaman awal
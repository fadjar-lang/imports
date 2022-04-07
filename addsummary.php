<!DOCTYPE html>
<html>
<head>
	<title>Summary Data VA</title>
	<?php
	include 'koneksi.php';
	?>
  <?php
  // Load file autoload.php
  require 'vendor/autoload.php';

  // Include librari PhpSpreadsheet
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
  ?>
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php' ?>
<script src="plugins/jquery/jquery.min.js"></script>
<script>
        $(document).ready(function() {
            // Sembunyikan alert validasi kosong
            $("#kosong").hide();
        });
    </script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <?php include 'nav.php' ?>
  </nav>
  <!-- /.navbar -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <?php include 'sidebar.php' ?>
  </aside>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Upload Form VA/VE</h1>
           
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- <div class="row"> -->

      <div class="card-body">

     <div style="padding: 10px 20px;">
        <h3 style="margin-top: 5px;">Form Import Data</h3>
        <hr style="margin-top: 5px;margin-bottom: 15px;">

        <form method="post" action="addsummary.php" enctype="multipart/form-data">
            <a href="Format.xlsx">Download Format</a> &nbsp;|&nbsp;
            <a href="index.php">Kembali</a>
            <br><br>

            <div class="clearfix">
                <div class="float-left" style="margin-right: 5px;">
                    <input type="file" name="file" class="form-control">
                </div>
                <button type="submit" name="preview" class="btn btn-primary">PREVIEW</button>
            </div>
        </form>
        <hr>

        <?php
        // Jika user telah mengklik tombol Preview
        if (isset($_POST['preview'])) {
            $tgl_sekarang = date('YmdHis'); // Ini akan mengambil waktu sekarang dengan format yyyymmddHHiiss
            $nama_file_baru = 'data' . $tgl_sekarang . '.xlsx';

            // Cek apakah terdapat file data.xlsx pada folder tmp
            if (is_file('tmp/' . $nama_file_baru)) // Jika file tersebut ada
                unlink('tmp/' . $nama_file_baru); // Hapus file tersebut

            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
            $tmp_file = $_FILES['file']['tmp_name'];
            $nama_files = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
            
            echo $nama_files. '.' . $ext;
            // Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
            if ($ext == "xlsx") {
                // Upload file yang dipilih ke folder tmp
                // dan rename file tersebut menjadi data{tglsekarang}.xlsx
                // {tglsekarang} diganti jadi tanggal sekarang dengan format yyyymmddHHiiss
                // Contoh nama file setelah di rename : data20210814192500.xlsx
                move_uploaded_file($tmp_file, 'tmp/' . $nama_file_baru);

                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                $spreadsheet = $reader->load('tmp/' . $nama_file_baru); // Load file yang tadi diupload ke folder tmp
                $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

                // Buat sebuah tag form untuk proses import data ke database
                echo "<form method='post' action='upload-excel.php'>";
                

                // Disini kita buat input type hidden yg isinya adalah nama file excel yg diupload
                // ini tujuannya agar ketika import, kita memilih file yang tepat (sesuai yg diupload)
                echo "<input type='hidden' name='namafile' value='" . $nama_file_baru . "'>";
                echo "<input type='hidden' name='namafileori' value='" . $nama_files. '.' . $ext."'>";
                // Buat sebuah div untuk alert validasi kosong
                echo "<div id='kosong' class='alert alert-danger'>
					Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
                </div>";

                echo "<button type='submit' id='myDIV' name='import' class='btn btn-success'>IMPORT</button>";
                echo "
                <div class='table-responsive'>
                    <table class='table table-bordered'>
                        <tr>
                            <th colspan='5' class='text-left'>Preview Data</th>
                        </tr>
                        <tr>
                        <th>No.</th>
                        <th>File Name
                        (with Hyper Link)</th>
                        <th>Main No.</th>
                        <th>Control No.</th>
                        <th>Rev.
                         No.</th>
                        <th>Target Part No.</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Target Part Name</th>
                        <th>Parent Part No.</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Parent Part name</th>
                        <th>Country</th>
                        <th>Supplier</th>
                        <th>Short Name</th>
                        <th>MC Category</th>
                        <th>VA Idea Timing</th>
                        <th>SECTION (ASH Pur)</th>
                        <th>LO Pur</th>
                        <th>ASH Pur</th>
                        <th>Cost</th>
                        <th>Date</th>
                        <th>Before</th>
                        <th>After</th>
                        <th>CR</th>
                        <th>Investment</th>
                        <th>Currency</th>
                        <th>Theme TITLE</th>
                        <th>Proposal Summary</th>
                        <th>Basis for Propose</th>
                        <th>Proposa
                         Class</th>
                        <th>Target
                        Model</th>
                        <th>SECTION
                        (HG)</th>
                        <th>Pur</th>
                        <th>HG</th>
                        <th>Judgement</th>
                        <th>Reason for Judgement</th>
                        </tr>";

                        $numrow = 1;
                        $kosong = 0;
                        foreach ($sheet as $row) { // Lakukan perulangan dari data yang ada di excel
                            // Ambil data pada excel sesuai Kolom
                            $nis = $row['A']; // Ambil data NIS
                            $nama = $row['B']; // Ambil data nama
                            $jenis_kelamin = $row['C']; // Ambil data jenis kelamin
                            $telp = $row['D']; // Ambil data telepon
                            $alamat = $row['E']; // Ambil data alamat

                            // Cek jika semua data tidak diisi
                            if ($nis == "" && $nama == "" && $jenis_kelamin == "" && $telp == "" && $alamat == "")
                                continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                            // Cek $numrow apakah lebih dari 1
                            // Artinya karena baris pertama adalah nama-nama kolom
                            // Jadi dilewat saja, tidak usah diimport
                            if ($numrow > 6) {
                                // Validasi apakah semua data telah diisi
                                $nis_td = (!empty($nis)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                $nama_td = (!empty($nama)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                                $jk_td = (!empty($jenis_kelamin)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                                $telp_td = (!empty($telp)) ? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
                                $alamat_td = (!empty($alamat)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah

                                // Jika salah satu data ada yang kosong
                                if ($nis == "" or $nama == "" or $jenis_kelamin == "" or $telp == "" or $alamat == "") {
                                    $kosong++; // Tambah 1 variabel $kosong
                                }

                                echo "<tr>";
                                echo "<td" . $nis_td . ">" . $nis . "</td>";
                                echo "<td" . $nama_td . ">" . $nama . "</td>";
                                echo "<td" . $jk_td . ">" . $jenis_kelamin . "</td>";
                                echo "<td" . $telp_td . ">" . $telp . "</td>";
                                echo "<td" . $alamat_td . ">" . $alamat . "</td>";
                                echo "</tr>";
                            }

                            $numrow++; // Tambah 1 setiap kali looping
                        }

                echo "</table></div>";

                // Cek apakah variabel kosong lebih dari 0
                // Jika lebih dari 0, berarti ada data yang masih kosong
                if ($kosong > 0) {
        ?>
                <script>
                    $(document).ready(function() {
                        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                        $("#jumlah_kosong").html('<?php echo $kosong; ?>');
                        var x = document.getElementById("myDIV");
                        x.style.display = "block";

                        $("#kosong").show(); // Munculkan alert validasi kosong
                    });
                </script>
            <?php
                    } else { // Jika semua data sudah diisi
                      ?>
                      <script>
                      $(document).ready(function() {
                          // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                          $("#jumlah_kosong").html('<?php echo $kosong; ?>');
                          var x = document.getElementById("myDIV");
                          x.style.display = "block";
  
                          $("#kosong").show(); // Munculkan alert validasi kosong
                      });
                  </script>


              <?php


                            echo "<hr style='margin-top: 0;'>";

                            // Buat sebuah tombol untuk mengimport data ke database
                            echo "<button type='submit' id='myDIV' name='import' class='btn btn-success'>IMPORT</button>";
                        }

                        echo "</form>";
                    } else { // Jika file yang diupload bukan File Excel 2007 (.xlsx)
                        // Munculkan pesan validasi
                        echo "<div class='alert alert-danger'>
                  Hanya File Excel 2007 (.xlsx) yang diperbolehkan
                        </div>";
                    }
                }
            ?>
    </div>

      </div>
    </section>
    <!-- /.content -->
  </div>
<!-- ./wrapper -->

<footer class="main-footer">
    <?php include 'footer.php' ?>
  </footer>

<!-- jQuery -->

<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>

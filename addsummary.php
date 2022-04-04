<!DOCTYPE html>
<html>
<head>
	<title>Summary Data VA</title>
	<?php
	include 'koneksi.php';
	?>
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php' ?>
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
    
<center>
    <!-- <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br> -->
        <!-- <h1>Upload Form VA/VE</h1>
    <br>
    <br>

        <form action=""method="POST" enctype="multipart/form-data" >
        <b>File Upload</b> 
        <input type="file" class="form-control" name="NamaFile">
        <input type="submit" name="proses" value="Upload"> -->

   
            
   
<?php
$koneksi = mysqli_connect("localhost","root","","dbimportexcell");

if(isset($_POST['proses'])){

    $direktori = "FolderPNM/";
    $file_name=$_FILES['NamaFile']['name'];
    move_uploaded_file($_FILES['NamaFile']['tmp_name'],$direktori.$file_name);

    mysqli_query($koneksi, "insert into dokumen set file='$file_name'");

    echo "<br><b><br>File Berhasil diupload <b>";
    
}
?>

   
    <!-- <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br> -->

</form>

<center>
  
</center>
<!-- <form action="" method="post">
<div class="card-body">
<div class="form-group">
<label for="exampleInputEmail1">Email address</label>
<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Password</label>
<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
</div>
<div class="form-group">
<label for="exampleInputFile">File input</label>
<div class="input-group">
<div class="custom-file">
<input type="file" class="custom-file-input" id="exampleInputFile">
<label class="custom-file-label" for="exampleInputFile">Choose file</label>
</div>
<div class="input-group-append">
<span class="input-group-text">Upload</span>
</div>
</div>
</div>
<div class="form-check">
<input type="checkbox" class="form-check-input" id="exampleCheck1">
<label class="form-check-label" for="exampleCheck1">Check me out</label>
</div>
</div>
</form> -->

 </center>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Upload Summary VA/VE</h1>
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
      
      <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">File</label>
      <div class="col-sm-10">
      <input type="file" class="form-control">
      </div>
      </div>
      <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
      </div>
      </div>
      </div>

<div class="card-footer">
<button type="submit" class="btn btn-info">Upload</button>
</div>

<!-- 
        </div> -->
        <!-- /.row -->

            <!-- /.card -->
     
          <!-- right col -->
  
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- ./wrapper -->

<footer class="main-footer">
    <?php include 'footer.php' ?>
  </footer>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
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

<?php include 'koneksi.php'; 
if (isset($_GET['select'])) {
  $select = $_GET['select'];
  $query = "SELECT bfre,aftr,judgement FROM tbdata WHERE target_model='$select'";
  $hasil_select = mysqli_query($con, $query);
}else{
  $hasil_select = mysqli_query($con,"SELECT * FROM tbdata");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php' ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <?php include 'nav.php' ?>
  </nav>
  <!-- /.navbar -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <?php include 'sidebar.php' ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Database VA VE</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-6">
            <form action="index.php" method="get">
              <select name="select" class="form-control">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="NG">NG</option>
              </select>
              <button type="submit" class="btn btn-primary">Select</button>
            </form>
            <canvas id="myChartPie" width="100" height="100"></canvas>
          </div>
        </div>
        <div class="col-md-6 mt-5">
          <canvas id="myChart" width="100" height="100"></canvas>
        </div>

        <h1>Coba select</h1>
       <?php 
       while($row = mysqli_fetch_array($hasil_select)){
         echo $row['bfre'];
         echo '<br>';
         echo $row['aftr'];
         echo '<br>';
         echo $row['judgement'];
         echo '<br>';
       }
       ?>

      </div><!-- /.container-fluid -->

     

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <?php include 'footer.php' ?>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Cost Before', 'Cost After'],
        datasets: [{
            label: '# of Votes',
            data: [
              <?php 
                 //$query = "SELECT bfre FROM tbdata WHERE target_model='$select'";
                 $wow = mysqli_query($con, "SELECT bfre FROM tbdata WHERE target_model='$select'");
                 while ($row = mysqli_fetch_array($wow)) {
                   echo $row['bfre'];
               
                 }
                ?>
             ,  <?php 
                 $query = "SELECT aftr FROM tbdata WHERE target_model='$select'";
                 $wow = mysqli_query($con, $query);
                 while ($row = mysqli_fetch_array($wow)) {
                   echo $row['aftr'];
                  
                 }
                ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// pie chart
const ctxs = document.getElementById('myChartPie').getContext('2d');
const myChartPie = new Chart(ctxs, {
    type: 'pie',
    data: {
        labels: ['A1', 'A2', 'B1', 'B2', 'NG', 'C', 'PENDING'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 
            
            <?php $b1 = mysqli_query($con, "SELECT judgement='B1' FROM tbdata WHERE target_model='$select'");
                  echo mysqli_num_rows($b1);
            ?>, 5, 2, 3, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'red'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'red'
            ],
            borderWidth: 2
        },
    
       
      ]
        
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});


</script>
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

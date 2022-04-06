<?php include 'koneksi.php'; 
if (isset($_GET['select'])) {
  $select = $_GET['select'];
  $query = "SELECT bfre,aftr,judgement FROM tbdata WHERE target_model='$select'";
  $hasil_select = mysqli_query($con, $query);
}else{
  $select = "A";
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
            <center>
              <h1 class="m-0">Target Model <?php 
              if(isset($_GET['select'])){
                echo $_GET['select'];
              }else{
                echo 'A';
              }
              
              ?></h1>
            </center>
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
          <div class="col-md-5">
            <form action="index.php" method="get" class="d-flex">
           
          <select name="select" class="form-control">
            <option value="">--- Select your Model ---</option>
            <?php 
        $query_model = mysqli_query($con, "SELECT DISTINCT target_model FROM tbdata ORDER BY target_model ASC");
        while ($models = mysqli_fetch_array($query_model)) {
        ?>
           
            <?php 
            if ($select == $models['target_model']) {
              echo "<option selected='selected' value='$models[target_model]'>$models[target_model]</option>";
            }else{
              echo "<option value='$models[target_model]'>$models[target_model]</option>";
            }
            
            ?>
          
            <?php }?>
          </select>
              <button type="submit" class="btn btn-primary ml-2">Select</button>
            </form>
            <div class="mt-5">   
              <canvas id="myChartPie" width="100" height="100"></canvas>
            </div>
          </div>
          <br><br><br><br>
          <div class="col-md-5 mt-5 ml-5 p-4">
            <canvas id="myChart" width="100" height="100"></canvas>
          </div>
        </div>
      

        <!-- <h1>Coba select</h1> -->
        <?php 
        $query = mysqli_query($con, "SELECT judgement FROM tbdata WHERE target_model='$select'");
        //echo array_count_values(mysqli_fetch_array());
        $array = [];

        $i =0;

        
        while ($row = mysqli_fetch_array($query)) {

            $data = $row['judgement'];
            $spliter = ',';
            $dt = $data && $spliter;
            $array[$i]=$data;

          $i++;
        }
       //print_r (implode(',', mysqli_fetch_array($query)));
       //echo "'".(implode('\',\'',$array))."'";
       //echo '<br>';
        //print_r($array);
        ?>

        <?php
          $arrays = [];
          $querys = mysqli_query($con, "SELECT judgement FROM tbdata WHERE target_model='$select'");
          while ($row = mysqli_fetch_array($querys)) {
           $values = $row['judgement'];
            $arrays[$i]=$values;
            $i++;
          }
          //print_r(array_count_values($arrays));

          foreach (array_count_values($arrays) as $judgement) {
            //echo $judgement;
            //echo '<br>';
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
<script src="https://unpkg.com/chart.js-plugin-labels-dv/dist/chartjs-plugin-labels.min.js"></script>
<script>
  
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [''],
        datasets: [
          {
            label: 'Cost Before',
            data: [
              <?php 
                 //$query = "SELECT bfre FROM tbdata WHERE target_model='$select'";
                 $wow = mysqli_query($con, "SELECT bfre FROM tbdata WHERE target_model='$select'");
                 $tmp_bfr = "";
                 while ($row = mysqli_fetch_array($wow)) {
                  if ($tmp_bfr > 0) {
                    $tmp_bfr = $tmp_bfr + $row['bfre'];          
                  } else {
                    $tmp_bfr = $row['bfre'];
                    // echo $tmp_bfr;
                  }
                   
                 }
                 echo $tmp_bfr;
                ?>,

             ],
             backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                
            ],
          },


            {
              label: 'Cost After',
              data: [
                <?php 
                 //$query = "SELECT bfre FROM tbdata WHERE target_model='$select'";
                 $wow = mysqli_query($con, "SELECT aftr FROM tbdata WHERE target_model='$select'");
                 $tmp_aftr = "";
                 while ($row = mysqli_fetch_array($wow)) {
                  if ($tmp_aftr > 0) {
                    $tmp_aftr = $tmp_aftr + $row['aftr'];          
                  } else {
                    $tmp_aftr = $row['aftr'];
                    // echo $tmp_bfr;
                  }
                   
                 }
                 echo $tmp_aftr;
                ?>,
              ],
              backgroundColor: [
                
                'rgba(54, 162, 235, 0.2)',
            ]
          }

        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
          labels: {
            render: 'value'
          }
        }
    }
});

// pie chart
const ctxs = document.getElementById('myChartPie').getContext('2d');
const myChartPie = new Chart(ctxs, {
    type: 'doughnut',
    data: {
      <?php 
       
        ?>
        labels: [<?php 
        $query = mysqli_query($con, "SELECT DISTINCT judgement FROM tbdata WHERE target_model='$select'");
        //echo array_count_values(mysqli_fetch_array());
        $array = [];

        $i =0;

        
        while ($row = mysqli_fetch_array($query)) {

            $data = $row['judgement'];
            $array[$i]=$data;

          $i++;
        }
       // print_r (implode(',', mysqli_fetch_array($query)));
       echo "'".(implode('\',\'',$array))."'";
        //print_r($array);
        ?>],
        datasets: [{
            label: '# of Votes',
            data: [<?php
          $arrayss = [];
          $querys = mysqli_query($con, "SELECT judgement FROM tbdata WHERE target_model='$select'");
          while ($row = mysqli_fetch_array($querys)) {
            //echo $values = $row['judgement'];
            $arrayss[$i]=$values;
            
            $i++;
          }
          //print_r(array_count_values($arrays));
          $array_baru = [];
          foreach (array_count_values($arrays) as $judgement) {
            $array_baru[$i]=$judgement;
            $i++;
            //echo $judgement;
            //echo '<br>';
          }
          echo implode(',',$array_baru);
        ?>],
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
      radius:'80%',
        // scales: {
        //     y: {
        //         beginAtZero: true
        //     }
        // }
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

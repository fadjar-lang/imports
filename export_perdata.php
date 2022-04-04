<?php
include 'koneksi.php';
$filename = $_GET['filename'];
//$query = mysqli_query("SELECT * FROM tbdata WHERE 'filename'='$filename'");
$query = "SELECT * FROM tbdata WHERE filename = '$filename'";
$result = mysqli_query($con, $query);      
?>
<?php 
      	header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=data.xls");
?>
<!DOCTYPE html>
  <html lang="en">
  <head>
  <!-- link untuk style table -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
  <!-- link jquery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- code jquery -->
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <!-- styling table -->
  <style>
    /* backgroung table header */
    table thead{
      background-color: #eaeaea;
    }
    /* code untuk fixed table */
    table thead {
      position: -webkit-sticky;
      position: sticky;
      top: 0;
      z-index: 1;
  }
  </style>

  </head>
  <body class="hold-transition sidebar-mini layout-fixed">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Content Wrapper. Contains page content -->
  
    
    <center>
      <h2>Summary Data VA</h2>
      </center>
      <div class="container">
      <section class="content">
      <div class="fixTableHead">
        <table id="tabel-data">
              <thead>
                <tr>
                    <!-- <th rowspan="2">No.</th> -->
                    <th rowspan="2">Mainno</th>
                    <th rowspan="2">Controlno</th>
                    <th rowspan="2">Revno</th>
                    <th rowspan="2">TargetPartNo</th>
                    <th rowspan="2">partno</th>
                    <th rowspan="2">partnoo</th>
                    <th rowspan="2">partnooo</th>
                    <th rowspan="2">partname</th>
                    <th rowspan="2">ppn</th>
                    <th rowspan="2">ppno</th>
                    <th rowspan="2">ppnoo</th>
                    <th rowspan="2">ppnooo</th>
                    <th rowspan="2">parentname</th>
                    <th rowspan="2">country</th>
                    <th rowspan="2">supp</th>
                    <th rowspan="2">sn</th>
                    <th rowspan="2">mc</th>
                    <th rowspan="2">vai</th>
                    <th rowspan="2">secashpur</th>
                    <th rowspan="2">lopur</th>
                    <th rowspan="2">ashpur</th>
                    <th rowspan="2">cost</th>
                    <th rowspan="2">date</th>
                    <th colspan="4"rowspan="2">Target Part No</th>
                    <th rowspan="2">Part Name</th>
                    <th colspan="4"rowspan="2">Parent Part No</th>
                    <th rowspan="2">Parent Part Name</th>
                    <th rowspan="2">Theme Title</th>
                    <th rowspan="2">Target Model</th>
                    <th rowspan="2">Supplier</th>
                    <th rowspan="2">VA Idea Timing</th>
                    <th colspan="3">CR Effect for target part</th>
                    <th rowspan="2">Proposal Summary</th>
                    <th rowspan="2">Proposal Class</th>
                    <th rowspan="2">Judgement</th>
                    <th rowspan="2">Reason for Judgement</th>
                </tr>
                <tr>          
                    <th>Before</th>
                    <th>After</th>
                    <th>CR Plan</th>
                </tr>    
              </thead>
              <tbody>
                <?php while ($row = mysqli_fetch_array($result)) {
                  echo '
                  <tr>
                    <td>'.$row["mainno"].'</td>
                    <td>'.$row["controlno"].'</td>
                    <td>'.$row["revno"].'</td>
                    <td>'.$row["targetpartno"].'</td>
                    <td>'.$row["partno"].'</td>
                    <td>'.$row["partnoo"].'</td>
                    <td>'.$row["partnooo"].'</td>
                    <td>'.$row["partname"].'</td>
                    <td>'.$row["ppn"].'</td>
                    <td>'.$row["ppno"].'</td>
                    <td>'.$row["ppnoo"].'</td>
                    <td>'.$row["ppnooo"].'</td>
                    <td>'.$row["parentname"].'</td>
                    <td>'.$row["country"].'</td>
                    <td>'.$row["supp"].'</td>
                    <td>'.$row["sn"].'</td>
                    <td>'.$row["mc"].'</td>
                    <td>'.$row["vai"].'</td>
                    <td>'.$row["secashpur"].'</td>
                    <td>'.$row["lopur"].'</td>
                    <td>'.$row["ashpur"].'</td>
                    <td>'.$row["cost"].'</td>
                    <td>'.$row["date"].'</td>
                    <td>'.$row["bfre"].'</td>
                    <td>'.$row["aftr"].'</td>
                    <td>'.$row["crplan"].'</td>
                    <td>'.$row["invstmnt"].'</td>
                    <td>'.$row["currency"].'</td>
                    <td>'.$row["theme_title"].'</td>
                    <td>'.$row["prop_summary"].'</td>
                    <td>'.$row["bfp"].'</td>
                    <td>'.$row["prop_class"].'</td>
                    <td>'.$row["target_model"].'</td>
                    <td>'.$row["section_hg"].'</td>
                    <td>'.$row["jud_pur"].'</td>
                    <td>'.$row["jud_hg"].'</td>
                    <td>'.$row["judgement"].'</td>
                    <td>'.$row["reason"].'</td>
                  </tr>';
                } ?>
              </tbody>
          
        </table>
        </section>
      </div>
      </div>
      <br>
      <br>
      <br>

      <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
        
  <script>
    $(document).ready(function(){
      $('#tabel-data').DataTable();
    })
  </script>

  <!-- jQuery -->
  <!-- <script src="plugins/jquery/jquery.min.js"></script> -->
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

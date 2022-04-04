  <?php
    include 'koneksi.php';
    $query = "SELECT * FROM tbdata ORDER BY id DESC";
    $result = mysqli_query($con, $query);      
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <?php include 'header.php' ?>
  <!-- link untuk style table -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
  <!-- link jquery -->
  <!-- <script src="plugins/jquery/jquery.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <!-- code jquery -->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
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

  #tabel-data_filter{
    float: left;
  }
  </style>

  </head>
  <body class="hold-transition sidebar-mini layout-fixed">

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

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php include 'sidebar.php' ?>
    </aside>

    <!-- Content Wrapper. Contains page content -->
  
    
    <center>
      <h2>Summary Data VA</h2>
      <a target="_blank" href="export_excel.php" class="btn btn-primary">Export Excel</a>
      </center>
        
      <div class="container">
      <section class="content">
      
      <div class="fixTableHead">
      <table id="tabel-data">
              <thead>
                <tr>
                    <!-- <th rowspan="2">No.</th> -->
                    <!-- <th colspan="4"rowspan="2">Filename</th> -->
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
                    <th rowspan="2">Action Export</th>
                    <th rowspan="2">Action Edit</th>
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
                    <td>'.$row["theme_title"].'</td>
                    <td>'.$row["target_model"].'</td>
                    <td>'.$row["sn"].'</td>
                    <td>'.$row["vai"].'</td>
                    <td>'.$row["bfre"].'</td>
                    <td>'.$row["aftr"].'</td>
                    <td>'.$row["crplan"].'</td>
                    <td>'.$row["prop_summary"].'</td>
                    <td>'.$row["prop_class"].'</td>
                    <td>'.$row["judgement"].'</td>
                    <td>'.$row["reason"].'</td>
                    <td><a class="btn btn-success" href="export_perdata.php?filename='.$row["filename"].'">Export</a></td>
                    <td><a class="btn btn-danger" href="edit.php?filename='.$row["filename"].'">Edit</a></td>
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
        
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <?php include 'footer.php' ?>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    <!-- <td><a class="btn btn-success" href="export_perdata.php?filename='.$row["filename"].'">Export</a></td>
    <td><a class="btn btn-danger" href="edit.php?filename='.$row["filename"].'">Edit</a></td> -->
    <!-- script datatable -->
  <script>
    $(document).ready(function(){
      $('#tabel-data').DataTable({
        "dom": '<"top"f>rt<"bottom"ilp><"clear">'
      });
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

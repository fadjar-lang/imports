<?php 
include 'koneksi.php';
$select = $_GET['select'];
$query = "SELECT bfre,aftr,judgement FROM tbdata WHERE target_model='$select'";
mysqli_query($con, $query);
?>

<?php 
          $befor = mysqli_query($con, "SELECT bfre,judgement,aftr from tbdata WHERE target_model='A'");
          //echo json_encode($befor);
          while($row = mysqli_fetch_array($befor)){
            echo $jumlah = $row['bfre'];
            echo '<br>';
            echo $jumlah = $row['aftr'];
            echo '<br>';
            echo $jumlah_judgement = $row['judgement'];
            echo '<br>';
          }
        ?>
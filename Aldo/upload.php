<?php include'header.php' ?>


<center>
        <h1>Upload Data VA/VE</h1>


        <form action=""method="POST" enctype="multipart/form-data" >
        <b>File Upload</b> 
        <input type="file" name="NamaFile">
        <input type="submit" name="proses" value="Upload">

            
            
   
<?php
$koneksi = mysqli_connect("localhost","root","akoe","db_vave");

if(isset($_POST['proses'])){

    $direktori = "FolderPNM/";
    $file_name=$_FILES['NamaFile']['name'];
    move_uploaded_file($_FILES['NamaFile']['tmp_name'],$direktori.$file_name);

    mysqli_query($koneksi, "insert into dokumen set file='$file_name'");

    echo "<br><b><br>File Berhasil diupload <b>";
    
}
?>

    <br>
    <br>
    <br>
    <a href="index.php" class="btn btn-warning btn-xs">Kembali</a>
</center>
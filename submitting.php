<?php 
session_start();
include 'book connect.php';
if(!isset($_SESSION['admin'])&&!isset($_SESSION['adpas'])&&!isset($_SESSION['id'])){
    if(empty($_POST['username'])&&empty($_POST['password'])&&empty($_POST['id'])){
    echo "<script> alert('Anda belum login! login dulu!');
    document.location.href='submitting.html';</script>";
    }
}
if(!isset($_SESSION['admin'])&&!isset($_SESSION['adpas'])&&!isset($_SESSION['id'])){
if(!empty($_POST['username'])&&!empty($_POST['password'])&&!empty($_POST['id'])){
$admin=$_POST['username'];
$adpas=$_POST['password'];
$id=$_POST['id'];
$chek1=mysqli_query($con,"SELECT * FROM admin WHERE username='$admin' AND id='$id' AND password='$adpas'");
if(mysqli_num_rows($chek1)>0){
     if($id===1111){
         $_SESSION['master']=$admin;
        $_SESSION['maspas']=$adpas;
        $_SESSION['idmas']=$id;
        echo "<script>alert('Selamat datang Master!');
    document.location.href='admin.php'</script>";
     }
    $_SESSION['admin']=$admin;
    $_SESSION['adpas']=$adpas;
    $_SESSION['id']=$id;
}else{
    echo "<script>alert('anda tidak mendapat izin dari admin!');
    document.location.href='submitting.html'</script>";
}
}else{
    echo "<script>alert('anda tidak mengisi apapun!');
    document.location.href='submitting.html'</script>";
}
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!empty($_FILES["file"]["name"])){
    $target_dir = "booklist/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$x = explode('.', $target_file);
$imageFileType = strtolower(end($x));
// Check if file already exists
if (file_exists($target_file)) {
    echo "<div class='alert alert-warning alert-dismissable'>
    <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>peringatan!</strong> Maaf nama file sudah ada,coba yang lain.
  </div>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file"]["size"] > 10000000) {
    echo "<div class='alert alert-warning alert-dismissable'>
    <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>peringatan!</strong> Maaf file anda kebesaran ukuran datanya(tidak boleh melebihi 10 Mb).
  </div>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "pdf" ) {
    echo "<div class='alert alert-warning alert-dismissable'>
    <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>peringatan!</strong> Maaf, hanya file PDF diizinkan.
  </div>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<div class='alert alert-danger alert-dismissable'>
    <a class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>gagal!</strong> file anda gagal upload.
  </div>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "<div class='alert alert-success alert-dismissable'>
    <a class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Success!</strong>file" .basename( $_FILES['file']['name']). " berhasil upload.
  </div>";
    $pdf=$target_file;
    } else {
        echo "<div class='alert alert-warning alert-dismissable'>
    <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>peringatan!</strong> maaf ada kesalahan dengan file anda! coba lihat pesan errornya!.
  </div>";
    }
}
    }

    if(!empty($pdf)&&!empty($_POST['kategori']))
    {
        if($uploadOk===1){
        $kat=$_POST['kategori'];
        mysqli_query($con,"INSERT INTO ".$kat."(buku,oleh) VALUES('$pdf','".$_SESSION['admin']."')");
        mysqli_query($con,"INSERT INTO history(username,buku,jenis) VALUES('".$_SESSION['admin']."','$pdf','$kat')");
        }
    }
}
?>
<!DOCTYPE php>
<html lang="in-ID">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PDP~Private Discussion Project</title>
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="bootstrap-3.3.7-dist/jquery-3.2.1.js"></script>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </head>
    <style>
        body{
            background-color:rgba(200,200,200,0.1);
            margin:auto;
            color:darkorange;
        }
    </style>
    <body>
        <center>
<label width="100%" height="auto">
                <legend>Form untuk upload file</legend>
                <?php echo $_SESSION['admin'];?>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                <td>Browse file</td>
                <td>:</td>
                <td><input type="file" class="form-control" name="file"></td>
            </tr>
            <tr>
                <div>
                <td>Kategori</td>
                <td>:</td>
                <td>
                <input type="radio" name="kategori" value="fabel" required/>Fable<br/>
                <input type="radio" name="kategori" value="folktale" required/>Folktale<br/>
                <input type="radio" name="kategori" value="legend" required/>Legend<br/>
                <input type="radio" name="kategori" value="myth" required/>Myth<br/>
                </td>
                </div>
                </tr>
            <tr>
            <td colspan="3"><button type="submit" class="btn btn-success btn-block" name="submit">Upload files pdf</button></td>
            </tr>
            </table>
            </form>
            </label>
            <center>
<footer>
     <div class="btn-group btn-group-justified">
    <a href="logoutweb.php" class="btn btn-danger">Logout</a>
    </div> 
</footer>
    </body>
</html>
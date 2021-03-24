<?php
session_start();
include 'SQL connect.php';
if(isset($_SESSION['username'])&&isset($_SESSION['password']))
{
$username=$_SESSION['username'];
$password=$_SESSION['password'];
$cek1=mysqli_query($con,"SELECT * FROM signup WHERE username='$username' AND password='$password'");
while($row=mysqli_fetch_array($cek1))
{
    $foto=$row['foto'];
    $nama=$row['nama'];
    $email=$row['email'];
    $user=$row['username'];
    $pass=$row['password'];
}
}else{
    echo "<script>alert('Akses dilarang! anda tidak terdeteksi sebagai user!');
    document.location.href='signup.php'</script>";
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
    <body>
        <div class="container">            
  <div class="table-responsive">          
            <center>
                <table border="1px solid black">
                    <caption>Account Information</caption>
                <tr>
                    <td>Nama</td>
                    <td><?php echo $nama?></td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td><?php echo $email?></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><?php echo $user?></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><?php echo $pass?></td>
                </tr>
            </table>
        </center>
  </div>
</div>
<footer>
     <div class="btn-group btn-group-justified">
    <a href="signup.php" class="btn btn-warning">Batal/kembali</a>
    <a href="logout.php" class="btn btn-danger">Logout</a>
    </div> 
</footer>
    </body>
</html>

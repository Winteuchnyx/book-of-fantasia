<?php
session_start();
include 'SQL connect.php';
if(isset($_SESSION['username'])&&isset($_SESSION['password'])){
$username=$_SESSION['username'];
$password=$_SESSION['password'];
mysqli_query($con,"DELETE FROM general WHERE tanggal < (NOW() - INTERVAL 14 DAY)");
$data1=mysqli_query($con,"SELECT * FROM general");
$data2=mysqli_query($con,"SELECT * FROM signup WHERE username='$username' AND password='$password'");
while($row1=mysqli_fetch_array($data2))
{
    $foto=$row1["foto"];
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!empty($_POST["message"])){
        $pesan=$_POST["message"];
        mysqli_query($con,"INSERT INTO general(foto,username,pesan) VALUES('$foto','$username','$pesan')");
        header('location:general.php');
    }
}
}
?>
<!DOCTYPE php>
<html lang="In-ID">
    <head>
        <meta http-equiv="refresh" content="60">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Public Discussion</title>
    </head>
    <body>
        <?php
        while($row2=mysqli_fetch_array($data1)){
            echo '
            <div style="overflow:auto;width:100%;height:20%;position:relative;">
            <div style="float:left;width:15%">
            <a href='.$foto=$row2["foto"].' target="_blank"><img src=' .$foto=$row2["foto"]. ' alt="Error" width="100%" height="100%"></a>
            </div>
            <div style="background-color:yellow;position:absolute;top:0;right:0;width:85%;height:20%;">
                <span style="float:left;font-size:125%;">Username: '.$user=$row2["username"].'</span>
                <span style="float:right;font-size:125%;">Waktu:'.$tgl=$row2["tanggal"].'</span>
            </div>
                <div style="background-color:green;height:80%;width:85%;position:absolute;bottom:0;right:0;">
                <p>'.$psn=$row2["pesan"].'</p>
                </div>
        </div><br/>
        ';
        }
        ?>
<div style="position:fixed;bottom:0;width:100%;">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <input style="width:90%;border:2px solid black;" type="text" name="message" autofocus>
        <input style="width:10%;float:right;display:inline;" type="submit" value="send">
</form>
</div>
    </body>
</html>
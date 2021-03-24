<?php 
session_start();
require 'engine.php';
include 'SQL connect.php';
if(!isset($_SESSION['username'])&&!isset($_SESSION['password']))
{
    echo "<script>alert('Anda telah Logout atau anda belum Login, coba login kembali!');
    document.location.href='signup2.php';</script>";
}
$username=$_SESSION['username'];
$password=$_SESSION['password'];
$add=mysqli_query($con,"SELECT * FROM signup WHERE username='$username' AND password='$password'");
while($row=mysqli_fetch_array($add))
{
    $foto=$row['foto'];
}
if(isset($_SESSION['username'])&&isset($_SESSION['password'])){
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(!empty($_POST["catatan"])){
        $addnotes=$_POST["catatan"];
        $notes=mysqli_query($con,"INSERT INTO notes(username,pesan) VALUES('$username','$addnotes')");
        }
    }
}
?>
<!DOCTYPE php>
<html lang="in-ID">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PDP Forum SITES</title>
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="bootstrap-3.3.7-dist/jquery-3.2.1.js"></script>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <style>
            body{
                background-color:rgba(200,200,200,0.5);
            }
            nav{
                width:70%;
            }
            .navbar {
                margin-bottom: 0;
                background-color: #005C66;
                opacity: 0.7;
                z-index: 9999;
                border: 0;
                font-size: 12px !important;
                line-height: 1.42857143 !important;
                letter-spacing: 4px;
                border-radius: 0;
            }

            .navbar li a, .navbar .navbar-brand {
                color: #fff !important;
            }

            .navbar-nav li a:hover, .navbar-nav li.active a {
                color: mediumturquoise !important;
                background-color: #111 !important;
            }

            .navbar-default .navbar-toggle {
                border-color: transparent;
                color: #111 !important;
            }
            nav ul
            {
                list-style-type: none;
                margin: 0;
                padding: 0;    
                overflow: hidden;
            }
            .dropdown{
                position:absolute;
                top:200%;
            }
        </style>
    </head>
        <body>
            <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" value="data" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="<?php echo $foto?>" target="_blank"><img src="<?php echo $foto?>" height="200%" width="15%" style="overflow:auto;position:absolute;left:0;"></a>
                        <div style="padding:5%;width:125%;text-align:center;">
            <li class="dropdown" style="list-style-type:none;padding:0;margin:0;">
          <a class="dropdown-toggle" data-toggle="dropdown"><p style="color:orangered;cursor:pointer;font-weight:900;font-size:150%;width:60%"><?php echo "$username"?><span class="caret"></span></p></a>
          <ul class="dropdown-menu">
            <li><button type="button" class="btn btn-warning btn-block" onclick="document.location.href='update.php';">Akun</button></li>
            <li><button type="button" class="btn btn-danger btn-block" onclick="document.location.href='logout.php';">Log out</button></li>
          </ul>
        </li>
        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav" style="margin-left:30%;">
                <li><a href="general.php" target="chatframe">Public disscussion</a></li>
                <li><a href="private.php" target="chatframe">Private discussion</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            </ul>
                    </div>
            </div>
        </nav>
        <aside>
            <div style="right:0;height:100%;width:30%;position:fixed;background-color:rgba(255, 228, 225,0.4);z-index:10000;overflow-y:auto;opacity:0.9;">
                <form class="form-horizontal" style="background-color:midnightblue;" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
      <div class="input-group">
        <input type="text" name="catatan" class="form-control" placeholder="Add notes">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <span class="glyphicon glyphicon-share"></span>
          </button>
        </div>
      </div>
      <div class="alert alert-info alert-dismissable fade in">
      <a class="close" data-dismiss="alert" aria-label="close">×</a>
      <span class="help-block"><b>INFO</b> Forum notes only updating if you refresh page or just sign in! click (x) to close</span>
      </div>
    </form>
    <?php 
    $catatan=mysqli_query($con,"SELECT * FROM notes");
    mysqli_query($con,"DELETE * FROM notes WHERE tanggal < (NOW() - INTERVAL 60 DAY) ");
    while($bar=mysqli_fetch_array($catatan))
    {
    echo"
    <div style='background-color: yellowgreen;'>
    <ul style='list-style-type:none;padding:0;margin:0;'>
        <li style='font-weight:bold;font-style:italic;font-size:150%;color:#B80047'><span> User: " .$usernotes=$bar["username"]. "</span></li>
        <li style='float:right;'><span>" .$notedate=$bar["tanggal"]. "</span></li>
        <li><p style='overflow:auto;white-space:pre-wrap;font-size:130%;'>" .$notemessage=$bar["pesan"]. "</p></li>
    <ul>
    </div>
    ";}
    ?>
    </div>
        </aside>
        <div style="position:fixed;height:100%;width:50%;top:10%;left:18%;">
            <iframe src="general.php" style="height:90%;width:100%;border: 2px dashed green;" name="chatframe"></iframe>
        </div>
        </body>
</html>
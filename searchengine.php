<?php 
include 'book connect.php';
$fabel=mysqli_query($con,"SELECT * FROM fabel");
$folktale=mysqli_query($con,"SELECT * FROM folktale");
$legend=mysqli_query($con,"SELECT * FROM legend");
$myth=mysqli_query($con,"SELECT * FROM myth");
$data=$_POST["searching"];
?>
<!DOCTYPE html>
<html lang="in-ID">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Of Fantasia</title>
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="bootstrap-3.3.7-dist/jquery-3.2.1.js"></script>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <header class="container-fluid" style="background-color:fuchsia;color: darkslateblue;height:200px;">
            <div class="jumbotron">
                <h1>Book Of Fantasia</h1>
                <h3>Place for a story to be known</h3>
            </div>
        </header>
        <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="home.html" style="color:darkseagreen;">Home</a></li>
        <li  class="active"><a href="booklist.html" style="color:darkseagreen;">Book list</a></li>
        <li><a href="community.html" style="color:darkseagreen;">Community</a></li>
        <li><a href="submit.html" style="color:darkseagreen;">Submit</a></li>
        <li><a href="about.html" style="color:darkseagreen;">About</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li>
        <form class="navbar-form navbar-left" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
      <div class="input-group">
        <input type="text" name="searching" class="form-control" placeholder="Search content">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
          </li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-10 text-left" style="color:darkorange;"> 
      <?php
      $ok=0;
      while($row1=mysqli_fetch_array($fabel)){
          $buk=$row1["buku"];
          $pem=$row1["oleh"];
          $tang=$row1["tanggal"];
          if(strcasecmp($data,$buk)==0){
    echo'
      <h3>Posted by : '.$pem.'</h3>
      <h6>Date: '.$tang.'</h6>
      <a href="'.$buk.' target="_blank">'.$buk.'</a>
      ';
      $ok=1;
          }
    }
    while($row2=mysqli_fetch_array($folktale)){
        $peng=$row2["oleh"];
        $tangg=$row2["tanggal"];
        $bu=$row2["buku"];
        if(strcasecmp($data,$buk)==0){
    echo'
      <h3>Posted by : '.$peng.'</h3>
      <h6>Date: '.$tangg.'</h6>
      <a href="'.$bu.' target="_blank">'.$bu.'</a>
      ';
      $ok=1;
    }
    }
    while($row3=mysqli_fetch_array($legend)){
        $pengiri=$row3["oleh"];
        $tangga=$row3["tanggal"];
        $b=$row3["buku"];
        if(strcasecmp($data,$buk)==0){
    echo'
      <h3>Posted by : '.$pengiri.'</h3>
      <h6>Date: '.$tangga.'</h6>
      <a href="'.$b.' target="_blank">'.$b.'</a>
      ';
      $ok=1;
    }
    }
    while($row4=mysqli_fetch_array($myth)){
        $pengirim=$row4["oleh"];
        $tanggal=$row4["tanggal"];
        $buku=$row4["buku"];
        if(strcasecmp($data,$buk)==0){
    echo'
      <h3>Posted by : '.$pengirim.'</h3>
      <h6>Date: '.$tanggal.'</h6>
      <a href="'.$buku.' target="_blank">'.$buku.'</a>
      ';
      $ok=1;
    }
    }
    if($ok===0){
    echo'<h1 style="text-align:center;">Result not found</h1>';
    }
      ?>
    </div>
    <div class="col-sm-2 sidenav">
      <div>
        <video width="100%" height="200px" autoplay>
            <source src="Trailers/Alien Covenant _ Official Trailer [HD] _ 20th Century FOX.mp4" type="video/mp4">
            Your browser does not support the video tag.
          </video>
      </div>
      <div>
        <div style="border: 2px solid cyan; border-radius: 5%;font-size:150%;color:green;background-color:cornflowerblue;opacity:0.5;"><p>Account</p></div>
          <iframe src="community/signup.php" width="100%" height="267px" style="border: 2px solid cyan;"></iframe>
      </div>
      <div>
        <div style="border: 2px solid orchid; border-radius: 5%;font-size:150%;color:green;background-color:cornflowerblue;opacity:0.5;"><p>History of content</p></div>
          <iframe src="history.php" width="100%" height="auto" style="border: 2px solid orchid;"></iframe>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>&copy; Copyright : Winto Junior Khosasih</p>
</footer>
<script>
$(document).ready(function(){
    /* affix the navbar after scroll below header */
    $(".navbar").affix({offset: {top: $("header").outerHeight(true)} });
});
</script>
    </body>
</html>
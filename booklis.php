<?php 
include 'book connect.php';
$fabel=mysqli_query($con,"SELECT * FROM fabel");
$folktale=mysqli_query($con,"SELECT * FROM folktale");
$legend=mysqli_query($con,"SELECT * FROM legend");
$myth=mysqli_query($con,"SELECT * FROM myth");
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
        <style>
            body{
                color:LawnGreen  ;
            }
            a:link{
                color:orangered;
                text-decoration:none;
            }
            a:hover{
                color:darkorange;
            }
          .tab-pane{
            background-color:rgba(200,200,200,0.2);
          }
          </style>
    </head>
<div class="container">
  <h2>Book Category</h2>
  <p>This list based on time submitted time, just click the Book's title link to read the story.</p>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Fable</a></li>
    <li><a data-toggle="tab" href="#menu1">Folktale</a></li>
    <li><a data-toggle="tab" href="#menu2">Legend</a></li>
    <li><a data-toggle="tab" href="#menu3">myth</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    <?php 
    while($row1=mysqli_fetch_array($fabel)){
    echo'
      <h3>Posted by : '.$pem=$row1["oleh"].'</h3>
      <h6>Date: '.$tang=$row1["tanggal"].'</h6>
      <a href="'.$buk=$row1["buku"].' target="_blank">'.$buk=$row1["buku"].'</a>
      ';
    }
    ?>
    </div>
    <div id="menu1" class="tab-pane fade">
      <?php 
    while($row2=mysqli_fetch_array($folktale)){
    echo'
      <h3>Posted by : '.$peng=$row2["oleh"].'</h3>
      <h6>Date: '.$tangg=$row2["tanggal"].'</h6>
      <a href="'.$bu=$row2["buku"].' target="_blank">'.$bu=$row2["buku"].'</a>
      ';
    }
    ?>
    </div>
    <div id="menu2" class="tab-pane fade">
      <?php 
    while($row3=mysqli_fetch_array($legend)){
    echo'
      <h3>Posted by : '.$pengiri=$row3["oleh"].'</h3>
      <h6>Date: '.$tangga=$row3["tanggal"].'</h6>
      <a href="'.$b=$row3["buku"].' target="_blank">'.$b=$row3["buku"].'</a>
      ';
    }
    ?>
    </div>
    <div id="menu3" class="tab-pane fade">
      <?php 
    while($row4=mysqli_fetch_array($myth)){
    echo'
      <h3>Posted by : '.$pengirim=$row4["oleh"].'</h3>
      <h6>Date: '.$tanggal=$row4["tanggal"].'</h6>
      <a href="'.$buku=$row4["buku"].' target="_blank">'.$buku=$row4["buku"].'</a>
      ';
    }
    ?>
    </div>
  </div>
</div>
</body>
</html>
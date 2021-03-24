<?php 
include 'book connect.php';
$history=mysqli_query($con,"SELECT * FROM history");
mysqli_query($con,"DELETE FROM history WHERE tanggal < (NOW() - INTERVAL 60 DAY)");
?>
<!DOCTYPE php>
<html lang="In-ID">
    <head>
        <meta http-equiv="refresh" content="10">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Website history</title>
        <style>
            body{
                color:orangered;
            }
            </style>
    </head>
    <body>
        <?php
        while($row2=mysqli_fetch_array($history)){
            echo '
            <div style="overflow:auto;width:auto;height:20%;position:relative;">
            <div style="background-color:yellow;position:absolute;top:0;right:0;width:auto;height:20%;">
                <span>Username: '.$user=$row2["username"].'</span>
            </div>
                <div style="background-color:rgba(0,255,0,0.5);height:80%;width:auto;position:absolute;bottom:0;right:0;">
                <span>Waktu submit:'.$tgl=$row2["tanggal"].'</span>
                <p>Nama buku: <a href='.$pdf=$row2["buku"].' target="_blank">' .$pdf=$row2["buku"]. '</a></p>
                <p>Kategori buku: '.$jns=$row2["jenis"].'</p>
                </div>
        </div><br/>
        ';
        }
        ?>
    </body>
</html>
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
        }
    </style>
    <body>
        <center>
    <?php 
        session_start();
        require 'engine.php';
        include 'SQL connect.php';
        if(isset($_SESSION['username'])&&isset($_SESSION['password']))
                {
                    $username=$_SESSION['username'];
                    $password=$_SESSION['password'];
                    $add=mysqli_query($con,"SELECT * FROM signup WHERE username='$username' AND password='$password'");
                    while($row=mysqli_fetch_array($add))
                    {
                        $foto=$row['foto'];
                    }
                    header("location:forum2.php");
                }else{echo'
        <label style="width:auto;height:auto">
            <legend style="color:darkorange;">Community Login</legend>
        <form class="form-horizontal" action="foruma.php" method="POST">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="username" type="text" name="username" class="form-control" placeholder="Username" autocomplete="off" required/>
    </div>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input id="password" type="password" name="password" class="form-control" placeholder="Password" autocomplete="off" required/>
    </div>
    <span class="help-block" style="color:darkorange;">Don\'t have account? create a free community account <a href="daftar2.html" target="_parent">here</a></span>
        <button type="submit" class="btn btn-default">Submit</button>
  </form>
        </label>';
                }
                ?>
                </center>
        </body>
</html>
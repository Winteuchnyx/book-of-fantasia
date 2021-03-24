<!DOCTYPE php>
<html lang="in-ID">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="30">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PDP~Private Discussion Project</title>
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="bootstrap-3.3.7-dist/jquery-3.2.1.js"></script>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </head>
    <body>
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
                    echo '
                    <p style="color:skyblue;font-weight:900;font-size:150%;">Login as:</p>
                    <div width="auto" height="auto" class="well"><a href="';?><?php echo $foto?><?php echo '" target="_blank"><img src="';?><?php echo $foto?><?php echo'" height="50%" width="100%"></a>
                        <div style="cursor:pointer;">
            <li style="list-style-type:none;padding:0;margin:0;">
          <p style="color:skyblue;margin:auto;font-size:auto;text-align:center;">';?><?php echo $username?><?php echo'</p>
          <ul style="list-style-type:none;padding:0;margin:0;">
            <li><button type="button" class="btn btn-warning btn-block" onclick="document.location.href=\'update1.php\';" target="_parent community">Akun</button></li>
            <li><button type="button" class="btn btn-danger btn-block" onclick="document.location.href=\'logout1.php\';">Log out</button></li>
          </ul>
        </li>
        </div>
        </div>';
                }else{echo'
        <label style="width:auto;height:auto">
            <legend>Community Login</legend>
        <form class="form-horizontal" action="forum.php" method="POST">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="username" type="text" name="username" class="form-control" placeholder="Username" autocomplete="off" required/>
    </div>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input id="password" type="password" name="password" class="form-control" placeholder="Password" autocomplete="off" required/>
    </div>
    <span class="help-block">Don\'t have account? create a free community account <a href="daftar2.html" target="_parent">here</a></span>
        <button type="submit" class="btn btn-default">Submit</button>
  </form>
        </label>';
                }
                ?>
    </body>
</html>
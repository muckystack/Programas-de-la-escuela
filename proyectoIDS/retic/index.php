<?php    
    include('config.php');
    if(isset($_POST['submit'])){
        $user = $_POST['user'];
        $pass = sha1($_POST['pass']);
        $query = "select * from userdata where username='$user' and password='$pass'";
        $r = mysql_query($query);
        if(mysql_num_rows($r) == 1){
            $row = mysql_fetch_assoc($r);
            $_SESSION['level'] = $row['level'];
            $_SESSION['id'] = $row['username'];
            $_SESSION['name'] = $row['fname'].' '.$row['lname'];
            header('location:'.$row['level'].'');
        }else{
            header('location:index.php?login=0');
        }
    }

    if(isset($_SESSION['level'])){
        header('location:'.$_SESSION['level'].'');   
    }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Sistema Seguimiento Reticular</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Sistema Seguimiento Reticular</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form" action="index.php" method="POST">
            <div class="form-group">
                <?php if(isset($_GET['login'])): ?>
                    <label class="text-danger">Invalido Usuario/Contraseña</label>&nbsp;
                <?php endif; ?>
            </div>
            <div class="form-group">
              <input type="text" placeholder="No. Control" class="form-control" name="user">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Contraseña" class="form-control" name="pass">
            </div>
            <button type="submit" class="btn btn-success" name="submit">Entrar</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Bienvenido!</h1>
        <p>En este sistema podrás llevar el  seguimiento reticular de tus materias...</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Ver más &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
     <!--  <div class="row">
        <div class="col-md-4">
          <h2 class="center"><i class="fa fa-users fa-5x"></i></h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2 class="center"><i class="fa fa-table fa-5x"></i></h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2 class="center"><i class="fa fa-tasks fa-5x"></i></h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>-->

      <hr>

      <footer>
        <p>&copy; Itesi Ext. Tarimoro Carrera: Ing. en Sistemas 2017</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

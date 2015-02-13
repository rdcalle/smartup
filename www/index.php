<?php

  function usuarioValidado($user, $pass) {
      $db = new mysqli('localhost', 'user', 'pass', 'demo');

      if($db->connect_errno > 0) {
        return false;
      }

      $query = "select * from usuarios where username='$user' and password='$pass'";
      if(!$result = $db->query($query)) {
        return false;
      }

      return ($result->num_rows) ? true : false;
  }

  $bienvenida = $_POST && usuarioValidado($_POST['username'], $_POST['password']);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SmartUp Login Test</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div>
      <img src="img/fondo_cabecera.jpg" width="600" alt="imagen de la cabecera del flyer" class="img-responsive center-block">
    </div>
    <div>
      <img src="img/fondo_login.jpg" width="600" alt="imagen de la cabecera del flyer" class="img-responsive center-block">
      <div class="container caja-login">
        <div class="row row-centered">
          <div class="col-xs-6 col-centered col-min col-max">
            <div class="item">
<?php if (!$_POST) { ?>
              <div class="content login">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                  <div class="titulo">
                    <p>User Login</p>
                  </div>
                  <div class="inputs">
                      <input type="text" class="form-control superior" name="username" id="username" placeholder="Username" required autofocus>
                    <input type="password" class="form-control inferior" name="password" id="password" placeholder="Password" required>
                  </div>
                  <div class="boton">
                    <input type="submit" class="form-control boton" name="login" id="login" value="Login">
                  </div>
                </form>
              </div>
<?php } elseif ($bienvenida) { ?>
              <div class='content mensaje'>
                <h5>Welcome <?php echo '"<strong>'.$_POST['username'].'</strong>"'; ?></h5>
                <a class='form-control boton' href='<?php echo $_SERVER['PHP_SELF']; ?>'>Back</a>
              </div>
<?php } else { ?>
              <div class='content mensaje'>
                <h5>User/Password wrong!</h5>
                <a class='form-control boton' href='<?php echo $_SERVER['PHP_SELF']; ?>'>Back</a>
              </div>
<?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div>
      <img src="img/fondo_pie.jpg" width="600"  alt="imagen de la cabecera del flyer" class="img-responsive center-block">
    </div>

    <!-- librerías y frameworks JS necesarios -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

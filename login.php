<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /proyectoFinal');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT * FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      if ($results['estado']==1) {
        $_SESSION['user_id'] = $results['id'];
        header("Location: /proyectoFinal");
      }else{
        $message = '
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Lo sentimos, tu usuario no ha sido habilitado</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
      }
      
    } else {
      $message = '
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Lo sentimos, tus credenciales no coinciden</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="assets/css/all.css" rel="stylesheet">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
  <body class="bg-dark">
    

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
    <div class="container mt-5" style="text-align: -webkit-center;">
    <form action="login.php" method="POST">
    <div class="card text-center">
      <div class="card-header">
      <h1>Inicia Sesion</h1>
        <span>o <a href="signup.php">Registrate</a></span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="form-group col-lg-12">
            <input name="email" type="text" placeholder="Ingresa tu correo">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-lg-12">
            <input name="password" type="password" placeholder="Ingresa tu password">
          </div>
        </div>
      </div>
      <div class="card-footer text-muted">
        <input class="btn btn-primary" type="submit" value="Submit">
      </div>
    </div>
    </div>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>


    </form>
  </body>
</html>

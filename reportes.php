<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, rol, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
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

<body>
<?php if(!empty($user)): ?>
<?php require 'partials/header.php' ?>

    <div class="container mt-3">
        <h2>Módulo de reportes</h2>

        <form method="POST" action="filtro.php" id="filtroVisitas">
            <div class="row my-2">
                <div class="col col-md-3">
                    <input type="text" id="cedula" class="form-control" placeholder="Cedula">
                </div>
                <div class="col col-md-3">
                    <input type="datetime-local" id="fechaInicio" class="form-control" placeholder="Fecha Inicio">
                </div>
                <div class="col col-md-3">
                    <input type="datetime-local" id="fechaFin" class="form-control" placeholder="Fecha Fin">
                </div>
                <div class="col">
                </div>
            </div>
            <div class="row my-2">
                <div class="col">
                <select class="custom-select" id="torre" name="torre">
                    <option>Seleccione Torre</option>
                    <option value="1">Torre 1</option>
                    <option value="2">Torre 2</option>
                    <option value="3">Torre 3</option>
                </select>
                </div>
                <div class="col">
                <select class="custom-select" id="piso" name="piso">
                    <option>Seleccione Piso</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                </div>
                <div class="col">
                <select class="custom-select" id="apartamento" name="apartamento">
                    <option>Seleccione Apartamento</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
                </div>
                <div class="col">
                <span class="form-control btn btn-success" id="buscar">
                    <i class="fas fa-check"></i>
                </span>
                </div>
            </div>
        </form>
        <hr>

        <table class="table text-center">
            <thead class="bg-info text-white">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Cedula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Torre</th>
                <th scope="col">Piso</th>
                <th scope="col">Apartamento</th>
                <th scope="col">Documento</th>
                
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1001</th>
                    <td>2021-12-17</td>
                    <td>6-720-388</td>
                    <td>Luis Solano</td>
                    <td>1</td>
                    <td>1</td>
                    <td>A</td>
                    <td>
                        <a href="fotosrecepciones/1639710194-7-709-256.png" target="_blank">
                            <span class="fas fa-eye"></span>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
    <script src="assets/js/filtro.js"></script>

<?php else: header('Location: /proyectoFinal/login.php');?>
<?php endif; ?>
  
</body>

</html>
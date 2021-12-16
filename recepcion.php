<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="assets/css/all.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <form method="POST" action="storeImage.php">
      <div class="card text-center">
        <div class="card-header">
          <h1 class="text-center">Captación de visita</h1>
        </div>
        <div class="card-body">

          <div class="row">
            <div class="form-group col-lg-12">
              <label for="labelfornombre">Nombre del visitante</label>
              <input type="text" class="form-control" id="nombre">
              <small id="ayudaNombre" class="form-text text-muted">Primer nombre y primer apellido</small>
            </div>

            <div class="form-group col-lg-12">
              <hr class="">
              <label for="labelforcedula">Cédula</label>
              <input type="text" class="form-control" id="cedula">
            </div>

            <div class="form-group col-lg-12">
              <hr class="">
              <label for="labelforcedula">Torre</label>
              <select class="custom-select" id="torre">
                <option selected>Seleccione</option>
                <option value="1">Torre 1</option>
                <option value="2">Torre 2</option>
                <option value="3">Torre 3</option>
              </select>
            </div>

            <div class="form-group col-lg-12">
              <hr class="">
              <label for="labelforcedula">Piso</label>
              <select class="custom-select" id="piso">
                <option selected>Seleccione</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
            </div>

            <div class="form-group col-lg-12">
              <hr class="">
              <label for="labelforcedula">Apartamento</label>
              <select class="custom-select" id="apartamento">
                <option selected>Seleccione</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
              </select>
            </div>

            <div class="form-group col-lg-12 mb-5">
              <hr class="">
              <label for="labelforfoto">Foto de documento</label>
              <input type="hidden" name="image" class="image-tag">
              <input type="hidden" name="image" class="image-tag">
              <div id="results"  ></div>
              <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">
                <span class="fas fa-camera"></span>
              </button>
            </div>
          </div>

        </div>
        <div class="card-footer text-muted">
          <button type="submit" class="btn btn-primary">enviar</button>
        </div>
      </div>
    </form>


  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
        <h1>Selecciona un dispositivo</h1>
          <div>
            <select name="listaDeDispositivos" id="listaDeDispositivos"></select>
            <p id="estado"></p>
          </div>
          <br>
          <video muted="muted" id="video" style="max-width: 100%;"></video>
          <canvas id="canvas" style="display: none;"></canvas>
          <button id="boton" type="button" class="btn btn-secondary" data-dismiss="modal">Tomar foto</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
    <script src="script.js"></script>

</body>

</html>
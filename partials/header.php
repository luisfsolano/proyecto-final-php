<header>
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Control de visitas</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Inicio</a>
      </li>
      <?php if($user['rol']==1): ?>
        <li class="nav-item active">
          <a class="nav-link" href="recepcion.php">Registrar Visita</a>
        </li>
      <?php endif; ?>
      <?php if($user['rol']==2): ?>
        <li class="nav-item">
          <a class="nav-link" href="#">Reportes</a>
        </li>
      <?php endif; ?>
      <?php if($user['rol']==3): ?>
        <li class="nav-item">
          <a class="nav-link" href="#">Mis Visitas</a>
        </li>
      <?php endif; ?>
    </ul>
    <span class="navbar-text badge badge-pill badge-secondary text-white">
      <a href="logout.php">Cerrar Sesion</a>
    </span>
  </div>
</nav>
</header>

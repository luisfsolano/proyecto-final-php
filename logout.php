<?php
  session_start();

  session_unset();

  session_destroy();

  header('Location: /proyectoFinal/login.php');
?>

<!DOCTYPE html>
<html lang="es">
 
<head>
	<!--
		Tomar una fotografía y guardarla en un archivo v3
	    @date 2018-10-22
	    @author parzibyte
	    @web parzibyte.me/blog
	-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Tomar foto con Javascript y PHP v3.0</title>
	<style>

	</style>
</head>
 
<body>
	<h1>Tomar foto con JavaScript v3.0</h1>
	<p>
		Programado por Luis Cabrera Benito a.k.a. <a target="_blank" href="https://parzibyte.me/blog">parzibyte</a>
	</p>
	<h1>Selecciona un dispositivo</h1>
	<div>
		<select name="listaDeDispositivos" id="listaDeDispositivos"></select>
		<button id="boton">Tomar foto</button>
		<p id="estado"></p>
	</div>
	<br>
	<video muted="muted" id="video"></video>
	<canvas id="canvas" style="display: none;"></canvas>
</body>
<script src="script.js"></script>
 
</html>
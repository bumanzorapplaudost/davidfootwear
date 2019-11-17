<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Pagina no Encontrada</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style type="text/css">
	* {
		font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
		font-weight: 400;
		overflow: auto;
	}

	body {
		background-image: linear-gradient(to right, #4db6ac, #00897b);
		background-image: url(http://localhost/erp/Components/img/error.jpg);
		background-position: center center;
	}

	.h1 {
		font-size: 120px;
		font-weight: bolder;
		padding: 0px;
		margin: 0px;
		color: #fff;
	}

	p {
		margin : 0;
		padding: 0;
		color: #fff;
		font-weight: bolder;
		font-size: 70px;
	}

	a {
		border: 0;
		text-decoration: none;
		transition-duration: 0.4s;
		font-size: 32px;
		color: #eee;
		font-weight: bold;
		cursor: pointer;
		border-radius: 6px;
	}

	a:hover, a:hover:before { 
		transition-duration: 0.4s;
		color: #ddd;
	}

</style>
</head>
<body>
	<div>
		<span class="h1">404</span>
		<p>Página no encontrada!</p>
		<br>
		<a href="#" onclick="javascript:window.history.back();"><small>&gt;</small> Regresar</a>
		<br><br><br>
		<br>
		<br>
		<br>
		<br>
	</div>
</body>
</html>
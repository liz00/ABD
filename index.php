<?php session_start(); 

function listaTiposDeMusica(){ 
	//Devuelve los tipos de musica permitidos
	//Hubiera sido mejor tenerlos en la base de datos y que
	//el admin pudiera crear tipos y editarlos
	return array("Rock","Clasica","Pop","Electronica","Reggae", "Rap", "Punk", "Blues", "Ska");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Mel&oacute;manos</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<link href="js/jqueryui/jquery-ui.css" rel="stylesheet">
<script src="js/jqueryui/external/jquery/jquery.js"></script>
<script src="js/jqueryui/jquery-ui.js"></script>

</head>

<body>

<div class="container">
  <div class="header"><?php include("includes/cabecera.php"); ?></div>
  <div class="sidebar1"><?php include("includes/lateralizquierda.php"); ?></div>
  <div class="content">
  <?php
  $paginas = array ( "error" => "error.php",
  					 "main" => "main.php",
  			  		 "alta" => "formulario_alta.php",
					 "registrar" => "usuario_alta.php",
					 "logout" => "logout.php",
					 "login" => "login.php",
					 "nuevomensaje" => "formulario_mensajes.php",
					 "enviar" =>  "enviar.php",
					 "mensajes" => "mensajes.php",
					 "admin" => "admin.php",
					 "nuevogrupo" => "grupo_alta.php",
					 "perfil" => "perfil.php");
  
  $page = "main";
  if(!isset($_GET["page"])){
  	$page = "main";
  }else{
	$page = $_GET["page"];
  }
  $ubicacion ="./pages/";
  if(array_key_exists($page,$paginas))
  	$ubicacion .= $paginas[$page];
  else
	$ubicacion .= $paginas["error"];
  
  include($ubicacion);
  
  
  
  ?> 
  </div>
  <div class="footer"><?php include("includes/pie.php"); ?>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>

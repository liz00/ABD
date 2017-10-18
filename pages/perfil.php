<?php 
if(!isset($_SESSION["logueado"]) || !$_SESSION["logueado"]){
  // redirigir a la pagina principal  
    header('Refresh: 0;URL=index.php?page=error');
    exit(0);
}


echo "<h1> PERFIL </h1>";

echo "<p><b>Nombre:</b> ".$_SESSION["nombre"]."</p>";
echo "<p><b>Email:</b> ".$_SESSION["email"]."</p>";
echo "<p><b>Tipo de Musica:</b> ".$_SESSION["tipomusica"]."</p>";
echo "<p><b>Edad:</b> ".$_SESSION["edad"]."</p>";


?>


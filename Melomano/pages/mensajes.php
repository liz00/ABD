<?php require_once('Connections/bdcon.php'); ?>
<?php 
if(!isset($_SESSION["logueado"]) || !$_SESSION["logueado"]){
  // redirigir a la pagina principal  
    header('Refresh: 0;URL=index.php?page=error');
    exit(0);
}

function printMensaje($mensaje){
	$autor = getUserName($mensaje["idautor"]);
	$autor =mysqli_fetch_array($autor);	
    echo "<h3><b>".$mensaje["titulo"]."</b>   ";
    echo "<small>Autor: <b>".$autor["nombre"]."</b> \t el día: ".$mensaje["fecha"]."</small></h3>";
    echo "<div><p>".$mensaje["contenido"]."</p></div>";
}
?>
<div>

<h1> Mis mensajes </h1>
<div id="mnsjs">
<ul>
<li><a href="#Personales" > Personales </a></li>
<li><a href="#Globales">Globales</a></li>
<li><a href="#Grupos"> Grupos </a></li>
</ul>
<div id="Personales">

<div id="men-per">
<?php
	$resultado = getMensajesPersonales($_SESSION["idusu"]);
	if($resultado->num_rows == 0){
		echo "Nadie te ha escrito todavía.";
	}else{
		while ($mensaje= mysqli_fetch_array($resultado)){
			printMensaje($mensaje);
		}
	}
?>
</div>
<script>
$( "#men-per" ).accordion({collapsible: true});
</script>

</div>

<div id="Globales">
<div id="men-glo">
<?php

	$resultado_gl = getMensajesGlobales();
	while ($mensaje= mysqli_fetch_array($resultado_gl)){
		printMensaje($mensaje);
	}
?>
</div>
<script>
$( "#men-glo" ).accordion({collapsible: true});
</script>

</div>
<div id="Grupos">
 <?php $listag = getUserGroup($_SESSION["tipomusica"],$_SESSION["edad"]); $idgrupos = array();
   if($listag->num_rows == 0){
		echo "No existen grupos para ti, margi";   
   }else{
	   ?>
<div id="men-gru">
<ul>
  	<?php 
	while($fila = mysqli_fetch_array($listag)){
		array_push($idgrupos,$fila["idgrupo"]);
		echo "<li><a href='#grupo".$fila["idgrupo"]."' >".$fila["nombre"]."</a></li>";
	}
   ?>
</ul>

<?php
foreach ($idgrupos as $idactual){
	echo "<div id='grupo".$idactual."'>";
	echo "<div id='men-gru".$idactual."'>";
	$resultado_gr = getMensajesGrupales($idactual);
	while ($mensaje= mysqli_fetch_array($resultado_gr)){
		printMensaje($mensaje);
	}
	echo "</div>";
	echo "<script>$( '#men-gru".$idactual."' ).accordion({collapsible: true});</script></div>";
}
?>
</div>

</div>
<script>
$( "#men-gru" ).tabs();
</script>
<?php } ?>
</div>

</div>

</div>
<script>
$("#mnsjs").tabs();
</script>
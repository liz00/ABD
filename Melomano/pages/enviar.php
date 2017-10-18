<?php require_once('Connections/bdcon.php'); ?>
<?php 

if(isset($_GET["tipo"]) && $_GET["tipo"] == "global"){
if(isset($_POST["mensaje"]) 
	&& isset($_POST["titulo"])  ){
    $titulo = $_POST["titulo"];
	$mensaje = $_POST["mensaje"];
    $idaut=$_SESSION["idusu"];
	enviarMensajeGlobal($idaut,$titulo,$mensaje);
	
	
	//header('Refresh: 5; URL=index.php?page=main');
	exit(0);
    
}
}else if (isset($_GET["tipo"]) && $_GET["tipo"] == "grupo"	&& isset ($_POST["destinatario"])){
    $titulo = $_POST["titulo"];
	$mensaje = $_POST["mensaje"];
	$grupoDestinatario = $_POST["destinatario"];
    $idaut = $_SESSION["idusu"];
	enviarMensajeGrupo($idaut,$titulo,$mensaje,$grupoDestinatario);
}else{
if(isset($_POST["mensaje"]) 
	&& isset($_POST["titulo"]) 
	&& isset ($_POST["destinatario"])){
    $titulo = $_POST["titulo"];
	$mensaje = $_POST["mensaje"];
	$destinatario = $_POST["destinatario"];
    $idaut = $_SESSION["idusu"];
	enviarMensajePersonal($idaut,$titulo,$mensaje,$destinatario);

	//header('Refresh: 5; URL=index.php?page=main');
	exit(0);
    
}
}



	
	
?>
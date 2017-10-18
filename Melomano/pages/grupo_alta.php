<?php require_once('Connections/bdcon.php'); ?>

<?php
$nombre="";
$descripcion="";
$tipomusica="";
$edadmin="";
$edadmax="";
if(isset($_GET["eliminar"])){
	$resultado = deleteGroup($_GET["eliminar"]);	
	echo "Grupo eliminado. :( ";
	header('Refresh: 5; URL=index.php?page=admin');
	exit(0);
}
if(isset($_POST["nombre"]) 
	&& isset($_POST["descripcion"])
	&& isset($_POST["tipomusica"])
	&& isset($_POST["edadmin"])
	&& isset($_POST["edadmax"])   ){
		$nombre = $_POST["nombre"];
		$descripcion = $_POST["descripcion"];
		$edadmin = $_POST["edadmin"];
		$edadmax = $_POST["edadmax"];
		$tipomusica = $_POST["tipomusica"];
		if($edadmin < $edadmax){
			$resultado = createGroup($nombre,$descripcion,$tipomusica,$edadmin,$edadmax);
			if($resultado == 0){
				echo "<h1>Nuevo grupo creado: ".$nombre."!</h1>";
				header('Refresh: 5; URL=index.php?page=admin');
				exit(0);
			}
		}else{
			echo "La edad mínima tiene que ser menor que la máxima.<br/>";
		}
	}	
echo "Algo ha ido mal... revisa el formulario.";
			header('Refresh: 5; URL=index.php?page=admin');
			exit(0);
			


?>
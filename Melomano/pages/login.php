<?php require_once('Connections/bdcon.php'); ?>

<?php
$email="";
$passw="";
$nombre="";
$edad="";
$idusu = "";
$tipomusica = "";
if(isset($_POST["email"]) 
	&& isset($_POST["password"])   ){
		$passw = $_POST["password"];
		$email = $_POST["email"];
		if(verifyUser($email,$passw)==1){
			$resultado = getUser($email);
			$fila = mysqli_fetch_array($resultado);
			$edad = $fila["edad"];
			$nombre = $fila["nombre"];
			$idusu = $fila["idnum"];
			$tipomusica = $fila["tipomusica"];
			$_SESSION["logueado"] = true;
			$_SESSION["nombre"] = $nombre;
			$_SESSION["email"] = $email;
			$_SESSION["edad"] = $edad;
			$_SESSION["idusu"] = $idusu;
			$_SESSION["tipomusica"] = $tipomusica;
			header("Refresh:0;URL=index.php?page=main");
			exit(0);		
		}else{
			echo "Error con el usuario y/o contraseña.";
			header("Refresh:5;URL=index.php?page=main");
			exit(0);
		}
	}
	
?>
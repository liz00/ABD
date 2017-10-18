<?php require_once('Connections/bdcon.php'); ?>

<?php
$email="";
$passw="";
$nombre="";
$edad="";
$tipomusica="";
if(isset($_POST["email"]) 
	&& isset($_POST["password"])
	&& isset($_POST["nombre"])
		&& isset($_POST["tipomusica"]) 
	&& isset($_POST["edad"])   ){
		$nombre = $_POST["nombre"];
		$passw = $_POST["password"];
		//$hash= password_hash($passw, PASSWORD_BCRYPT);
		$email = $_POST["email"];
		$edad = $_POST["edad"];
		$tipomusica = $_POST["tipomusica"];
		$error=altaUser($email,$passw,$nombre,$tipomusica,$edad);
		if($error==0){ //==0 => todo ha ido bien
			echo "<h1>Bienvenido ".$nombre."!</h1><p>Ya eres un miembros de mel&oacute;manos</p><p>Enseguida irás a la página principal.</p>";
			$resultado = getUser($email);
			$fila = mysqli_fetch_array($resultado);
			$idusu = $fila["idnum"];
			$_SESSION["logueado"] = true;
			$_SESSION["nombre"] = $nombre;
			$_SESSION["email"] = $email;
			$_SESSION["edad"] = $edad;
			$_SESSION["idusu"] = $idusu;
			$_SESSION["tipomusica"] = $tipomusica;
			// 
			header('Refresh: 5; URL=index.php?page=main');
			exit(0);
		}else if($error ==1){
			echo "El usuario ya existe, intenta recordar tu contraseña o elige otro email.<br/>";	
		}else{
			echo "No se ha podido registrar el usuario.<br/>";	
		}
	}	
echo "Algo ha ido mal...";
			header('Refresh: 5; URL=index.php?page=alta');
			exit(0);
			


?>
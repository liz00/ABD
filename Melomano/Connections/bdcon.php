<?php
// ###############################
// ##   FUNCIONES DE CONEXION   ##
// ###############################
const TABLE_USUARIOS = "tbusuario";
const TABLE_MENSAJES = "tbmensajes";
const TABLE_GRUPOS = "tbgrupos";

function connectDB(){
	$hostname_Miconex = "localhost";
	$username_Miconex = "melomanos";
	$password_Miconex = "melomanos";
	$database_Miconex = "bdmelomanos";
	// Create connection
	$conn = new mysqli($hostname_Miconex, $username_Miconex, $password_Miconex,$database_Miconex);
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	return $conn;
}

function disconnectDB($conn){
	mysqli_close($conn);
}

function doQuery($query){
    $conn = connectDB();
   // echo "Query: " . $query . "</br>";
	if (!$resultado = $conn->query($query)) {
		echo "Error: La ejecución de la consulta falló debido a: </br>";
	    echo "Query: " . $query . "</br>";
    	echo "Errno: " . $conn->errno . "</br>";
    	echo "Error: " . $conn->error . "</br>";
		$resultado = false;	
	}
	
	disconnectDB($conn);	
	
	return $resultado;

}

// ###############################
// ##   FUNCIONES DE USUARIO    ##
// ###############################


function altaUser($email,$pass,$nombre,$tipomusica,$edad){
	if(existsUser($email))
		return 1;
	$query = "INSERT INTO ".TABLE_USUARIOS." (nombre,email,password,tipomusica,edad) ";
	$query.="VALUES ('".$nombre."', '".$email."', '".$pass."', '".$tipomusica."', '".$edad."');";	
	doQuery($query);
	if(verifyUser($email,$pass)==1)
		return 0;
	else	
		return 2;
}

function existsUser($email){
	$query = "SELECT * FROM ".TABLE_USUARIOS." WHERE email='".$email."';";
	$count = doQuery($query);
	if($count->num_rows>0){
		return true;
	}else{
		return false;	
	}
}

function verifyUser($email,$pass){
	$query = "SELECT * FROM ".TABLE_USUARIOS." WHERE email='".$email."' AND password='".$pass."';";
	$count = doQuery($query);
	return $count->num_rows;
}

function getUser($email){
	$query = "SELECT * FROM ".TABLE_USUARIOS." WHERE email='".$email."';";
	return doQuery($query);
}


function getUserName($idaut){
	$query= "SELECT nombre FROM ".TABLE_USUARIOS." WHERE idnum=".$idaut.";";
	return doQuery($query);
}
function getListUsers($idusu){
	//todos los usuarios menos yo
	$query="SELECT idnum,nombre FROM ".TABLE_USUARIOS." WHERE idnum<>".$idusu.";";	
	return doQuery($query);
}


// ###############################
// ##   FUNCIONES DE MENSAJES   ##
// ###############################
function enviarMensajeGlobal($idaut,$titulo,$mensaje){
	return enviarMensaje($idaut,$titulo,$mensaje,0,"NULL","NULL");	
}
function enviarMensajePersonal($idaut,$titulo,$mensaje,$iddestinario){
	return enviarMensaje($idaut,$titulo,$mensaje,1,"'".$iddestinario."'","NULL");	
}
function enviarMensajeGrupo($idaut,$titulo,$mensaje,$idgrupo){
	return enviarMensaje($idaut,$titulo,$mensaje,2,"NULL","'".$idgrupo."'");	
}
function enviarMensaje($idaut,$titulo,$mensaje,$tipodestino,$iddestinatario,$idgrupo){
	$fecha = date('h:i m/d/Y', time());
	$query = "INSERT INTO ".TABLE_MENSAJES." ( titulo, contenido, fecha, idautor, tipodestino, iddestinatario, idgrupo)";
	$query .= " VALUES ('".$titulo."','".$mensaje."','".$fecha."','".$idaut."','".$tipodestino."',".$iddestinatario.",".$idgrupo.")";
	return doQuery($query);	
}

function getMensajesGlobales(){
  $query = "SELECT * FROM ".TABLE_MENSAJES." WHERE tipodestino=0;";
  return doQuery($query);
}

function getMensajesPersonales($idusu){
  $query = "SELECT * FROM ".TABLE_MENSAJES." WHERE tipodestino=1 AND iddestinatario=".$idusu.";";
  return doQuery($query);
}

function getMensajesGrupales($idgrupo){
  $query = "SELECT * FROM ".TABLE_MENSAJES." WHERE tipodestino=2 AND idgrupo=".$idgrupo.";";
  return doQuery($query);
}

// ###############################
// ##    FUNCIONES DE GRUPOS    ##
// ###############################


function createGroup($nombre,$descripcion,$tipomusica,$edadmin,$edadmax){
	$query = "INSERT INTO ".TABLE_GRUPOS." (nombre, descripcion, tipomusica, edadmin, edadmax) ";
	$query .= "VALUES ('".$nombre."', '".$descripcion."', '".$tipomusica."', '".$edadmin."', '".$edadmax."');";	
	doQuery($query);
}

function getListGroup(){
	$query = "SELECT * FROM ".TABLE_GRUPOS.";";
	return doQuery($query);
}

function deleteGroup($idgrupo){
	$query = "DELETE FROM ".TABLE_GRUPOS." WHERE idgrupo=".$idgrupo.";";
	doQuery($query);	
}

function getUserGroup($tipomusica,$edad){
	$query = "SELECT * FROM ".TABLE_GRUPOS." WHERE tipomusica='".$tipomusica."' AND edadmin<=".$edad." AND edadmax>=".$edad.";";
	return doQuery($query);
}
?>
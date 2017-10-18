<?php 
if(isset($_SESSION["logueado"]) && $_SESSION["logueado"]){//ya logueado
	echo  " <br>";
	echo "  Bienvenido ".$_SESSION["nombre"]."!<br/> <br/>";
	if($_SESSION["idusu"] == "1")
		echo "<p><a href='index.php?page=admin'>Panel Administrador</a></p>";
	?>
<p><a href='index.php?page=perfil'>Mi Perfil</a></p>
<p><a href='index.php?page=nuevomensaje'>Nuevo Mensaje</a></p>
<p><a href='index.php?page=mensajes'>Mis Mensajes</a></p>
<p><a href='index.php?page=logout'>Logout</a></p>
<?php
//var_dump($_SESSION);
}else{
//Formulario de Login
?>
<form action="index.php?page=login" method="post" name="form_login" id="form_login">
       <p>Email:<br/>
       <input type="text" name="email" value="" size="10" /></p>
       <p>Password:<br/>
       <input type="password" name="password" value="" size="10" /></p>
       <p><input type="submit" value="Login" /></p>
    </form>
<?php
//darse de alta
echo '<p><a href="index.php?page=alta">Darse de Alta</a></p>';
}
?>
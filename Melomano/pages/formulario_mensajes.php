	<?php 
	if(!isset($_SESSION["logueado"]) || !$_SESSION["logueado"]){
		// redirigir a la pagina principal	
			header('Refresh: 0;URL=index.php?page=error');
			exit(0);
	}
	?>
    <?php require_once('Connections/bdcon.php'); ?>
	<div>
	
	<h1>Nuevo mensaje</h1>
	<div id="mnsjs">
	<ul>
	<li><a href="#Personales" > Personal </a></li>
	<li><a href="#Globales">Global</a></li>
	<li><a href="#Grupos"> Grupo </a></li>
	</ul>
	<div id="Personales">
	   <form action="index.php?page=enviar" method="post" name="form_enviar" id="form_enviar">
		  <table align="center">
			<tr valign="baseline">
			  <td align="right">Destinatario:</td>
			  <td><select name="destinatario">
              <?php
			  	$lista=getListUsers($_SESSION["idusu"]);
				while ($usu = mysqli_fetch_array($lista)){
					echo "<option value=".$usu["idnum"].">".$usu["nombre"]."</option>";	
				}
			  ?>
              </select></td>
			</tr>
			<tr valign="baseline">
			  <td  align="right">Titulo:</td>
			  <td><input type="text" name="titulo" value="" size="32" /></td>
			</tr>
			<tr valign="baseline">
			  <td align="right">Mensaje:</td>
			  <td><textarea name="mensaje"></textarea></td>
			</tr>
			<tr valign="baseline">
			  <td  align="right">&nbsp;</td>
			  <td><input type="submit" value="Enviar" /></td>
			</tr>
		  </table>
		</form>
	</div>
	
	<div id="Globales">
		<form action="index.php?page=enviar&tipo=global" method="post" name="form_enviar" id="form_enviar">
		  <table align="center">
			<tr valign="baseline">
			  <td  align="right">Titulo:</td>
			  <td><input type="text" name="titulo" value="" size="32" /></td>
			</tr>
			<tr valign="baseline">
			  <td align="right">Mensaje:</td>
			  <td><textarea name="mensaje"></textarea></td>
			</tr>
			<tr valign="baseline">
			  <td  align="right">&nbsp;</td>
			  <td><input type="submit" value="Enviar" /></td>
			</tr>
		  </table>
		</form>
	</div>
	<div id="Grupos">
    <?php $lista=getUserGroup($_SESSION["tipomusica"],$_SESSION["edad"]);
	if($lista->num_rows == 0){
		echo "No perteneces a ningun grupo.";	
	}else{ ?>
		<form action="index.php?page=enviar&tipo=grupo" method="post" name="form_enviar" id="form_enviar">
		  <table align="center">
			<tr valign="baseline">
			  <td align="right">Destinatario:</td>
			  <td><select name="destinatario">
              <?php
			  	
				while ($grupo = mysqli_fetch_array($lista)){
					echo "<option value=".$grupo["idgrupo"].">".$grupo["nombre"]."</option>";	
				}
			  ?>
              </select></td>
			</tr>
			<tr valign="baseline">
			  <td  align="right">Titulo:</td>
			  <td><input type="text" name="titulo" value="" size="32" /></td>
			</tr>
			<tr valign="baseline">
			  <td align="right">Mensaje:</td>
			  <td><textarea name="mensaje"></textarea></td>
			</tr>
			<tr valign="baseline">
			  <td  align="right">&nbsp;</td>
			  <td><input type="submit" value="Enviar" /></td>
			</tr>
		  </table>
		</form>
        <?php } ?>
	</div>
	</div>
	
	</div>
	<script>
	$("#mnsjs").tabs();
	</script>
	
		<p>&nbsp;</p>
	
	</div>
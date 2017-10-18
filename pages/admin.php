<?php require_once('Connections/bdcon.php'); ?>
<?php
if(!(isset($_SESSION["logueado"]) && $_SESSION["logueado"] 
		&& $_SESSION["idusu"] == "1")){// solo el admin puede crear grupos
	// redirigir a la pagina principal	
		header('Refresh: 0;URL=index.php?page=main');
		exit(0);
}
?>
<div>

<h1>Panel de Administración </h1>
<div id="adminpanel">
<ul>
<li><a href="#ListaGrupos"> Lista de grupos </a></li>
<li><a href="#AltaGrupos" > Crear grupo </a></li>
</ul>
<div id="AltaGrupos">
    <form action="index.php?page=nuevogrupo" method="post" name="form_alta" id="form_alta">
      <table align="center">
        <tr valign="baseline">
          <td align="right">Nombre:</td>
          <td><input type="text" name="nombre" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td  align="right">Descripci&oacute;n:</td>
          <td><input type="text" name="descripcion" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Tipo de Música:</td>
          <td><select name="tipomusica">
          <?php
		  	$listaMusica = listaTiposDeMusica();
		  	foreach($listaMusica as $musica){
				echo "<option value='".$musica."'>".$musica."</option>";	
			}
		  ?>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Edad m&iacute;nima:</td>
          <td><input type="number" name="edadmin" value="" size="32" /></td>
        </tr> 
        <tr valign="baseline">
          <td align="right">Edad m&aacute;xima:</td>
          <td><input type="number" name="edadmax" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td  align="right">&nbsp;</td>
          <td><input type="submit" value="Crear grupo" /></td>
        </tr>
      </table>
    </form>
   </div>
   <div id="ListaGrupos">
   <?php $listag = getListGroup(); ?>
   <table class="tablagrupos">
   <tr><th>Id Grupo</th><th>Nombre</th><th>Descripcion</th><th>Tipo Musica</th><th> RangoEdad</th><th>Eliminar</th></tr>
   <?php
   	while($fila = mysqli_fetch_array($listag)){
		echo "<tr valign='baseline'>";
		echo "<td  align='right'>".$fila["idgrupo"]."</td>";
		echo "<td  align='right'>".$fila["nombre"]."</td>";
		echo "<td  align='right'>".$fila["descripcion"]."</td>";
		echo "<td  align='right'>".$fila["tipomusica"]."</td>";
		echo "<td  align='right'>".$fila["edadmin"]." - ".$fila["edadmax"]."</td>";
		echo "<td  align='right'><a href=index.php?page=nuevogrupo&eliminar=".$fila["idgrupo"].">Eliminar</a></td>";
	}
   ?>
   </table>
   </div>
   </div>
   
   <script>
$("#adminpanel").tabs();
</script>
</div>
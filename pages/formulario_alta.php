<?php
if(isset($_SESSION["logueado"]) && $_SESSION["logueado"]){
	// redirigir a la pagina principal	
		header('Refresh: 0;URL=index.php?page=main');
		exit(0);
}
?>

    <h1>Darse de alta (sistema)</h1>
    <p>&nbsp;</p>
    <form action="index.php?page=registrar" method="post" name="form_alta" id="form_alta">
      <table align="center">
        <tr valign="baseline">
          <td align="right">Nombre:</td>
          <td><input type="text" name="nombre" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Email:</td>
          <td><input type="text" name="email" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td  align="right">Password:</td>
          <td><input type="password" name="password" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right">Tú Música Preferida:</td>
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
          <td align="right">Edad:</td>
          <td><select name="edad">
          <?php
		  	$MAXEDAD = 99; $MINEDAD=14;
		  	for($i=$MINEDAD;$i<=$MAXEDAD;$i++){
				echo "<option value='".$i."'>".$i."</option>";	
			}
		  ?>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td  align="right">&nbsp;</td>
          <td><input type="submit" value="Darse de alta" /></td>
        </tr>
      </table>
    </form>
    <p>&nbsp;</p>
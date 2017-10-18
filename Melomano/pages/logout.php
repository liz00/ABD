<?php
session_unset();
$_SESSION["logueado"] = false;	
header('Refresh: 0;URL=index.php?page=main');
exit(0);
?>
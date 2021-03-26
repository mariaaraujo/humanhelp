<?php
session_start();
if(isset($_SESSION['codigo_voluntario']))
{
    session_destroy();
    header("location: voluntario.php");
}
else
{
    session_destroy();
    header("location: voluntario.php");
}

?>
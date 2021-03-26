<?php
session_start();
if(isset($_SESSION['codigo_instituicao']))
{
    session_destroy();
    header("location: ong.php");
}
else
{
    session_destroy();
    header("location: ong.php");
}

?>
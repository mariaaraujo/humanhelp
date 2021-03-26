<?php
if (!(isset($_SESSION['codigo_voluntario']) == true)) {
    unset($_SESSION['codigo_voluntario']);
    header('location: loginvoluntario.php');
}
?>
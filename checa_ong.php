<?php
if (!(isset($_SESSION['codigo_instituicao']) == true)) {
    session_destroy();
    header("location: loginong.php");
}
?>
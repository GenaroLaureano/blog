<?php
    session_start();
    if(!(isset($_SESSION) && $_SESSION['logueado'] == TRUE)){
        header("Location: ../login/index.php");
    }
    require_once '../includes/header.php';
    require_once 'menu.php';
    require_once 'modelo.php';
    $tabla = getAllHtml();
    require_once 'formacontenido.php';
    require_once '../includes/footer.php';
?>
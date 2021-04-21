<?php

    session_start();
    include_once 'includes/header.php';

    if(isset($_SESSION['logueado'])){ 
        if(!(isset($_SESSION) && $_SESSION['logueado'] == TRUE)){
            include_once 'menumain.php';
        }else{
            include_once 'menumainLog.php';
        }
    }else{
        include_once 'menumain.php';
    }
    
    include_once 'modelo.php';
    $datos = getAllHtml();
    include_once 'contenido.php';
    #require_once 'formafooter.php';
    include_once 'includes/footer.php';
?>
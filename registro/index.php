<?php
    ob_start();
    session_start();#inicia persistencia de datos
    if(isset($_SESSION) && (isset($_SESSION['logueado'])) == TRUE){
        header("Location: ../".$_SESSION['rol']."-main/index.php");
        #Todo esto para que ya no pida credenciales
    }

    require_once '../includes/header.php';
    require_once 'menu.php';

    if(isset($_POST['btnRegistro'])){
        #El usuario envio el formulario
        $usuario_nick = trim($_POST['usuario_nick']);
        $usuario_nombre = strtoupper($_POST['usuario_nombre']);
        $usuario_apellidos = strtoupper($_POST['usuario_apellidos']);
        $usuario_email = $_POST['usuario_email'];
        $usuario_password = $_POST['usuario_password'];
        $repassword = $_POST['repassword'];

    // verificar contraseñas
        if($usuario_password == $repassword){
            require_once '../bd/conexion.php';
            
            $sqlInsert = "INSERT INTO usuarios (usuario_id,usuario_nick,usuario_nombre,usuario_apellidos,usuario_password,usuario_email,usuario_role,usuario_status)
            VALUES (null,'$usuario_nick','$usuario_nombre','$usuario_apellidos','$usuario_password','$usuario_email','user','inhabil')";
            if($conn->query($sqlInsert)===TRUE){
                header("Location: ../login/index.php");
            }else{
                $errmensaje = "ERROR EN EL REGISTRO";
            }
        }else{
            $errmensaje = "LAS CONTRASEÑAS NO COINCIDEN";
        }
    }

    require_once 'formalogin.php';
    require_once '../includes/footer.php';
?>
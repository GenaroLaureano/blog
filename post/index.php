<?php
    ob_start();
    session_start();
    require_once '../includes/header.php';
    if(isset($_SESSION['logueado'])){ 
        if(!(isset($_SESSION) && $_SESSION['logueado'] == TRUE)){
            require_once 'menumain.php';
        }else{
            require_once 'menumainLog.php';
        }
    }else{
        require_once 'menumain.php';
    }

    if(isset($_POST["create_post"])){
        require_once '../bd/conexion.php';
        $post_id = $_POST["post_id"];
        $comentario_contenido = $_POST["comentario_contenido"];
        $usuario_id = $_SESSION['usuario_id'];
        $autor = $_SESSION['usuario_nick'];
        date_default_timezone_set('America/Mexico_City');
        $hora       = date('Y-m-d H:i:s',time());
    
        $sqlInsert = "INSERT  INTO comentarios (comentario_id,comentario_post_id,comentario_autor,comentario_email,comentario_contenido,comentario_status,comentario_fecha)
        VALUES (null,$post_id,'$autor','sin correo','$comentario_contenido','desaprovado','$hora')";
        
        if($conn->query($sqlInsert)===TRUE){
            header("Location: index.php?post_id=$post_id");
        }else{
            $errmensaje = "ERROR EN EL REGISTRO";
        }

    }else{
        require_once 'modelo.php';
        $datos = getAllHtml();
        require_once 'formacontenido.php';
    }
    require_once '../includes/footer.php';
?>
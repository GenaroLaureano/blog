<?php
ob_start();
session_start();
if(isset($_SESSION) && (isset($_SESSION['logueado'])) == TRUE){
        header("Location: ../user-main/index.php");
}
    require_once '../includes/header.php';
    require_once 'menu.php';
    if(isset($_POST['btnLogin'])){
        require_once '../bd/conexion.php';
        $usuario_nick = $_POST['usuario_nick'];
        $usuario_password = $_POST['usuario_password'];
        $sqlSelect = "SELECT usuario_id,usuario_nombre,usuario_nick,usuario_apellidos, usuario_password,usuario_role,usuario_status
        FROM usuarios WHERE usuario_nick = '$usuario_nick' and usuario_password = '$usuario_password' ";
        $resultSet = $conn->query($sqlSelect); 
        if ($resultSet->num_rows > 0){
            $row = $resultSet -> fetch_assoc();
            if($row['usuario_status']=='habil'){ 
                $_SESSION['usuario_id'] = $row['usuario_id'];
                $_SESSION['usuario_nick'] = $row['usuario_nick'];
                $_SESSION['userName'] = $row['usuario_apellidos'].' '.$row['usuario_nombre'];
                $_SESSION['logueado'] = TRUE;
                $_SESSION['rol'] = $row['usuario_role'];
                if($_SESSION['rol'] == 'admin'){
                header("Location:../admin-main/index.php");
                }else{
                   header("Location:../user-main/index.php");
                }
            }else{
                $errmensaje = "Solicite la verificación de su cuenta";
            }
        }else{
            $errmensaje = "CREDENCIALES NO VALIDAS";
        }
    }
require_once 'formalogin.php';
require_once '../includes/footer.php';
?>
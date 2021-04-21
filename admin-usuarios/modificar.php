<?php
ob_start();
    require_once '../includes/header.php';
    require_once '../bd/conexion.php';
    $usuario_id = $_GET['usuario_id'];
    $sqlSelect =  "SELECT usuario_status FROM usuarios WHERE usuario_id=$usuario_id;";
    $resultSet = $conn->query($sqlSelect);
    $row = $resultSet->fetch_assoc();
    $status = $row['usuario_status'];
    if($status == 'habil'){
        $status = 'inhabil';
    }else{
        $status = 'habil';
    }
    $sqlUpdate = "
        UPDATE usuarios SET usuario_status='$status'
        WHERE
        usuario_id = $usuario_id;";
        $conn->query($sqlUpdate);
    header("Location: index.php");
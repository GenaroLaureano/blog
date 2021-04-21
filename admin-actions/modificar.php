<?php
    ob_start();
    require_once '../includes/header.php';
    require_once '../bd/conexion.php';
    $post_id = $_GET['post_id'];
    $sqlSelect =  "SELECT post_publish FROM posts WHERE post_id=$post_id;";
    $resultSet = $conn->query($sqlSelect);
    $row = $resultSet->fetch_assoc();
    $status = $row['post_publish'];
    if($status == 'solicitado'){
        $status = 'aprobado';
    }else{
        $status = 'solicitado';
    }
    $sqlUpdate = "
        UPDATE posts SET post_publish='$status'
        WHERE
        post_id = $post_id;";
        $conn->query($sqlUpdate);
    header("Location: index.php");
<?php
    require_once '../includes/header.php';
    require_once '../bd/conexion.php';
    $post_id = $_GET['post_id'];
    $sqlUpdate = "
        UPDATE posts SET post_status='baja'
        WHERE
        post_id = $post_id;";
        $conn->query($sqlUpdate);
    header("Location: index.php");
<?php
    #PAGINA PRINCIPAL
    function getAllHtml()
    {
        require_once 'bd/conexion.php';
        $sqlSelect = 'SELECT posts.post_titulo ,categoria.categoria_nombre ,posts.post_autor , posts.post_fecha , posts.post_imagen , posts.post_contenido,posts.post_id FROM posts INNER JOIN categoria ON posts.post_categoria_id = categoria_id WHERE (post_status="abierto" OR post_status="cerrado") AND post_publish="aprobado"';
        
        $resultSet = $conn->query($sqlSelect);
        $tabla = "";
        $tabla2 = "";
        $bandera = false;

        if (mysqli_multi_query($conn, $sqlSelect) ) {
            do {
                if ($resultSet = mysqli_store_result($conn)) {
                    while ($row = mysqli_fetch_row($resultSet)) {
                        if($bandera==false){ 
                                $titulo =$row[0];
                                $categoria = $row[1];
                                $autor = $row[2];
                                $fecha = $row[3];
                                $imagen = $row[4];
                                $contenido = $row[5];
                                $post_id = $row[6];

                                #Inicia seccion de articulo
                                $tabla .= "<article class='entrada'>"; 
                                $tabla .= "<div class='entrada__imagen'>";
                                if($imagen != ''){
                                    $tabla .= "<img src=img/$imagen alt='ImagenPost'>";
                                }
                                $tabla .= "</div>";
                                $tabla .= "<div class='entrada__contenido'>";
                                $tabla .= "<i class='glyphicon glyphicon-time'></i> $fecha";
                                $tabla .= "<h3 class='no-margin entrada__titulo'>$titulo<span class='entrada__autor'> by $autor</span> </h3>";
                                $tabla .= "<h4 class='no-margin'>$categoria</h4>";
                                $tabla .= "<p>$contenido</p>";
                                $tabla .= "</div>";
                                $tabla .= "<a href='post/index.php?post_id=".$post_id."' class='boton bg-info'>Leer Entrada</a>"; 
                                $tabla .= "</article>";
                                
                        }else{
                            #$categoria_nombre =$row[0];// $row['categoria_nombre'];
                            #$tabla2 .= "<li><a href='#'>$categoria_nombre</a></li>";
                        }
                    }
                    mysqli_free_result($resultSet);
                }   
                if (mysqli_more_results($conn)) {
                    $bandera = true;
                }
            } while (mysqli_more_results($conn) && mysqli_next_result($conn));
        }
            if($tabla == ''){ 
                $tabla .="<div class='alert alert-secondary'>";
                $tabla .="NO SE HA PUBLICADO NINGUN POST. SE EL PRIMERO EN ";
                $tabla .="<a href='login/index.php'>PUBLICAR</a>";    
                $tabla .= "</div>";
            }else{
                $tabla2 .="<h1 class='text-center bienvenida'>Explore nuestras preguntas</h1>"; 
            }
        return $datos = array("tabla" => $tabla, "tabla2" => $tabla2); #arrow function js
    }
?>

<?php
    #MODELO DE LA PAGINA PARA VER UN POST EN ESPECIFICO Y SUS COMENTARIOS
    function getAllHtml()
    {
        require_once '../bd/conexion.php';
        $post_id = $_GET["post_id"];

        $sqlSelect = 'SELECT posts.post_titulo ,categoria.categoria_nombre ,posts.post_autor , posts.post_fecha , posts.post_imagen , posts.post_contenido,posts.post_id,posts.post_status FROM posts INNER JOIN categoria ON posts.post_categoria_id = categoria_id WHERE post_id=' . $post_id . ';';
        $sqlSelect .= 'SELECT comentario_autor,comentario_contenido,comentario_fecha FROM comentarios WHERE comentario_post_id=' . $post_id . ';';
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
                                $post_status = $row[7];
                                #CUANDO CUALQUIER PERSONA QUIERE VER UN POST QUE YA HAYA SIDO APROBADO
                               
                                if($imagen != ''){
                                    $tabla .= "<article class='post'>"; 
                                    $tabla .= "<div class='post__imagen'>";
                                    $tabla .= "<img src=../img/$imagen alt='ImagenPost'>";
                                    $tabla .= "</div>";
                                }else{
                                    $tabla .= "<article>"; 
                                }
                                $tabla .= "<div class='post__datos'>";
                                $tabla .= "<i class='glyphicon glyphicon-time'></i> $fecha";
                                $tabla .= "<h3 class='no-margin entrada__titulo'>$titulo<span class='entrada__autor'> by $autor</span> </h3>";
                                $tabla .= "<h4 class='no-margin'>$categoria</h4>";
                                $tabla .= "<p class='post__contenido'>$contenido</p>";
                                $tabla .= "</div>";
                                $tabla .= "</article>";

                                if(isset($_SESSION['logueado'])){ 
                                    if($post_status =='abierto'){
                                        #CUANDO EL USUARIO SE A LOGUEADO
                                        #Y EL POST ESTA ABIERTO 
                                        $tabla .= "<div class='well'>";
                                        $tabla .= "<h4>Deja un comentario:</h4>";
                                        $tabla .= "<form role='form' method='POST' action='index.php'>";
                                        $tabla .= "<div class='form-group'>";
                                        $tabla .= "<textarea class='form-control'  name='comentario_contenido' rows='3'></textarea>";
                                        $tabla .= "</div>";
                                        $tabla .= "<input type='hidden' name='post_id' value=$post_id />";
                                        $tabla .= "<input class='btn btn-info' name='create_post' value='Enviar' type='submit'>";
                                        $tabla .= "</form>";
                                        $tabla .= "</div>";
                                        
                                        }
                                }else{
                                        
                                        $tabla .= "<div class='well'>";
                                        $tabla .= "<h3>Deja un comentario:</h3>";
                                        $tabla .="<a href='../login/index.php'>Inicia sesión para comentar</a>";
                                        $tabla .= "</div>";
                                }
                        }else{
                            #MOSTRAR LOS COMENTARIOS (EN CASO DE QUE HAYA UNO)
                            $comentario_autor =$row[0];
                            $comentario_contenido =$row[1];
                            $comentario_fecha =$row[2];
                            $tabla2 .= "<div class = 'container'>"; 
                            $tabla2 .= "<div class = 'well'>";
                            $tabla2 .= "<a class='pull-left' href='#'>";
                            $tabla2 .= "<img class='media-object comentario__foto' src='../img/usuario.png' alt=''>";
                            $tabla2 .= "</a>";
                            $tabla2 .= "<h4 class='media-heading'>$comentario_autor ";
                            $tabla2 .= "<small> $comentario_fecha</small>";
                            $tabla2 .= "</h4>";
                            $tabla2 .= "$comentario_contenido";
                            $tabla2 .= "</div>";
                            $tabla2 .= "</div>";
                            $tabla2 .= "</div>";

                        }
                    }
                    mysqli_free_result($resultSet);
                }
                
                if (mysqli_more_results($conn)) {
                    $bandera = true;
                }
            } while (mysqli_more_results($conn) && mysqli_next_result($conn));
        }
        return $datos = array("tabla" => $tabla, "tabla2" => $tabla2); 
    }
?>
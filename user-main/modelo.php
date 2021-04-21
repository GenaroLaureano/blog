<?php
    function getAllHtml()
    {
        require_once '../bd/conexion.php';

        $sqlSelect = 'SELECT post_id,post_categoria_id,post_titulo,post_autor,post_fecha,post_imagen,post_status,post_publish FROM posts WHERE usuario_id=' . $_SESSION['usuario_id'] . ';';
        $resultSet = $conn->query($sqlSelect);
        
        $tabla = "";
        $tabla .="<table id='miTabla' class ='table table-bordered table-striped'>";
        $tabla .= "<thead>";
        $tabla .= "<tr>";
        
        $tabla .="<th> CATEGORIA</th>";
        $tabla .="<th> TITULO</th>";
        $tabla .="<th> AUTOR</th>";
        $tabla .= "<th> FECHA</th>";
        $tabla .= "<th> IMAGEN</th>";
        $tabla .= "<th> STATUS</th>";
        $tabla .= "<th> PUBLICO</th>";
        $tabla .= "<th> ACCIONES</th>";
        $tabla .= "</tr>";
        $tabla .= "</thead>";
        $tabla .= "<tbody>"; 
        
        if($resultSet->num_rows > 0){
            while($row = $resultSet->fetch_assoc()){
                $post_id = $row['post_id'];
                $post_categoria_id = $row['post_categoria_id'];
                $post_titulo = $row['post_titulo'];
                $post_autor = $row['post_autor'];
                $post_fecha = $row['post_fecha'];
                $post_imagen = $row['post_imagen'];
                $post_status = $row['post_status'];
                $post_publish = $row['post_publish'];
                

                $tabla .="<tr>";
                
                $tabla .="<td> $post_categoria_id </td>";
                $tabla .=
                "<td>
                    <a href='../post/index.php?post_id=$post_id'>
                        $post_titulo
                    </a>
                </td>";
                // $tabla .="<td> $post_titulo </td>";
                $tabla .="<td> $post_autor </td>";
                $tabla .="<td> $post_fecha </td>";
                $tabla .="<td> $post_imagen </td>";
                $tabla .="<td> $post_status </td>";
                $tabla .="<td> $post_publish </td>";
                $tabla .=
                "<td>
                    <a href='abierto.php?post_id=".$post_id."'>
                    Abierto
                    </a>
                    <a href='cerrado.php?post_id=".$post_id."'>
                    Cerrado
                    </a>
                    <a href='baja.php?post_id=".$post_id."'>
                    Baja
                    </a>

                </td>";
                
                $tabla .="</tr>";
            }
        } else{
                $tabla .= "<tr>";
                $tabla .= "<td colspan='4'>NO HAY POST PARA MOSTRAR </td>";
                $tabla .= "</tr>";
            }
        
        $tabla .="</tbody>";
        $tabla .="</table>";

        return $tabla;
        
    }

?>

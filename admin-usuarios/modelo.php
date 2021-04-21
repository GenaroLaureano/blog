<?php
    function getAllHtml()
    {
        require_once '../bd/conexion.php';

        $sqlSelect = 'SELECT usuario_id,usuario_nick,usuario_nombre,usuario_apellidos,usuario_email,usuario_role,usuario_status FROM usuarios;';
        $resultSet = $conn->query($sqlSelect);
        
        $tabla = "";
        $tabla .="<table id='miTabla' class ='table table-bordered table-striped'>";
        $tabla .= "<thead>";
        $tabla .= "<tr>";
        $tabla .="<th> ID</th>";
        $tabla .="<th> NICKNAME</th>";
        $tabla .="<th> NOMBRE</th>";
        $tabla .="<th> APELLIDOS</th>";
        $tabla .= "<th> EMAIL</th>";
        $tabla .= "<th> ROL</th>";
        $tabla .= "<th> STATUS</th>";
        $tabla .= "<th> ACCIONES</th>";
        $tabla .= "</tr>";
        $tabla .= "</thead>";
        $tabla .= "<tbody>"; 
        
        if($resultSet->num_rows > 0){
            while($row = $resultSet->fetch_assoc()){
                $usuario_id = $row['usuario_id'];
                $usuario_nick = $row['usuario_nick'];
                $usuario_nombre = strtoupper($row['usuario_nombre']);
                $usuario_apellidos = strtoupper($row['usuario_apellidos']);
                
                $usuario_email = $row['usuario_email'];
                $usuario_role = $row['usuario_role'];
                $usuario_status = $row['usuario_status'];
                

                $tabla .="<tr>";
                $tabla .="<td> $usuario_id </td>";
                $tabla .="<td> $usuario_nick </td>";
                $tabla .="<td> $usuario_nombre </td>";
                $tabla .="<td> $usuario_apellidos </td>";
                $tabla .="<td> $usuario_email </td>";
                $tabla .="<td> $usuario_role </td>";
                $tabla .="<td> $usuario_status </td>";
                $tabla .=
                "<td>
                    <a href='modificar.php?usuario_id=$usuario_id'>
                    Cambiar Status
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

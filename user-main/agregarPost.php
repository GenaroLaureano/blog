<?php
  session_start();
  if(!(isset($_SESSION) && $_SESSION['logueado'] == TRUE)){
    header("Location: ../login/index.php");
  }
  require_once '../includes/header.php';
  require_once 'menu.php';
  require_once '../bd/conexion.php';
  if(isset($_POST['create_post'])){
    $post_categoria_id = $_POST['post_categoria_id'];
    $post_titulo      = $_POST['post_titulo'];
    $post_autor     = $_POST['post_autor'];
    date_default_timezone_set('America/Mexico_City');
    $post_fecha       = date('Y-m-d H:i:s',time());
    $post_imagen       = $_FILES['post_imagen']['name'];
    $post_image_temp  = $_FILES['post_imagen']['tmp_name'];
    $usuario_id = $_SESSION['usuario_id'];
    move_uploaded_file ($post_image_temp, "../img/{$post_imagen}");
    if (empty ($post_imagen)) {
        $post_imagen = '';
    }
    $post_contenido    = $_POST['post_contenido'];
    if($post_titulo == ''){
      $errmensaje = "EL TÍTULO NO PUEDE ESTAR VACIO";
    }else if($post_contenido ==''){
      $errmensaje = "EL CONTENIDO NO PUEDE ESTAR VACIO";
    }else{ 
      $sqlInsert = "INSERT INTO posts (post_id,usuario_id, post_categoria_id, post_titulo, post_autor, post_fecha, post_imagen, post_contenido, post_contador_comentarios,post_status,post_publish)
      VALUES (null,'$usuario_id','$post_categoria_id','$post_titulo','$post_autor','$post_fecha','$post_imagen','$post_contenido',0,'abierto','aprobado')";
      if($conn->query($sqlInsert)===TRUE){
        echo "<div class='alert alert-success'>
                Post creado exitosamente.
                <a href='index.php' class='alert-link'>
                  Ver Posts
                </a>
              </div>";
      }else{
        $errmensaje = "ERROR AL CREAR EL POST";
      }
    }
  }
  ?>
<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-inline form-group">
            <label for="categoria_id">Categoría</label>
            <div>
                <select class="form-control" name="post_categoria_id" id="post_category">
                    <?php
                $sqlSelect = "SELECT categoria_id, categoria_nombre FROM categoria ";
                $resultSet  = $conn->query($sqlSelect);
                if($resultSet->num_rows > 0){
                  while($row = $resultSet->fetch_assoc()){
                  $categoria_id = $row['categoria_id'];
                  $categoria_nombre        = $row['categoria_nombre'];
                  echo "<option value='{$categoria_id}'>{$categoria_nombre}</option>";
                  }
                }
              ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="title">Título</label>
            <input class="form-control" name="post_titulo" type="text">
        </div>

        <div class="form-group">
            <label for="post_author">Autor</label>
            <input class="form-control" name="post_autor" type="text" value="<?php echo $_SESSION['usuario_nick']; ?>"
                readonly>
        </div>

        <div class="form-group">
            <label for="post_image">Imagen</label>
            <input class="form-control" name="post_imagen" type="file">
        </div>

        <div class="form-group">
            <label for="post_content">Contenido</label>
            <textarea class="form-control" name="post_contenido" id="editor" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <input class="btn btn-info" name="create_post" value="Publicar" type="submit">
        </div>
    </form>
</div>

<div>
    <?php
        if(isset($errmensaje)){
          echo"<div class='alert alert-danger'>$errmensaje</div>";
        }
      ?>
</div>
<?php
    require_once '../includes/footer.php';
?>
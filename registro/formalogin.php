<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header formulario__color text-white text-center">
                <h2>Registro</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="index.php">
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control" 
                            placeholder="Introduzca un nombre de usuario, ejemplos: snkpwr99, SnkPwr99, SNKPWR99" 
                            title="Minimo 4 caracteres, pueden ser combinados entre letras y numeros, sin espacios"
                            pattern="^[a-zñáéíóú|A-ZÑÁÉÍÓÚ\d]{4,15}$" required
                            id="usuario" name="usuario_nick">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" placeholder="Introduzca su correo"
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
                            title="ajustese al formato: caracteres@caracteres.dominio (minusculas)" required
                            id="email" name="usuario_email">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" placeholder="Introduzca su contraseña (Debe ser mayor a 8, contener minimo 1 maysucula, 1 minuscula y 1 numero)" 
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Minimo 8 de longitud, al menos un numero, una letra mayuscula y una minuscula"
                            id="password" name="usuario_password" required>
                        </div>
                        <div class="form-group">
                            <label for="repassword">Confirmar contraseña</label>
                            <input type="password" class="form-control" placeholder="Confirme su contraseña"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Minimo 8 de longitud, al menos un numero, una letra mayuscula y una minuscula"
                            id="repassword" name="repassword" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="nombre" class="form-control" placeholder="Introduzca su nombre (MAYUSCULAS)"
                            pattern="^[A-ZÑÁÉÍÓÚ ]{2,32}$"
                            title="El nombre debe ir en MAYUSCULAS"
                            id="nombre" name="usuario_nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="apellidos" class="form-control" placeholder="Introduzca sus apellidos (MAYUSCULAS)"
                            pattern="^[A-ZÑÁÉÍÓÚ ]{2,64}$"id="apellidos" title="Los apellidos deben ir en MAYUSCULAS" 
                            name="usuario_apellidos" required>
                        </div>
                        <div class="text-right">
                            <input class="btn btn-info" type="submit" value="Registrarse" name="btnRegistro">
                        </div>
                    </form>
                    <?php
                        if(isset($errmensaje)){
                            echo"
                            <div class='alert alert-danger'>
                                $errmensaje
                            </div>
                            ";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
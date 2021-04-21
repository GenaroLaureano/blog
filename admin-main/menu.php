<header class="header">
        <div class="barra">
            <a href="../index.php" class="logo">
            <h1 class="logo__nombre centrar-texto no-margin logo__bold">The Blog</h1>
            </a>
            <nav class="navegacion">
                <a href="../admin-actions/index.php" class="navegacion__enlace">
                <i class="fa fa-bullhorn" aria-hidden="true"></i>
                    Posts
                </a>
                <a href="../admin-usuarios/index.php" class="navegacion__enlace">
                <i class="fa fa-users" aria-hidden="true"></i>
                    Usuarios
                </a>
                <a href="index.php" class="navegacion__enlace">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <?php echo $_SESSION['userName']; ?>
                </a>
                <a href="logout.php" class="navegacion__enlace">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                    Salir
                </a>
            </nav>
        </div>
</header>
<header class="header">
        <div class="barra">
            <a href="../index.php" class="logo">
            <h1 class="logo__nombre centrar-texto no-margin logo__bold">The Blog</h1>
            </a>
            <nav class="navegacion">
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
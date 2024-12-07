<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user'])) {
    // Si no ha iniciado sesión, redirigir al login
    header("Location: login.php");
    exit();
}

// Obtener el nombre de usuario
$username = $_SESSION['user']['User']; // Ajusta 'User' si es necesario
$role = strtolower($_SESSION['user']['rol']); // Convertir a minúsculas para consistencia

// Obtener mensajes de error o éxito
$error_message = '';
$success_message = '';
if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}
if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}


?>

<!DOCTYPE html>
<html lang="en">
<!--Venatana de para subir publicación-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="crearlistas.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
    <title>Publicar</title>
</head>

<body>
    <header class="topnav">
        <a class="imagen" href="main.html">
            <img src="./Imágenes/LOGOTIPO.png" alt=".">
        </a>
        <div class="busqueda">   
            <!--a class="active" href="main.html">Inicio</a>
            <a href="publicar.html">Publicar</a-->
            <form class="search-form" action="./busqueda.html" method="GET">
                <input type="text" name="search" placeholder="Buscar..." required>
                <button type="submit">Buscar</button>
            </form>
        </div>
        <div class="boton">
            <a href="usuario.php"><?php echo htmlspecialchars($username); ?></a>
            <a href="../Controlador/logout.php">Salir</a>
        </div>
    </header>
    <section class="pagina">
    <aside>
            <div class="sidebar">
                <a href="mainUser.php">Inicio</a>
                <?php if ($role == 'vendedor'): ?>
                    <a href="publicar.php">Publicar</a>
                    <a href="CrearCategorias.php">Crear Categoria</a>
                    <a href="productosaprobados.php">Productos Aprobados</a>
                    <a href="productoseliminados.php">Productos No Aprobados</a>
                <?php endif; ?>
                
                <?php if ($role == 'administrador'): ?>
                <a href="GestionProductos.php">Gestion Productos</a>
                <?php endif; ?>

                <?php if ($role == 'comprador'): ?>
                    <a href="crearlistas.php">Crear Lista</a>
                    <a href="listas.php">Listas</a>
                    <a href="Carrito.php">Carrito</a>
                    <a href="Historial.php">Historial</a>
                <?php endif; ?>
                <a href="messages.php">Mensajes</a>
            </div>
        </aside>

    <main>
        <div class="container">
            <h1>Crear Categorias</h1>
                <!-- Mostrar mensaje de error si existe -->
                <?php if (!empty($error_message)): ?>
                    <div class="error-message">
                        <?php echo htmlspecialchars($error_message); ?>
                    </div>
                <?php endif; ?>

                <!-- Mostrar mensaje de éxito si existe -->
                <?php if (!empty($success_message)): ?>
                    <div class="success-message">
                        <?php echo htmlspecialchars($success_message); ?>
                    </div>
                <?php endif; ?>
            <form id ="idcategoria" action="../Controlador/ControladorCategoria.php" method="POST">
                <div class="form-group">
                    <label for="title">Nombre Categoria:</label>
                    <input type="text" id="nombrec" name="nombrec" required>
                <div class="form-group">
                    <label for="content">Descripción:</label>
                    <input type="text" id="description" name="description" required>
                </div>
                <input type="submit" value="Subir">
            </form>
        </div>
    </main>
</section>
    <footer>
        <p>2024 Mercado Vivo. Todos los derechos reservados. Israel&Catherine Co. Property.</p>
    </footer>
</body>

</html>
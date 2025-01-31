<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $templateParams["titolo"]; ?></title>

    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">

</head>

<body>
    <!-- Login Banner -->
    <?php if(isset($_SESSION["email"])): ?>
    <a href="./index-pagina-personale.php">
    <?php else: ?>
    <a href="./index-login.php">
    <?php endif; ?>
        <div class="login-banner">
            <div class="container">
                <?php if(isset($_SESSION["email"])): ?>
                    <span>Pagina personale di <?php echo $_SESSION["nome"]; ?></span>
                <?php else: ?>
                    <span>Benvenuto! Effettua il login</span>
                <?php endif; ?>
            </div>
        </div>
    </a>

    <!-- Header -->
    <header class="mainheader py-4">
        <div class="row align-items-center gap-2" style="max-width:100%;">
            <!-- Search Bar -->
            <div class="col search-bar text-center">
                <form class="d-flex" action="./index-ricerca.php" method="get">
                    <input type="text" name="research" class="form-control me-2" placeholder="Cerca un prodotto">
                    <button type="submit" class="btn btn-primary">
                        <img src="./upload/icons/magnifying-glass-solid.svg" alt="Cerca" width="24">
                    </button>
                </form>
            </div>

            <!-- Logo -->
            <div class="col logo text-center">
                <img src="./upload/logos/LOGO2.png" alt="Logo All You Knit" class="img-fluid">
            </div>

            <!-- Icons -->
            <div class="col icons text-center">
                <!-- Hamburger menu mobile -->
                <div class="d-md-none">
                    <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
                        <img src="./upload/icons/bars-solid.svg" alt="Menu" width="24">
                    </button>
                </div>
                <?php if(isset($_SESSION["email"])): ?>
                    <!-- icone avvisi, carrello, logout -->
                    <a href="./index-avvisi.php">
                        <?php if($templateParams["news"]): ?>
                            <img src="./upload/icons/bell-solid-notification.svg" alt="Ci sono nuove notifiche" width="24">
                        <?php else: ?>
                            <img src="./upload/icons/bell-solid.svg" alt="Sezione notifiche" width="24">
                        <?php endif; ?>
                    </a>
                    <a href="./index-carrello.php">
                        <img src="./upload/icons/cart-shopping-solid.svg" alt="Accedi al carrello" width="24">
                    </a>
                    <a href="./utils/logout-script.php">
                        <img src="./upload/icons/logout-solid.svg" alt="Effettua il logout" width="24">
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- Navigation Bar -->
    <nav class="desktop-navbar bg-light py-2 d-none d-md-block">
        <div class="container">
            <ul class="nav justify-content-center">
                <li class="nav-item"><a class="nav-link" href="./index.php">Home</a></li>
                <?php foreach($templateParams["categorie"] as $categoria): ?>
                <li class="nav-item">
                    <a class="nav-link" href="./index-prodotti-categoria.php?nomeCategoria=<?php echo $categoria["Nome"]?>"><?php echo $categoria["Nome"]; ?></a>
                </li>
                <?php endforeach; ?>
                <li class="nav-item"><a class="nav-link" href="./index-offerte.php">Offerte</a></li>
            </ul>
        </div>
    </nav>

    <!-- Offcanvas Menu for Small Screens -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
        <div class="offcanvas-header">
            <div class="logo text-center w-100">
                <a href="./index-pagina-personale.php">
                    <img src="./upload/icons/user-solid-white.svg" alt="Logo All You Knit" class="img-fluid">
                </a>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="text-center mb-4">
                <?php if(isset($_SESSION["email"])): ?>
                    <a href="./index-pagina-personale.php">Ciao, <?php echo $_SESSION["nome"]; ?>!</a>
                <?php else: ?>
                    <a href="./index-login.php">Accedi/Registrati</a>
                <?php endif; ?>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="./index.php">Home</a></li>
                <?php foreach($templateParams["categorie"] as $categoria): ?>
                <li class="nav-item">
                    <a class="nav-link" href="./index-prodotti-categoria.php?nomeCategoria=<?php echo $categoria["Nome"]?>"><?php echo $categoria["Nome"]; ?></a>
                </li>
                <?php endforeach; ?>
                <li class="nav-item"><a class="nav-link" href="./index-offerte.php">Offerte</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container pb-4">
        <?php
        if (isset($templateParams["nome"])) {
            require($templateParams["nome"]);
        }
        ?>
    </main>

    <!-- Footer -->
    <footer class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-unstyled">
                        <li><strong>All You Knit S.p.A.</strong></li>
                        <li>© 1988 All rights reserved</li>
                        <li>Via del Gomitolo 42, 45122 Cesena (FC)</li>
                        <li>Tel. +39 322 8443012</li>
                        <li>Email: info@allyouknit.it</li>
                    </ul>
                </div>
                <div class="col-md-4 text-center">
                    <div class="brand-logo">
                        <img src="./upload/logos/LOGOSCRITTA.png" alt="Logo" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-4 text-end">
                    <div class="payment-icons d-flex">
                        <img src="./upload/icons/cc-apple-pay-brands-solid.svg" alt="Apple Pay" class="payment-icon">
                        <img src="./upload/icons/cc-mastercard-brands-solid.svg" alt="Mastercard" class="payment-icon">
                        <img src="./upload/icons/cc-visa-brands-solid.svg" alt="Visa" class="payment-icon">
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $templateParams["titolo"]; ?></title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
</head>

<body>
    <!-- Login Banner -->
    <div class="login-banner">
        <div class="container">
            <?php if(isset($_SESSION["email"])): ?>
                <a href="./index-pagina-personale.php" class="text-decoration-none">Ciao, <?php echo $_SESSION["nome"]; ?>!</a>
            <?php else: ?>
                <a href="./index-login.php" class="text-decoration-none">Welcome! Effettua login</a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Header -->
    <header class="mainheader py-4">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <!-- Search Bar -->
                <div class="col-auto search-bar">
                    <form class="d-flex" action="./index-ricerca.php" method="get">
                        <input type="text" name="research" class="form-control me-2" placeholder="Cerca un prodotto">
                        <button type="submit" class="btn btn-primary">
                            <img src="./upload/icons/magnifying-glass-solid.svg" alt="Cerca" width="24">
                        </button>
                    </form>
                </div>
                
                <!-- Logo -->
                <div class="col-auto logo text-center">
                    <img src="./upload/logos/LOGO2.png" alt="Logo All You Knit" class="img-fluid">
                </div>
                
                <!-- Icons -->
                <div class="col-auto icons">
                    <div class="d-inline-flex gap-2">
                        <?php if(isset($_SESSION["email"])): ?>
                        <a href="./index-avvisi.php">
                            <?php if($templateParams["news"]): ?>
                                <img src="./upload/icons/bell-solid.svg" alt="Ci sono nuove notifiche" width="24">
                            <?php else: ?>
                                <img src="./upload/icons/bell-regular.svg" alt="Sezione notifiche" width="24">
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
            </div>
        </div>
    </header>


    <!-- Navigation Bar -->
    <nav class="desktop-navbar bg-light py-2">
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

    <!-- Main Content -->
    <main class="container py-4">
        <?php
        if (isset($templateParams["nome"])) {
            require($templateParams["nome"]);
        }
        ?>
    </main>
    
    <br>
    <!-- Footer -->
    <footer class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-unstyled">
                        <li><strong>All You Knit S.p.A</strong></li>
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

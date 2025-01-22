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
    <!-- Header -->
    <header class="mainheader py-3">
        <div class="container">
            <div class="row align-items-center">
                <!-- Search Bar -->
                <div class="col-lg-4 col-md-6">
                    <form class="d-flex search-bar" action="#" method="get">
                        <input type="text" class="form-control me-2" placeholder="Cerca un prodotto">
                        <button type="submit" class="btn btn-primary">🔍</button>
                    </form>
                </div>
                
                <!-- Logo -->
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="logo">
                        <img src="./upload/logos/LOGO2.png" alt="Logo All You Knit" class="img-fluid">
                    </div>
                </div>
                
                <!-- Icons -->
                <div class="col-lg-4 text-end">
                    <div class="loginbanner mb-2">
                        <a href="./login.html" class="text-decoration-none">Ciao, Maurizio Capuano</a>
                    </div>
                    <div class="icons d-inline-flex gap-2">
                        <a href="./notifications.html">
                            <img src="./upload/icons/bell-solid.svg" alt="Notifiche" width="24">
                        </a>
                        <a href="./cart.html">
                            <img src="./upload/icons/cart-shopping-solid.svg" alt="Carrello" width="24">
                        </a>
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
                    <a class="nav-link" href="./index-prodotti-categoria.php?nomeCategoria=<?php echo $categoria["Nome"]?>">
                        <?php echo $categoria["Nome"]; ?>
                    </a>
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
                    <div class="payment-icons d-inline-flex gap-2">
                        <img src="./upload/icons/cc-apple-pay-brands-solid.svg" alt="" width="32">
                        <img src="./upload/icons/cc-mastercard-brands-solid.svg" alt="" width="32">
                        <img src="./upload/icons/cc-visa-brands-solid.svg" alt="" width="32">
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>

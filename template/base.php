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
    <!-- Header con logo e barra di ricerca -->
    <header class="mainheader">
        <form class="search-bar" action="#" method="get">
            <input type="text" placeholder="Cerca un prodotto">
            <button type="submit">🔍</button>                                       <!--fix me: sostituisci con vettoriale lente-->
        </form>

        <div class="logo">
            <img src="./upload/logos/LOGO2.png" alt="Logo All You Knit">
        </div>

        <div class="loginbanner">
            <a href="./login.html" class="desktop-only">Ciao, Maurizio Capuano</a>
        </div>
        
        <div class="icons">
            <a href="./notifications.html">
                <img src="./upload/icons/bell-solid.svg" alt="Notifiche">
            </a>
            <a href="./cart.html">
                <img src="./upload/icons/cart-shopping-solid.svg" alt="Carrello">
            </a>
        </div>

        <!-- Menu Hamburger -->
        <div class="hamburger-menu">
            <button id="menu-button">
                ☰                                                  <!-- fixme: <img src="../upload/icons/bars-solid.svg" alt="Menu"> -->
            </button>
        </div>

    </header>

    <!-- Barra di navigazione -->
    <nav class="desktop-navbar">
        <ul class="desktop-menu">
            <li><a href="./index.php">Home</a></li>
            <?php foreach($templateParams["categorie"] as $categoria): ?>
            <li>
                <a href="./index-prodotti-categoria.php?nomeCategoria=<?php echo $categoria["Nome"]?>"><?php echo $categoria["Nome"]; ?></a>
            </li>
            <?php endforeach; ?>
            <li><a href="./index-offerte.php">Offerte</a></li>
        </ul>

        <div class="mobile-greeting mobile-only">
            <p>Ciao, Maurizio Capuano</p>
            <a href="#">Esci</a>
        </div>
    
        <ul class="mobile-menu hidden">
            <li><a href="./index.php">Home</a></li>
            <?php foreach($templateParams["categorie"] as $categoria): ?>
            <li>
                <a href="./index-prodotti-categoria.php?nomeCategoria=<?php echo $categoria["Nome"]?>"><?php echo $categoria["Nome"]; ?></a>
            </li>
            <?php endforeach; ?>
            <li><a href="./index-offerte.php">Offerte</a></li>
        </ul>
    </nav>

    <!-- SEZIONE PRINCIPALE PER I CONTENUTI -->
    <main>
        <?php
        if(isset($templateParams["nome"])){
            require($templateParams["nome"]);
        }
        ?>
    </main>
    
    <!-- Footer -->
    <footer>
        <ul>
            <li>All You Knit S.p.A</li>
            <li>© 1988 All rights reserved</li>
            <li>Via del Gomitolo 42, 45122 Cesena (FC)</li>
            <li>Tel. +39 322 8443012</li>
            <li>Email: info@allyouknit.it</li>
        </ul>
        <div class="brand-logo">
            <img src="./upload/logos/LOGOSCRITTA.png" alt="">
        </div>
        <div class="payment-icons">
            <span><img src="./upload/icons/cc-apple-pay-brands-solid.svg" alt=""></span>
            <span><img src="./upload/icons/cc-mastercard-brands-solid.svg" alt=""></span>
            <span><img src="./upload/icons/cc-visa-brands-solid.svg" alt=""></span>
        </div>
    </footer>
</body>
</html>
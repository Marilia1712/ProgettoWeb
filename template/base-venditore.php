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
    <a href="./index-pagina-venditore.php" class="text-decoration-none">
        <div class="login-banner">
            <div class="container">
                <span>Vai alla homepage</span>
            </div>
        </div>
    </a>

    <!-- Header -->
    <header class="mainheader py-4">
        <div class="row align-items-center justify-content-between py-3" style="padding-left:30px; padding-right:30px;">
            <!-- Hamburger Menu Icon -->
            <div class="col-auto d-md-none">
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
                    <img src="./upload/icons/bars-solid.svg" alt="Menu" width="24">
                </button>
            </div>

            <!-- Search Bar -->
            <div class="col-auto"></div>

            <!-- Logo -->
            <div class="col-auto logo text-center">
                <img src="./upload/logos/LOGO2.png" alt="Logo All You Knit" class="img-fluid">
            </div>

            <!-- Icons -->
            <div class="col-auto icons"></div>
        </div>
    </header>

    <!-- Offcanvas Menu for Small Screens -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
        <div class="offcanvas-header">
            <div class="logo text-center w-100">
                <img src="./upload/icons/user-solid-white.svg" alt="Logo All You Knit" class="img-fluid">
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="text-center mb-4">
                <a href="./index-pagina-venditore.php">Vai alla homepage</a>
            </div>
        </div>
    </div>

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

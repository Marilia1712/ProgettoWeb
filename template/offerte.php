<main class="container py-4">
    <h1 class="text-center mb-4">Offerte Speciali</h1>

    <section class="row">
        <?php foreach ($templateParams["prodottiScontati"] as $prodotto): ?>
        <article class="col-12 col-md-6 mb-4">
            <a href="./index-singolo-prodotto.php?idProdotto=<?php echo $prodotto["CodIDProdotto"]; ?>" class="text-decoration-none text-dark">
                <div class="card shadow-sm h-100">
                    <div class="row g-0 align-items-center">
                        <!-- Product Image -->
                        <div class="col-12 col-md-4 text-center">
                            <img src="<?php echo UPLOAD_DIR . "productimages/" . $prodotto["Immagine"]; ?>" 
                                alt="<?php echo $prodotto["Nome"]; ?>" 
                                class="img-fluid p-3">
                        </div>
                        <!-- Product Details -->
                        <div class="col-12 col-md-8">
                            <div class="card-body-discount">
                                <h2 class="card-title h5" style="text-transform:none;">
                                    <?php echo $prodotto["Nome"]; ?>
                                </h2>
                                <p class="card-text text-muted mb-2">
                                    <del class="old-price"><?php echo number_format($prodotto["Prezzo"], 2, ",", ""); ?> €</del>
                                    <strong class="new-price"><?php echo number_format(($prodotto["Prezzo"] * (100 - $prodotto["PercSconto"])) / 100, 2, ",", ""); ?> €</strong>
                                </p>
                                <p class="card-text discount text-danger fw-bold">-<?php echo $prodotto["PercSconto"]; ?>%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </article>
        <?php endforeach; ?>
    </section>
</main>

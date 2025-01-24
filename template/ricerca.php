<section class="category-title">
    <h1 class="text-center my-4">Risultati ricerca: </h1>
</section>

<!-- Elenco dei prodotti -->
<section class="product-list container">
    <div class="row">
        <?php foreach ($templateParams["prodotti"] as $prodotto): ?>
            <?php if (str_contains(strtolower($prodotto["Nome"]), strtolower($_GET["research"]))): ?>
            <a href="./index-singolo-prodotto.php?idProdotto=<?php echo $prodotto["CodID"] ?>" class="text-decoration-none text-dark">
                <div class="col-12 mb-4">
                    <article class="product-item d-flex align-items-center border p-3 shadow-sm rounded bg-white">
                        <!-- Product Image -->
                        <div class="me-3">
                            <img src="<?php echo UPLOAD_DIR . "productimages/" . $prodotto["Immagine"]; ?>" 
                                alt="<?php echo $prodotto["Nome"]; ?>" 
                                class="img-fluid" 
                                style="max-width: 150px; height: auto;">
                        </div>
                        <!-- Product Details -->
                        <div>
                            <h2 class="h5 mb-2">
                                    <?php echo $prodotto["Nome"]; ?>
                            </h2>
                        </div>
                    </article>
                </div>
            </a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>

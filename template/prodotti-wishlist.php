<section class="category-title">
    <h1 class="text-center my-4"><?php echo $nomeWishlist ?></h1>
</section>

<!-- Elenco dei prodotti -->
<section class="product-list container">
    <div class="row">
        <?php foreach ($templateParams["prodotti"] as $prodotto): ?>
        <!-- Adjusted the column classes for responsive behavior -->
        <div class="col-12 col-md-6 mb-4">
            <a href="./index-singolo-prodotto.php?idProdotto=<?php echo $prodotto["CodID"]; ?>" class="product-link" style="text-decoration:none;">
                <article class="product-item d-flex align-items-center border p-3 shadow-sm bg-white" style="border-radius:12px;">
                    <!-- Product Image -->
                    <div class="me-3">
                        <img src="<?php echo UPLOAD_DIR . "productimages/" . $prodotto["Immagine"]; ?>" 
                             alt="<?php echo $prodotto["NomeProdotto"]; ?>" 
                             class="img-fluid" 
                             style="max-width: 150px; height: auto;">
                    </div>
                    <!-- Product Details -->
                    <div>
                        <h2 class="h5 mb-2 text-dark" style="font-size:16pt;">
                            <?php echo $prodotto["NomeProdotto"]; ?>
                        </h2>
                    </div>
                </article>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</section>

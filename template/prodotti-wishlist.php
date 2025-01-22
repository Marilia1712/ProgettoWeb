<section class="category-title">
    <h1 class="text-center my-4"><?php echo $nomeWishlist ?></h1>
</section>

<section class="wishlist">
    <div class="container">
        <?php foreach ($templateParams["prodotti"] as $prodotto): ?>
        <div class="row mb-4">
            <div class="col-12">
                <article class="wishlist-item d-flex">
                    <div class="product-image me-3">
                        <img src="<?php echo UPLOAD_DIR . "productimages/" . $prodotto["Immagine"]; ?>"
                             alt="<?php echo $prodotto["NomeProdotto"]; ?>"
                             class="img-fluid">
                    </div>
                    <div class="product-details">
                        <a href="./index-singolo-prodotto.php?idProdotto=<?php echo $prodotto["CodID"] ?>" 
                           class="text-decoration-none text-dark">
                            <?php echo $prodotto["NomeProdotto"]; ?>
                        </a>
                    </div>
                </article>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

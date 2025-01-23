<section class="container py-5">
    <div class="row p-4">
        <!-- Product Image -->
        <div class="col-md-4 text-center mb-4 prod-image">
            <img src="<?php echo UPLOAD_DIR."productimages/".$prodotto["Immagine"]; ?>" alt="<?php echo $prodotto["Nome"]; ?>" class="img-fluid" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        </div>

        <!-- Product Details -->
        <div class="col-md-8">
            <div class="product-info">
                <h1><?php echo $prodotto["Nome"]; ?></h1>
                <?php if($prodottoInOfferta): ?>
                    <p><del><?php echo number_format($prodotto["Prezzo"], 2, ",", ""); ?> $</del> <strong><?php echo number_format(($prodotto["Prezzo"]*(100-$prodotto["PercSconto"]))/100, 2, ",", ""); ?> $</strong></p>
                <?php else: ?>
                    <p><strong><?php echo number_format($prodotto["Prezzo"], 2, ",", ""); ?> $</strong></p>
                <?php endif; ?>

                <div>
                    <div class="schedatecnica">
                        <h2>Scheda Tecnica:</h2>
                        <ul>
                            <li>Colore: <?php if(!is_null($prodotto["Colore"])) echo $prodotto["Colore"]; else echo "--"; ?></li>
                            <li>Composizione: <?php if(!is_null($prodotto["Composizione"])) echo $prodotto["Composizione"]; else echo "--"; ?></li>
                            <li>Strumenti: <?php if(!is_null($prodotto["Strumenti"])) echo $prodotto["Strumenti"]; else echo "--"; ?></li>
                        </ul>
                    </div>
                    <p>Codice di Riferimento: <?php echo $prodotto["CodID"]; ?></p>
                </div>

                <!-- Action Buttons -->
                <div class="mt-4">

                    <!-- Cart Section -->
                <div class="mb-3">
                    <input type="number" value="0" min="0" max="<?php echo $prodotto["Giacenza"]; ?>" class="form-control w-25 d-inline-block mx-2">
                    <button class="btn-cart">Aggiungi al Carrello
                        <img src="./upload/icons/cart-shopping-solid-white.svg" alt="Carrello" width="24">
                    </button>
                </div>
                <!-- -->


                    <!-- Wishlist Section -->
                    <div class="mb-3">
                        <select class="form-control w-25 d-inline-block mx-2">
                            <option value="" disabled selected>Nome Wishlist</option>
                            <?php foreach($templateParams["wishlists"] as $wishlist): ?>
                                <option value="<?php echo $wishlist["Codid"]; ?>"><?php echo $wishlist["nome"]; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <button class="btn-wishlist">Aggiungi a Wishlist
                            <img src="./upload/icons/heart-solid-white.svg" alt="Wishlist" width="24">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

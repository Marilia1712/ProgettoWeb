<section class="container py-5">
    <div class="row bg-white p-4 rounded shadow-sm">
        <!-- Product Image -->
        <div class="col-md-4 text-center mb-4">
            <img src="<?php echo UPLOAD_DIR."productimages/".$prodotto["Immagine"]; ?>" alt="<?php echo $prodotto["Nome"]; ?>" class="img-fluid">
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
                    <h2>Scheda Tecnica:</h2>
                    <ul>
                        <li>Colore: <?php if(!is_null($prodotto["Colore"])) echo $prodotto["Colore"]; else echo "--"; ?></li>
                        <li>Composizione: <?php if(!is_null($prodotto["Composizione"])) echo $prodotto["Composizione"]; else echo "--"; ?></li>
                        <li>Strumenti: <?php if(!is_null($prodotto["Strumenti"])) echo $prodotto["Strumenti"]; else echo "--"; ?></li>
                    </ul>
                    <p>Codice di Riferimento: <?php echo $prodotto["CodID"]; ?></p>
                </div>

                <!-- Action Buttons -->
                <div class="mt-4">

                    <!-- Cart Section -->
                    <div class="mb-3">
                        <button class="btn btn-primary">Aggiungi al Carrello
                            <img src="./upload/icons/cart-shopping-solid.svg" alt="Carrello" width="24">
                        </button>
                        <input type="number" value="0" min="0" max="<?php echo $prodotto["Giacenza"]; ?>" class="form-control w-25 d-inline-block mx-2">
                    </div>

                    <!-- Wishlist Section -->
                    <div class="mb-3">
                        <button class="btn btn-btn-primary">Aggiungi a Wishlist
                            <img src="./upload/icons/heart-solid-pink.svg" alt="Wishlist" width="24">
                        </button>

                        <select class="form-control w-25 d-inline-block mx-2">                          <!--fix me: php part-->
                            <option value="" disabled selected>Nome Wishlist</option>
                            <?php foreach($templateParams["wishlists"] as $wishlist): ?>
                                <option value="<?php echo $wishlist["Codid"]; ?>"><?php echo $wishlist["nome"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

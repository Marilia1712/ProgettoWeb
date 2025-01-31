<h1 class="mt-4 mb-4">Il tuo carrello</h1>

<!-- Elenco Prodotti -->
<section class="cart">
    <div class="row">
    <?php foreach ($templateParams["prodotti"] as $prodotto): ?>
            <div class="col-md-12 col-lg-6 mb-3">
                <a href="./index-singolo-prodotto.php?idProdotto=<?php echo $prodotto["CodIDProdotto"]; ?>" class="product-link" style="text-decoration:none;color:black">
                    <article class="cart-item d-flex align-items-center p-3 bg-white border rounded">
                        <div class="product-image me-3">
                        <img src="<?php echo UPLOAD_DIR . "productimages/" . $prodotto["Immagine"]; ?>"
                                    alt="<?php echo $prodotto["Nome"]; ?>"
                                    class="img-fluid" style="width: 100px;">
                        </div>
                        <div class="product-details">
                            <h2 class="h5"><?php echo $prodotto["Nome"]; ?></h2>
                            <p class="mb-2">
                                <strong>Prezzo:</strong>
                                <?php if(isset($prodotto["PercSconto"])): ?>
                                    <del><?php echo number_format($prodotto["Prezzo"], 2, ",", ""); ?> €</del> <strong><?php echo number_format(($prodotto["Prezzo"]*(100-$prodotto["PercSconto"]))/100, 2, ",", ""); ?></strong>
                                <?php else: 
                                        echo number_format($prodotto["Prezzo"], 2, ",", "");
                                    endif;
                                ?>
                                €
                            </p>
                            <div class="quantity d-flex align-items-center">
                                <label for="quantity1" class="me-2">Quantità:</label>
                                <input type="number" id="quantity1" value="<?php echo $prodotto["Quantita"]; ?>" class="form-control w-25" disabled>
                                <form action="./utils/remove-from-cart-script.php" method="post">
                                    <input type="hidden" name="idProdotto" value="<?php echo $prodotto["CodIDProdotto"]; ?>">
                                    <input type="hidden" name="quantita" value="<?php echo $prodotto["Quantita"]; ?>">
                                    <button class="btn-trash" type="submit">
                                        <img src="./upload/icons/trash-solid-white.svg" alt="Rimuovi" width="24">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </article>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Totale Carrello -->
<section class="cart-total text-center py-3 bg-light border rounded">
    <h2 class="h4">Totale</h2>
    <p class="mb-3">
        <strong>
            <?php 
                $totale = 0;
                foreach ($templateParams["prodotti"] as $prodotto): 
                    if(isset($prodotto["PercSconto"]))
                        $totale += ($prodotto["Prezzo"]*(100-$prodotto["PercSconto"]))/100*$prodotto["Quantita"];
                    else
                        $totale += $prodotto["Prezzo"]*$prodotto["Quantita"];
                endforeach;
                echo number_format($totale, 2, ",", "")." €";
            ?>
        </strong>
    </p>
    <?php if($totale > 0): ?>
        <form action="./utils/checkout-script.php" method="post">
            <input type="hidden" name="prezzoTotale" value="<?php echo number_format($totale, 2, ".", "");; ?>">
            <button style="background-color: #F85760; font-weight: bold; color:white;" type="submit" class="btn btn-checkout">Procedi al Checkout</button>
        </form>
    <?php endif; ?>
</section>

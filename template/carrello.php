<h1 class="mb-4">Il tuo carrello</h1>

<!-- Elenco Prodotti -->
<section class="cart">

    <div class="row mb-3">
        <?php foreach ($templateParams["prodotti"] as $prodotto): ?>
        <div class="col-12">
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
                            <button type="submit">
                                <img src="./upload/icons/trash-solid.svg" alt="Cestino" width="48"> <!--  HELP MARYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY FIXME PLEASE UWU -->
                            </button>
                        </form>
                    </div>
                </div>
            </article>
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
            <button type="submit" class="btn btn-primary">Procedi al Checkout</button>
        </form>
    <?php endif; ?>
</section>

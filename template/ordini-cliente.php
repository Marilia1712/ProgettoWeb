<!-- Elenco degli ordini -->
<section class="row orders-list mt-4">
    <?php foreach ($templateParams["ordini"] as $ordine): ?>
    <div class="col-md-12 col-lg-6 mb-4">
        <div class="card bg-white shadow-sm p-4">
            <h2>Ordine #<?php echo $ordine["CodID"]; ?></h2>

            <!-- Dettagli ordine -->
            <div class="order-details">
                <h4>Importo: <?php echo number_format($ordine["Importo"], 2, ",", ""); ?> €</h4>
                <p>Data: <?php echo $ordine["Data"]; ?></p>
                <p>Ora: <?php echo $ordine["Ora"]; ?></p>
                <article class="tracking-section">
                    <p>Stato: </p>
                        <div class="tracking-container">
                        <?php
                            switch($ordine["Stato"]){
                                case "Ricevuto": 
                                    ?>
                                    <div class="tracking-step completed">
                                        <div>
                                            <img src="./upload/icons/shipping1.svg" alt="">
                                        </div>
                                        <p>Ordine Ricevuto</p>
                                    </div>
                                    <?php
                                    break;
                                case "Lavorazione":
                                    ?>
                                    <div class="tracking-step completed">
                                        <div>
                                            <img src="./upload/icons/shipping2.svg" alt="">
                                        </div>
                                        <p>In lavorazione</p>
                                    </div>
                                    <?php
                                    break;
                                case "Spedito":
                                    ?>
                                    <div class="tracking-step completed">
                                        <div>
                                            <img src="./upload/icons/shipping3.svg" alt="">
                                        </div>
                                        <p>Spedito</p>
                                    </div>
                                    <?php
                                    break;
                                case "Consegna":
                                    ?>
                                    <div class="tracking-step">
                                        <div>
                                            <img src="./upload/icons/shipping4.svg" alt="">
                                        </div>
                                        <p>In Consegna</p>
                                    </div>
                                    <?php
                                    break;
                                case "Consegnato":
                                    ?>
                                    <div class="tracking-step">
                                        <div>
                                            <img src="./upload/icons/shipping5.svg" alt="">
                                        </div>
                                        <p>Consegnato</p>
                                    </div>
                                    <?php
                                }
                            ?>
                        </div>
                </article>
            </div>

            <!-- Prodotti ordinati -->
            <div>
                <h3>Prodotti ordinati:</h3>
                    <ul>
                        <?php $prodottiOrdinati = $dbh->getOrderProducts($ordine["CodID"]);?>
                        <?php foreach ($prodottiOrdinati as $prodotto): ?>
                        <li class="d-flex mb-3">
                            <!-- Product image -->
                            <div class="product-image me-3">
                                <a href="./index-singolo-prodotto.php?idProdotto=<?php echo $prodotto["CodID"]; ?>">
                                    <img src="<?php echo UPLOAD_DIR . "productimages/" . $prodotto["Immagine"]; ?>"
                                    alt="<?php echo $prodotto["Nome"]; ?>"
                                    class="img-fluid" style="width: 100px;">
                                </a>
                            </div>
                            <!-- Product name and quantity -->
                            <div>
                                <a href="./index-singolo-prodotto.php?idProdotto=<?php echo $prodotto["CodID"]; ?>"><?php echo $prodotto["Nome"]; ?></a>
                                <div>- quantità: <?php echo $prodotto["Quantita"]; ?></div>
                            </div>

                        </li>
                        <?php endforeach; ?>
                    </ul>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</section>

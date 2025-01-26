<!-- Elenco degli ordini -->
<section class="row">
    <h1 class="mb-4">Elenco di tutti gli ordini del sito</h1>
    <?php foreach ($templateParams["ordini"] as $ordine): ?>
    <div class="col-md-12 col-lg-6 mb-4">
        <div class="card bg-white shadow-sm p-4">
            <h2>Ordine #<?php echo $ordine["CodID"]; ?></h2>
            <p style="font-weight:bold;" >Cliente: <?php echo $ordine["EmailCliente"]; ?></p>
            <p style="font-weight:bold;" >Importo: <?php echo number_format($ordine["Importo"], 2, ",", ""); ?> €</p>
            <p>Data: <?php echo $ordine["Data"]; ?></p>
            <p>Ora: <?php echo $ordine["Ora"]; ?></p>
            <article class="tracking-section">
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
            <?php if($ordine["Stato"] != "Consegnato"): ?>
                <form action="./utils/next-order-state-script.php" method="post">
                    <input type="hidden" name="idOrdine" value="<?php echo $ordine["CodID"]; ?>">
                    <input type="hidden" name="statoOrdine" value="<?php echo $ordine["Stato"]; ?>">
                    <input type="hidden" name="emailCliente" value="<?php echo $ordine["EmailCliente"]; ?>">
                    <button class="btn-shipping p-3 mb-3">
                        Avanza lo stato dell'ordine
                        <img src="./upload/icons/forward-solid.svg" alt="Wishlist" width="24">
                    </button>
                </form>
            <?php else: ?>
                <form action="#" method="post">
                    <button class="btn-shipping p-3 mb-3" disabled>
                        Avanza lo stato dell'ordine
                        <img src="./upload/icons/forward-solid-grey.svg" alt="Wishlist" width="24">
                    </button>
                </form>
            <?php endif; ?>
            <div>
                <h3>Prodotti:</h3>
                <?php $prodottiOrdinati = $dbh->getOrderProducts($ordine["CodID"]);?>
                <?php foreach ($prodottiOrdinati as $prodotto): ?>
                <ul>
                    <li>
                        <a style="text-decoration:none;color:black;" href="./index-singolo-prodotto.php?idProdotto=<?php echo $prodotto["CodID"]; ?>">
                            <?php echo $prodotto["Nome"]; ?> - Quantità: <?php echo $prodotto["Quantita"]; ?>
                        </a>
                    </li>
                </ul>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</section>

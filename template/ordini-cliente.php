<!-- Elenco degli ordini -->
<section class="row">
    <?php foreach ($templateParams["ordini"] as $ordine): ?>
    <div class="col-12 mb-4">
        <div class="card bg-white shadow-sm p-4">
            <h2>Ordine #<?php echo $ordine["CodID"]; ?></h2>
            <p>Importo: <?php echo number_format($ordine["Importo"], 2, ",", ""); ?> €</p>
            <p>Data: <?php echo $ordine["Data"]; ?></p>
            <p>Ora: <?php echo $ordine["Ora"]; ?></p>
            <article class="tracking-section">
                <div class="tracking-container">
                <?php
                    switch($ordine["Stato"]){
                        case "Ricevuto": 
                            ?>
                            <div class="tracking-step completed">
                                <div class="step-icon">📝</div>
                                <p>Ordine Ricevuto</p>
                            </div>
                            <?php
                            break;
                        case "Lavorazione":
                            ?>
                            <div class="tracking-step completed">
                                <div class="step-icon">🖥️</div>
                                <p>In lavorazione</p>
                            </div>
                            <?php
                            break;
                        case "Spedito":
                            ?>
                            <div class="tracking-step completed">
                                <div class="step-icon">📦</div>
                                <p>Spedito</p>
                            </div>
                            <?php
                            break;
                        case "Consegna":
                            ?>
                            <div class="tracking-step">
                                <div class="step-icon">🚚</div>
                                <p>In Consegna</p>
                            </div>
                            <?php
                            break;
                        case "Consegnato":
                            ?>
                            <div class="tracking-step">
                                <div class="step-icon">🏡</div>
                                <p>Consegnato</p>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </article>
            <div>
                <h3>Prodotti ordinati:</h3>
                    <ul>
                        <?php $prodottiOrdinati = $dbh->getOrderProducts($ordine["CodID"]);?>
                        <?php foreach ($prodottiOrdinati as $prodotto): ?>
                        <li>
                            <a href="./index-singolo-prodotto.php?idProdotto=<?php echo $prodotto["CodID"]; ?>"><?php echo $prodotto["Nome"]; ?></a> - quantità: <?php echo $prodotto["Quantita"]; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</section>

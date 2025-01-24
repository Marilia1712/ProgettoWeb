<!-- Elenco degli ordini -->
<section class="row">
    <h1 class="mb-4">Elenco di tutti gli ordini del sito</h1>
    <?php foreach ($templateParams["ordini"] as $ordine): ?>
    <div class="col-12 mb-4">
        <div class="card bg-white shadow-sm p-4">
            <h2>Ordine #<?php echo $ordine["CodID"]; ?></h2>
            <p>Email cliente: <?php echo $ordine["EmailCliente"]; ?></p>
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
            <?php if($ordine["Stato"] != "Consegnato"): ?>
                <form action="./utils/next-order-state-script.php" method="post">
                    <input type="hidden" name="idOrdine" value="<?php echo $ordine["CodID"]; ?>">
                    <input type="hidden" name="statoOrdine" value="<?php echo $ordine["Stato"]; ?>">
                    <button>
                        Avanza lo stato dell'ordine
                        <img src="./upload/icons/truck-solid.svg" alt="Wishlist" width="24">
                    </button>
                </form>
            <?php endif; ?>
            <div>
                <h3>Prodotti:</h3>
                <?php $prodottiOrdinati = $dbh->getOrderProducts($ordine["CodID"]);?>
                <?php foreach ($prodottiOrdinati as $prodotto): ?>
                <li>
                    <?php echo $prodotto["Nome"]; ?> - Quantità: <?php echo $prodotto["Quantita"]; ?>
                </li>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</section>

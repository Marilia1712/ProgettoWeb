<!-- Elenco degli ordini -->
<section class="container">
    <div class="row">
        <div class="col-12 mb-4">
            <?php foreach ($templateParams["ordini"] as $ordine): ?>
            <div class="order-card">
                <h2>Ordine #<?php echo $ordine["CodID"]; ?></h2>
                <p>Data: <?php echo $ordine["Data"]; ?></p>
                <p>Ora: <?php echo $ordine["Ora"]; ?></p>
                <!-- Tracking Stato Ordine -->
                <section class="tracking-section">
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
                                    break;
                                    <?php
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
                </section>
                
                <div>
                    <h3>Prodotti ordinati:</h3>
                    <ul>
                        <?php $prodottiOrdinati = $dbh->getOrderProducts($ordine["CodID"]);?>
                        <?php foreach ($prodottiOrdinati as $prodotto): ?>
                        <li>
                            <a href="./product1.html"><?php echo $prodotto["Nome"]; ?></a> - Quantità: <?php echo $prodotto["Quantita"]; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
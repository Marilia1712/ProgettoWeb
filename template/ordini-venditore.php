<!-- Elenco degli ordini -->
<section class="container my-5">
    <h1 class="mb-4">Elenco Ordini</h1>
    <div class="row">
        <?php foreach ($templateParams["ordini"] as $ordine): ?>
        <div class="col-12 mb-4">
            <div class="card bg-white shadow-sm p-4">
                <h2>Ordine #<?php echo $ordine["CodID"]; ?></h2>
                <p>Email Cliente: <?php echo $ordine["EmailCliente"]; ?></p>
                <p>Importo: <?php echo $ordine["Importo"]; ?> €</p>
                <p>Data: <?php echo $ordine["Data"]; ?></p>
                <p>Ora: <?php echo $ordine["Ora"]; ?></p>
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
                    <h3>Prodotti:</h3>
                    <?php $prodottiOrdinati = $dbh->getOrderProducts($ordine["CodID"]);?>
                    <?php foreach ($prodottiOrdinati as $prodotto): ?>
                    <li>
                        <?php echo $prodotto["Nome"]; ?> - Quantità: <?php echo $prodotto["Quantita"]; ?>
                    </li>
                    <?php endforeach; ?>
                </div>
                <div>
                    <label class="form-check-label">
                        <input type="checkbox" name="shipped_123456" id="shipped_123456" class="form-check-input"> <!-- FIXMEEEEEEEEEEEEEEEEEEEE -->
                        Segna come spedito
                    </label>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

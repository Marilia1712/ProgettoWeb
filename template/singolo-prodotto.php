<section>
    <div>
        <!-- Descrizione e dettagli del prodotto -->
        <h1><?php echo $prodotto["Nome"]; ?></h1>
        <div>
            <!-- Immagine del prodotto -->
            <img src="<?php echo UPLOAD_DIR."productimages/".$prodotto["Immagine"]; ?>" alt="<?php echo $prodotto["Nome"]; ?>">
        </div>
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
            <p>Cod di Riferimento: <?php echo $prodotto["CodID"]; ?></p>
        </div>
        <!-- Pulsanti di interazione -->
        <div>
            <button>Aggiungi al Carrello 🛒</button>
            <input type="number" value="0" min="0" max="<?php echo $prodotto["Giacenza"]; ?>"
            <button>❤</button>
        </div>
    </div>
</section>
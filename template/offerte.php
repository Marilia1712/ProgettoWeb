<h1>Offerte Speciali</h1>

<section class="product-list">

    <?php foreach($templateParams["prodottiScontati"] as $prodotto): ?>
        <article class="product-item">
            <div>
                <img src="<?php echo UPLOAD_DIR."productimages/".$prodotto["Immagine"]; ?>" alt="<?php echo $prodotto["Nome"]; ?>">
            </div>
            <div>
                <h2><a href="./index-singolo-prodotto.php?idProdotto=<?php echo $prodotto["CodIDProdotto"]?>"><?php echo $prodotto["Nome"]; ?></a></h2>
                <p><del><?php echo number_format($prodotto["Prezzo"], 2, ",", ""); ?> $</del> <strong><?php echo number_format(($prodotto["Prezzo"]*(100-$prodotto["PercSconto"]))/100, 2, ",", ""); ?> $</strong></p>
                <p>-<?php echo $prodotto["PercSconto"]; ?>%</p>
            </div>
        </article>
    <?php endforeach; ?>
    
</section>
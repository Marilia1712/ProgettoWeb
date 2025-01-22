<section class="category-title">
    <h1><?php echo $nomeCategoria?></h1>
</section>

<!-- Elenco dei prodotti -->
<section class="product-list">

    <?php foreach($templateParams["prodotti"] as $prodotto): ?>
        <article class="product-item">
            <img src="<?php echo UPLOAD_DIR."productimages/".$prodotto["Immagine"]; ?>" alt="<?php echo $prodotto["NomeProdotto"]; ?>">
            <h2><a href="./index-singolo-prodotto.php?idProdotto=<?php echo $prodotto["CodID"]?>"><?php echo $prodotto["NomeProdotto"]; ?></a></h2>
            <br>
        </article>
    <?php endforeach; ?>
    
</section>
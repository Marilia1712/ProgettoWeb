<section class="category-title">
    <h1><?php echo $nomeCategoria?></h1>
</section>

<!-- Elenco dei prodotti -->
<section class="product-list">

    <?php foreach($templateParams["prodotti"] as $prodotto): ?>
        <article>
            <img src="<?php echo UPLOAD_DIR."productimages/".$prodotto["Immagine"]; ?>" alt="<?php echo $prodotto["Nome"]; ?>">
            <h2><a href="#"><?php echo $prodotto["NomeProdotto"]; ?></a></h2>
            <p><strong><?php echo $prodotto["Prezzo"]; ?> $</strong></p>
        </article>
    <?php endforeach; ?>
    
</section>
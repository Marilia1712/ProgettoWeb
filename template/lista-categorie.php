<!-- Sezione delle categorie -->
<section>
    <?php foreach($templateParams["categorie"] as $categoria): ?>
        <article>
            <img src="<?php echo UPLOAD_DIR."categories/".$categoria["Immagine"]; ?>" alt="">
            <h2><a href="./index-prodotti-categoria.php?nomeCategoria=<?php echo $categoria["Nome"]?>"><?php echo $categoria["Nome"]; ?></a></h2>
            <p><?php echo $categoria["Descrizione"]; ?></p>
        </article>
    <?php endforeach; ?>
</section>

<!-- Sezione del carosello di immagini FIXME: aggiorna link -->
<section class="banner-categorie">
    <div class="carousel">
        <a href="./category-filati.html">
            <img src="./upload/carousel/carousel1.jpg" alt="" class="carousel-image">
            <p>Filati</p>
        </a>
        <a href="./category-borse.html">
            <img src="./upload/carousel/carousel2.jpg" alt="" class="carousel-image">
            <p>Borse</p>
        </a>
        <a href="./category-attrezzi.html">
            <img src="./upload/carousel/carousel3.jpg" alt="" class="carousel-image">
            <p>Attrezzi</p>
        </a>
        <a href="./category-bijoux.html">
            <img src="./upload/carousel/carousel4.jpg" alt="" class="carousel-image">
            <p>Bijoux</p>
        </a>
    </div>
    <div class="carousel-dots"></div>
</section>

<!-- Sezione descrittiva del brand -->
<script src="./js/script.js"></script>
<section class="white-banner">
    <div class="container">
        <div class="content-wrapper">
            <img src="./upload/logos/LOGO2.png" alt="All You Knit Logo" class="logo">
            <p>
                All You Knit, da oltre 30 anni, è un brand retrò che combina la passione per la maglieria con lo stile groovy
                degli anni passati. I nostri filati e gomitoli, selezionati con cura, garantiscono morbidezza, resistenza e
                colori vivaci che richiamano l'energia e la creatività di un’epoca unica. Coniughiamo tradizione e design
                vintage per offrire materiali di alta qualità, perfetti per dare vita a progetti originali e duraturi.
            </p>
        </div>
    </div>
</section>
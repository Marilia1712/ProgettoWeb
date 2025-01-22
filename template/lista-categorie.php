<section>
    <div class="row">
        <?php foreach($templateParams["categorie"] as $categoria): ?>
            <div class="col-12 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="<?php echo UPLOAD_DIR."categories/".$categoria["Immagine"]; ?>" class="card-img-top" alt="<?php echo $categoria["Nome"]; ?>">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="./index-prodotti-categoria.php?nomeCategoria=<?php echo $categoria["Nome"]; ?>" class="text-decoration-none">
                                <?php echo $categoria["Nome"]; ?>
                            </a>
                        </h5>
                        <p class="card-text"><?php echo $categoria["Descrizione"]; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Sezione del carosello di immagini -->
<section class="banner-categorie">
    <div class="carousel">
        <a href="./index-prodotti-categoria.php?nomeCategoria=Filati">
            <img src="./upload/carousel/carousel1.jpg" alt="" class="carousel-image">
            <p>Filati</p>
        </a>
        <a href="./index-prodotti-categoria.php?nomeCategoria=Tutto Borse">
            <img src="./upload/carousel/carousel2.jpg" alt="" class="carousel-image">
            <p>Borse</p>
        </a>
        <a href="./index-prodotti-categoria.php?nomeCategoria=Attrezzi">
            <img src="./upload/carousel/carousel3.jpg" alt="" class="carousel-image">
            <p>Attrezzi</p>
        </a>
        <a href="./index-prodotti-categoria.php?nomeCategoria=Bijoux">
            <img src="./upload/carousel/carousel4.jpg" alt="" class="carousel-image">
            <p>Bijoux</p>
        </a>
    </div>
    <div class="carousel-dots"></div>
</section>

<!-- Sezione descrittiva del brand -->
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
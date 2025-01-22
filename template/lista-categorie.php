<section>
    <div class="row">
        <?php foreach ($templateParams["categorie"] as $categoria): ?>
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

<!-- Carousel Section -->
<section class="banner-categorie my-5">
    <div id="categoryCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="./index-prodotti-categoria.php?nomeCategoria=Filati">
                    <img src="./upload/carousel/carousel1.jpg" class="d-block w-100" alt="Filati">
                    <div class="carousel-caption">
                        <p>Filati</p>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="./index-prodotti-categoria.php?nomeCategoria=Tutto Borse">
                    <img src="./upload/carousel/carousel2.jpg" class="d-block w-100" alt="Borse">
                    <div class="carousel-caption">
                        <p>Borse</p>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="./index-prodotti-categoria.php?nomeCategoria=Attrezzi">
                    <img src="./upload/carousel/carousel3.jpg" class="d-block w-100" alt="Attrezzi">
                    <div class="carousel-caption">
                        <p>Attrezzi</p>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="./index-prodotti-categoria.php?nomeCategoria=Bijoux">
                    <img src="./upload/carousel/carousel4.jpg" class="d-block w-100" alt="Bijoux">
                    <div class="carousel-caption">
                        <p>Bijoux</p>
                    </div>
                </a>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#categoryCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#categoryCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<!-- Brand Banner -->
<section class="white-banner py-5">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <img src="./upload/logos/LOGO2.png" alt="All You Knit Logo" class="img-fluid mb-4">
                <p>
                    All You Knit, da oltre 30 anni, è un brand retrò che combina la passione per la maglieria con lo stile groovy
                    degli anni passati. I nostri filati e gomitoli, selezionati con cura, garantiscono morbidezza, resistenza e
                    colori vivaci che richiamano l'energia e la creatività di un’epoca unica. Coniughiamo tradizione e design
                    vintage per offrire materiali di alta qualità, perfetti per dare vita a progetti originali e duraturi.
                </p>
            </div>
        </div>
    </div>
</section>

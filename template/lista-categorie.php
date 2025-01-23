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

<section class="banner-categorie mb-5">
    <div id="categoryCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2500">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="./index-prodotti-categoria.php?nomeCategoria=Filati">
                    <img src="./upload/carousel/filati.jpg" class="d-block w-100 banner-image" alt="">
                    <p>Filati</p>
                </a>
            </div>
            <div class="carousel-item">
                <a href="./index-prodotti-categoria.php?nomeCategoria=Attrezzi">
                    <img src="./upload/carousel/attrezzi.jpg" class="d-block w-100 banner-image" alt="">
                    <p>Attrezzi</p>
                </a>
            </div>
            <div class="carousel-item">
                <a href="./index-prodotti-categoria.php?nomeCategoria=Bijoux">
                    <img src="./upload/carousel/bijoux.jpg" class="d-block w-100 banner-image" alt="">
                    <p>Bijoux</p>
                </a>
            </div>
            <div class="carousel-item">
                <a href="./index-prodotti-categoria.php?nomeCategoria=TuttoBorse">
                    <img src="./upload/carousel/tuttoborse.png" class="d-block w-100 banner-image" alt="">
                    <p>Tutto Borse</p>
                </a>
            </div>
            <div class="carousel-item">
                <a href="./index-prodotti-categoria.php?nomeCategoria=Applicazioni">
                    <img src="./upload/carousel/applicazioni.jpg" class="d-block w-100 banner-image" alt="">
                    <p>Applicazioni</p>
                </a>
            </div>
            <div class="carousel-item">
                <a href="./index-prodotti-categoria.php?nomeCategoria=Editoria">
                    <img src="./upload/carousel/editoria.jpg" class="d-block w-100 banner-image" alt="">
                    <p>Editoria</p>
                </a>
            </div>
        </div>
    </div>
</section>


<!-- Brand Banner -->
<section class="white-banner py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo Section -->
            <div class="col-12 col-md-3 text-center text-md-start">
                <img src="./upload/logos/LOGO2.png" alt="All You Knit Logo" class="img-fluid">
            </div>
            <!-- Text Section -->
            <div class="col-12 col-md-9">
                <p class="brand-description">
                    All You Knit, da oltre 30 anni, è un brand retrò che combina la passione per la maglieria con lo stile groovy
                    degli anni passati. I nostri filati e gomitoli, selezionati con cura, garantiscono morbidezza, resistenza e
                    colori vivaci che richiamano l'energia e la creatività di un’epoca unica. Coniughiamo tradizione e design
                    vintage per offrire materiali di alta qualità, perfetti per dare vita a progetti originali e duraturi.
                </p>
            </div>
        </div>
    </div>
</section>


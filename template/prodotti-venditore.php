<!-- Bottone per aggiungere un prodotto -->
<section class="mb-4">
    <form action="./index-nuovo-prodotto.php">
        <button class="btn-addproduct">Aggiungi Prodotto
            <img src="./upload/icons/plus-solid-white.svg" alt="Aggiungi" width="24">
        </button>
    </form>
</section>

<!-- Elenco prodotti -->
<section class="row g-4">
    <?php foreach ($templateParams["prodotti"] as $prodotto): ?>
    <div class="col-md-12 col-lg-6 mb-4">
        <div class="card shadow-sm p-3"> <!-- Added padding to the card -->
            <div class="row g-0">
                <!-- Image occupies 4 columns, with padding adjustment -->
                <div class="col-md-4 d-flex">
                    <img src="<?php echo UPLOAD_DIR."productimages/".$prodotto["Immagine"]; ?>" alt="<?php echo $prodotto["Nome"]; ?>" class="img-fluid w-100 h-100 object-fit-contain">
                </div>
                <!-- Text occupies 8 columns, ensures full height -->
                <div class="col-md-8 d-flex flex-column">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title"><?php echo $prodotto["Nome"]; ?></h5>
                        <p class="card-text"><strong><?php echo number_format($prodotto["Prezzo"], 2, ",", ""); ?> €</strong></p>
                        <p class="card-text text-muted">Giacenza: <?php echo $prodotto["Giacenza"]; ?></p>
                        <p class="card-text text-muted">Cod di Riferimento: <?php echo $prodotto["CodID"]; ?></p>
                        <div class="d-flex justify-content-between">
                            <form action="./utils/delete-product-script.php" method="post">
                                <input type="hidden" name="idProdotto" value="<?php echo $prodotto["CodID"]; ?>">
                                <button type="submit" class="btn-deleteproduct">Elimina
                                    <img src="./upload/icons/trash-solid-white.svg" alt="Elimina">
                                </button>
                            </form>
                            <form action="./index-modifica-prodotto.php" method="post">
                                <input type="hidden" name="idProdotto" value="<?php echo $prodotto["CodID"]; ?>">
                                <button type="submit" class="btn-editproduct">Modifica
                                    <img src="./upload/icons/pen-solid.svg" alt="Modifica">
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</section>
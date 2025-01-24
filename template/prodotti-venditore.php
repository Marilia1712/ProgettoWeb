<!-- Bottone per aggiungere un prodotto -->
<section class="mb-4 text-center">
    <form action="./index-nuovo-prodotto.php">
        <button class="btn btn-primary">Aggiungi Prodotto +</button>
    </form>
</section>

<!-- Elenco prodotti -->
<section class="row g-4">
    <?php foreach ($templateParams["prodotti"] as $prodotto): ?>
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="row g-0">
                <div class="col-md-3">
                    <img src="<?php echo UPLOAD_DIR."productimages/".$prodotto["Immagine"]; ?>" alt="<?php echo $prodotto["Nome"]; ?>" class="img-fluid">
                </div>
                <div class="col-md-9">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $prodotto["Nome"]; ?></h5>
                        <p class="card-text"><strong><?php echo $prodotto["Prezzo"]; ?> €</strong></p>
                        <p class="card-text text-muted">Cod di Riferimento: <?php echo $prodotto["CodID"]; ?></p>
                        <div class="d-flex justify-content-between">
                            <form action="./utils/delete-product-script.php" method="post">
                                <input type="hidden" name="idProdotto" value="<?php echo $prodotto["CodID"]; ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Elimina 🗑</button>
                            </form>
                            <form action="./index-modifica-prodotto.php" method="post">
                                <input type="hidden" name="idProdotto" value="<?php echo $prodotto["CodID"]; ?>">
                                <button type="submit" class="btn btn-secondary btn-sm">Modifica ✏️</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</section>
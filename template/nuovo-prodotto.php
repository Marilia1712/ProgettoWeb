<h1 class="text-center mb-4">Aggiungi un nuovo prodotto</h1>
<form action="./utils/add-product-script.php" method="POST" enctype="multipart/form-data" class="row g-4">
    <!-- Sezione per l'immagine del prodotto -->
    <div class="col-12">
        <label for="product-image" class="form-label">Carica immagine del prodotto:</label>
        <input type="file" id="product-image" name="product-image" accept="image/*" class="form-control" required>
    </div>

    <!-- Nome del prodotto -->
    <div class="col-md-4">
        <label for="product-name" class="form-label">Nome del prodotto:</label>
        <input type="text" id="product-name" name="product-name" placeholder="Inserisci il nome del prodotto" class="form-control" required>
    </div>

    <!-- Prezzo del prodotto -->
    <div class="col-md-4">
        <label for="product-price" class="form-label">Prezzo:</label>
        <input type="text" id="product-price" name="product-price" placeholder="Inserisci il prezzo (es. 11.90)" class="form-control" required>
        <p class="form-text">Inserisci il prezzo utilizzando il punto come separatore decimale</p>
    </div>

    <!-- Giacenza del prodotto -->
    <div class="col-md-4">
        <label for="product-store" class="form-label">Giacenza:</label>
        <input type="number" min="0" id="product-store" name="product-store" placeholder="Inserisci la giacenza del prodotto" class="form-control" required>
    </div>

    <!-- Categoria -->
    <div class="col-12">
        <label for="product-category" class="form-label">Categoria:</label>
        <select id="product-category" name="product-category[]" multiple class="form-select" required>
            <?php foreach ($templateParams["categorie"] as $categoria): ?>
                <option value="<?php echo $categoria["Nome"]; ?>"><?php echo $categoria["Nome"]; ?></option>
            <?php endforeach; ?>
        </select>
        <p class="form-text">Utilizza il tasto ctrl per selezionare più categorie</p>
    </div>

    <!-- Scheda tecnica -->
    <fieldset class="col-12">
        <legend class="h5">Scheda Tecnica</legend>
        <div class="row g-3">
            <!-- Colore -->
            <div class="col-md-4">
                <label for="product-color" class="form-label">Colore:</label>
                <input type="text" id="product-color" name="product-color" placeholder="Es. Rosso, Verde, Blu" class="form-control">
            </div>
            <!-- Composizione -->
            <div class="col-md-4">
                <label for="product-composition" class="form-label">Composizione:</label>
                <input type="text" id="product-composition" name="product-composition" placeholder="Es. 70% Lana, 30% Cotone" class="form-control">
            </div>
            <!-- Strumenti -->
            <div class="col-md-4">
                <label for="product-tools" class="form-label">Strumenti:</label>
                <input type="text" id="product-tools" name="product-tools" placeholder="Es. Ferri 3.5mm, Uncinetto 4mm" class="form-control">
            </div>
        </div>
    </fieldset>

    <!-- Pulsante per l'invio -->
    <div class="col-12 text-center">
        <button type="submit" class="btn btn-primary btn-lg">Aggiungi Prodotto</button>
    </div>
</form>



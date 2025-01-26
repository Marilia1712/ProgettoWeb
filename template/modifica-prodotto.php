<h1 class="text-center mb-4">Modifica prodotto #<?php echo $templateParams["prodotto"]["CodID"]; ?></h1>
<form action="./utils/edit-product-script.php" method="POST" enctype="multipart/form-data" class="row basic-bg mx-2 mt-3 g-4">

    <input type="hidden" name="product-id" value="<?php echo $templateParams["prodotto"]["CodID"]; ?>">

    <!-- Nome del prodotto -->
    <div class="col-md-4">
        <label style="font-weight:bold;" for="product-name" class="form-label">Nome del prodotto:</label>
        <input type="text" id="product-name" name="product-name" value="<?php echo $templateParams["prodotto"]["Nome"]; ?>" class="form-control" required>
    </div>

    <!-- Prezzo del prodotto -->
    <div class="col-md-4">
        <label style="font-weight:bold;" for="product-price" class="form-label">Prezzo:</label>
        <input type="text" id="product-price" name="product-price" value="<?php echo number_format($templateParams["prodotto"]["Prezzo"], 2, ".", ""); ?>" class="form-control" required>
        <p class="form-text">Inserisci il prezzo utilizzando il punto come separatore decimale</p>
    </div>

    <!-- Giacenza del prodotto -->
    <div class="col-md-4">
        <label style="font-weight:bold;" for="product-store" class="form-label">Giacenza:</label>
        <input type="number" min="0" id="product-store" name="product-store" value="<?php echo $templateParams["prodotto"]["Giacenza"]; ?>" class="form-control" required>
    </div>

    <!-- Categoria -->
    <div class="col-12">
        <label style="font-weight:bold;" for="product-category" class="form-label">Categoria:</label>
        <select id="product-category" name="product-category[]" multiple class="form-select" required>
            <?php foreach ($templateParams["categorie"] as $categoria): ?>
                <option value="<?php echo $categoria["Nome"]; ?>" <?php if(in_array($categoria["Nome"], $templateParams["categorieProdotto"])) echo "selected"; ?>>
                    <?php echo $categoria["Nome"]; ?>
                </option>
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
                <input type="text" id="product-color" name="product-color" value="<?php echo $templateParams["prodotto"]["Colore"]; ?>" class="form-control">
            </div>
            <!-- Composizione -->
            <div class="col-md-4">
                <label for="product-composition" class="form-label">Composizione:</label>
                <input type="text" id="product-composition" name="product-composition" value="<?php echo $templateParams["prodotto"]["Composizione"]; ?>" class="form-control">
            </div>
            <!-- Strumenti -->
            <div class="col-md-4">
                <label for="product-tools" class="form-label">Strumenti:</label>
                <input type="text" id="product-tools" name="product-tools" value="<?php echo $templateParams["prodotto"]["Strumenti"]; ?>" class="form-control">
            </div>
        </div>
    </fieldset>

    <!-- Pulsante per l'invio -->
    <div class="col-12 text-center">
        <button type="submit" class="btn-editproduct">Applica modifiche</button>
    </div>
</form>



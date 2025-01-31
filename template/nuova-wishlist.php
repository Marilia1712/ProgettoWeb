<h1 class="text-center mb-4">Crea una nuova wishlist</h1>
<form action="./utils/new-wishlist-script.php" method="POST" class="row mt-3 basic-bg mx-2 g-4">
    <!-- Nome della wishlist -->
    <div class="col-12 col-md-4">
        <label style="font-weight:bold;" for="wishlist-name" class="form-label">Nome della wishlist:</label>
        <input type="text" id="wishlist-name" name="nome" class="form-control" placeholder="Inserisci il nome della wishlist" required>
    </div>

    <!-- Descrizione della wishlist -->
    <div class="col-12 col-md-8">
        <label style="font-weight:bold;" for="wishlist-description" class="form-label">Descrizione:</label>
        <textarea id="wishlist-description" name="descrizione" class="form-control" placeholder="Inserisci una descrizione della wishlist" rows="5" required></textarea>
    </div>

    <!-- Pulsante per l'invio -->
    <div class="col-12 text-center">
        <button style="background-color:#005BAD;" type="submit" class="btn btn-primary btn-lg">Crea Wishlist</button>
    </div>
</form>
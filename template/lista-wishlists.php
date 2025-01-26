<!-- Bottone per aggiungere una nuova wishlist -->
<section class="my-4">
<a href="./index-nuova-wishlist.php">
    <button class="btn-addwishlist">Crea una nuova wishlist
        <img src="./upload/icons/plus-solid-white.svg" alt="Aggiungi" width="24">
    </button>
</a>    
    <!-- <input type="button" onclick="location.href='https://google.com';" value="Go to Google" /> -->
</section>

<!-- Elenco wishlist -->
<section class="row">
    <?php foreach($templateParams["wishlists"] as $wishlist): ?>
    <div class="col-12 mb-4">
        <div class="wishlist-card p-3 border bg-white" style="border-radius:12px;">
            <div class="wishlist-info">
                <a href="./index-prodotti-wishlist.php?IDwishlist=<?php echo $wishlist["CodID"]; ?>&nomeWishlist=<?php echo $wishlist["Nome"]; ?>">
                    <h2><?php echo $wishlist["Nome"]; ?></h2>
                </a>
                <p><?php echo $wishlist["Descrizione"]; ?></p>
                <div class="wishlist-actions">
                    <form action="./utils/delete-wishlist-script.php" method="post">
                        <input type="hidden" name="wishlistID" value="<?php echo $wishlist["CodID"]; ?>">
                        <button class="btn-removewishlist">Elimina
                            <img src="./upload/icons/trash-solid.svg" alt="Cestino" width="24">
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</section>
<section class="container py-5">
    <div class="row p-4">
        <!-- Product Image -->                                               
        <div id="imageZoom" style="--url: url(.<?php echo UPLOAD_DIR."productimages/".$prodotto["Immagine"]; ?>); --zoom-x: 0%; --zoom-y:0%; --display:none;" 
                class="col-md-5 text-center mb-4 prod-image">
            <img src="<?php echo UPLOAD_DIR."productimages/".$prodotto["Immagine"]; ?>" alt="<?php echo $prodotto["Nome"]; ?>" class="img-fluid" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        </div>
        <script>
            let imageZoom = document.getElementById('imageZoom');
                imageZoom.addEventListener('mousemove',(event)=>{
                imageZoom.style.setProperty('--display','block');

            let pointer = {
                x: (event.offsetX * 100) / imageZoom.offsetWidth,
                y: (event.offsetY * 100) / imageZoom.offsetHeight
            }
            imageZoom.style.setProperty('--zoom-x', pointer.x + '%');
            imageZoom.style.setProperty('--zoom-y', pointer.y + '%');
            })
            imageZoom.addEventListener('mouseout',()=> {
                imageZoom.style.setProperty('--display','none');
            })

        </script>

        <!-- Product Details -->
        <div class="col-md-7">
            <div class="product-info">
                <h1><?php echo $prodotto["Nome"]; ?></h1>
                <?php if($prodottoInOfferta): ?>
                    <p><del><?php echo number_format($prodotto["Prezzo"], 2, ",", ""); ?> €</del> <strong><?php echo number_format(($prodotto["Prezzo"]*(100-$prodotto["PercSconto"]))/100, 2, ",", ""); ?> $</strong></p>
                <?php else: ?>
                    <p><strong><?php echo number_format($prodotto["Prezzo"], 2, ",", ""); ?> €</strong></p>
                <?php endif; ?>

                <div>
                    <div class="schedatecnica">
                        <h2>Scheda Tecnica:</h2>
                        <ul>
                            <li>Colore: <?php if(!is_null($prodotto["Colore"])) echo $prodotto["Colore"]; else echo "--"; ?></li>
                            <li>Composizione: <?php if(!is_null($prodotto["Composizione"])) echo $prodotto["Composizione"]; else echo "--"; ?></li>
                            <li>Strumenti: <?php if(!is_null($prodotto["Strumenti"])) echo $prodotto["Strumenti"]; else echo "--"; ?></li>
                        </ul>
                    </div>
                    <p>Codice di Riferimento: <?php echo $prodotto["CodID"]; ?></p>
                </div>

                <!-- Action Buttons -->
                <div class="mt-4">

                    <!-- Cart Section -->
                    <div class="mb-3">
                        <form action="./utils/add-to-cart-script.php" method="post">
                            <input type="hidden" name="idProdotto" value="<?php echo $prodotto["CodID"]; ?>">
                            <input type="number" value="0" min="0" max="<?php echo $prodotto["Giacenza"]; ?>" class="form-control w-25 d-inline-block mx-2">
                            <button class="btn-cart">Aggiungi al Carrello
                                <img src="./upload/icons/cart-shopping-solid-white.svg" alt="Carrello" width="24">
                            </button>
                        </form>
                    </div>

                    <!-- Wishlist Section -->
                    <div class="mb-3">
                        <form action="./utils/add-to-wishlist-script.php" method="post">
                            <input type="hidden" name="idProdotto" value="<?php echo $prodotto["CodID"]; ?>">
                            <select name="idWishlist"  class="form-control w-25 d-inline-block mx-2" required>
                                <option value="" disabled selected hidden>Scegli Wishlist</option>
                                <?php foreach($templateParams["wishlists"] as $wishlist): ?>
                                    <option value="<?php echo $wishlist["CodID"]; ?>"><?php echo $wishlist["Nome"]; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button class="btn-wishlist">Aggiungi a Wishlist
                                <img src="./upload/icons/heart-solid-white.svg" alt="Wishlist" width="24">
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

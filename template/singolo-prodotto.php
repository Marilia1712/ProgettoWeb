<section class="container py-5">
    <div class="row">
        <!-- Image -->                                               
        <div class="col-md-6 text-center mb-4 image-container">
            <div id="imageZoom" style="--url: url(.<?php echo UPLOAD_DIR."productimages/".$prodotto["Immagine"]; ?>); --zoom-x: 0%; --zoom-y:0%; --display:none;" 
                    class="prod-image">
                <img src="<?php echo UPLOAD_DIR."productimages/".$prodotto["Immagine"]; ?>" alt="<?php echo $prodotto["Nome"]; ?>" class="img-fluid" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            </div>
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
        <div class="col-md-6">
            <div class="product-info">
                <h1><?php echo $prodotto["Nome"]; ?></h1>
                <?php if($prodotto["Giacenza"] > 0): ?>
                    <?php if($prodottoInOfferta): ?>
                        <p><del><?php echo number_format($prodotto["Prezzo"], 2, ",", ""); ?> €</del> <strong><?php echo number_format(($prodotto["Prezzo"]*(100-$prodotto["PercSconto"]))/100, 2, ",", ""); ?> €</strong></p>
                    <?php else: ?>
                        <p><strong><?php echo number_format($prodotto["Prezzo"], 2, ",", ""); ?> €</strong></p>
                    <?php endif; ?>
                <?php else: ?>
                    <p><strong>Attualmente non disponibile</strong></p>
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
                    <p>Codice di Riferimento: <?php echo $prodotto["CodIDProdotto"]; ?></p>
                </div>

                <!-- Buttons -->
                <?php if(isset($_SESSION["email"])): ?>
                    <div class="mt-4">

                        <!-- Cart -->
                        <div class="mb-3">
                            <form action="./utils/add-to-cart-script.php" method="post">
                                <input type="hidden" name="idProdotto" value="<?php echo $prodotto["CodIDProdotto"]; ?>">
                                <input type="number" name="quantita" value="1" min="1" max="<?php echo $prodotto["Giacenza"]; ?>" class="form-control w-25 d-inline-block mx-2" aria-label="Quantità">
                                    <button type="submit" class="btn-cart" <?php if($prodotto["Giacenza"] == 0) echo "disabled"; ?>>
                                        Aggiungi al Carrello
                                        <img src="./upload/icons/cart-shopping-solid-white.svg" alt="Carrello" width="24">
                                    </button>
                            </form>
                        </div>

                        <!-- Wishlist -->
                        <div class="mb-3">
                            <form action="./utils/add-to-wishlist-script.php" method="post">
                                <input type="hidden" name="idProdotto" value="<?php echo $prodotto["CodIDProdotto"]; ?>">
                                <select name="idWishlist"  class="form-control w-25 d-inline-block mx-2" required aria-label="Nome wishlist">
                                    <option value="" disabled selected hidden>Scegli Wishlist</option>
                                    <?php foreach($templateParams["wishlists"] as $wishlist): ?>
                                        <option value="<?php echo $wishlist["CodID"]; ?>"><?php echo $wishlist["Nome"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <button type="submit" class="btn-wishlist">
                                    Aggiungi a Wishlist&nbsp
                                    <img src="./upload/icons/heart-solid-white.svg" alt="Wishlist" width="24">
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

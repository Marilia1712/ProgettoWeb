<!-- SEZIONE DEDICATA AGLI AVVISI -->
<section class="notifications container py-4">
    <h1 class="mb-4">Avvisi</h1>

    <?php foreach($templateParams["inbox"] as $notification): ?>
        <div class="row mb-3">
            <div class="notification col-12 bg-white p-3 shadow-sm rounded position-relative">
                <!-- Notification content -->
                <?php if($notification["Letta"]): ?>
                    <h2 style="color:grey;"><?php echo $notification["Titolo"]; ?></h2>
                    <?php else: ?>
                    <h2><?php echo $notification["Titolo"]; ?></h2>  
                <?php endif; ?>
                <?php if($notification["Letta"]): ?>
                        <p style="color:grey;" class="datetime text-muted">Data: <?php echo $notification["Data"]; ?>, Ore: <?php echo $notification["Ora"]; ?></p>
                        <p style="color:grey;" ><?php echo $notification["Contenuto"]; ?></p>
                    <?php else: ?>
                        <p class="datetime text-muted">Data: <?php echo $notification["Data"]; ?>, Ore: <?php echo $notification["Ora"]; ?></p>
                        <p><?php echo $notification["Contenuto"]; ?></p>
                <?php endif; ?>

                <!-- Icons at the bottom-right -->
                <div class="d-flex justify-content-end align-items-center gap-2 " style="bottom: 10px; right: 10px;">
                    <?php if($notification["Letta"]): ?>
                        <form action="./utils/unread-notification-script.php" method="POST">
                            <input type="hidden" name="idAvviso" value="<?php echo $notification["CodID"]; ?>" />
                            <button type="submit" class="btn btn-link p-0">
                                <img src="./upload/icons/read-icon.svg" alt="Segna come non letto" width="32">
                            </button>
                        </form>
                    <?php else: ?>
                        <form action="./utils/read-notification-script.php" method="POST">
                            <input type="hidden" name="idAvviso" value="<?php echo $notification["CodID"]; ?>" />
                            <button type="submit" class="btn btn-link p-0">
                                <img src="./upload/icons/unread-icon.svg" alt="Segna come letto" width="32">
                            </button>
                        </form>
                    <?php endif; ?>
                    <form action="./utils/delete-notification-script.php" method="POST">
                        <input type="hidden" name="idAvviso" value="<?php echo $notification["CodID"]; ?>" />
                        <button type="submit" class="btn btn-link p-0">
                            <img src="./upload/icons/trash-solid-white.svg" alt="Elimina notifica" width="32">
                        </button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</section>

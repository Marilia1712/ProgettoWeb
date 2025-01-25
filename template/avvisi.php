<!-- SEZIONE DEDICATA AGLI AVVISI -->
<section class="notifications container py-4">
    <h1 class="mb-4">Avvisi</h1>

    <?php foreach($templateParams["inbox"] as $notification): ?>
        <div class="row mb-3 align-items-center">
            <div class="col-auto">
                <?php if($notification["Letta"]): ?>
                    <form action="./utils/unread-notification-script.php" method="POST">
                        <input type="hidden" name="idAvviso" value="<?php echo $notification["CodID"]; ?>" />
                        <button type="submit" class="btn btn-link">
                            <img src="./upload/icons/read-icon.svg" alt="Sign as unread" width=32">
                        </button>
                    </form>
                <?php else: ?>
                    <form action="./utils/read-notification-script.php" method="POST">
                        <input type="hidden" name="idAvviso" value="<?php echo $notification["CodID"]; ?>" />
                        <button type="submit" class="btn btn-link">
                            <img src="./upload/icons/unread-icon.svg" alt="Sign as read" width=32">
                        </button>
                    </form>
                <?php endif; ?>
                <form action="./utils/delete-notification-script.php" method="POST">
                    <input type="hidden" name="idAvviso" value="<?php echo $notification["CodID"]; ?>" />
                    <button type="submit" class="btn btn-link">
                        <img src="./upload/icons/trash-red-solid.svg" alt="Delete notification" width=32">
                    </button>
                </form>
            </div>
            <div class="col-12 bg-white p-3 shadow-sm rounded">
                <h2><?php echo $notification["Titolo"]; ?></h2>
                <p class="datetime text-muted">Data: <?php echo $notification["Data"]; ?>, Ore: <?php echo $notification["Ora"]; ?></p>
                <p><?php echo $notification["Contenuto"]; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</section>

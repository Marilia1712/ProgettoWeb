<!-- SEZIONE DEDICATA AGLI AVVISI -->
<section class="notifications container py-4">
    <h1 class="mb-4">Avvisi</h1>

    <?php foreach($templateParams["inbox"] as $notification): ?>
        <div class="row mb-3 align-items-center">
            <div class="col-auto">
                <button class="btn btn-link">
                    <img src="./upload/icons/unread-icon.svg" alt="Unread" width="24">
                </button>
            </div>
            <div class="col-12 bg-white p-3 shadow-sm rounded">
                <h2><?php echo $notification["Titolo"]; ?></h2>
                <p class="datetime text-muted">Data: <?php echo $notification["Data"]; ?>, Ore: <?php echo $notification["Ora"]; ?></p>
                <p><?php echo $notification["Contenuto"]; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</section>

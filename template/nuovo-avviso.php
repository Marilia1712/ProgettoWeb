<h1 class="text-center mb-4">Invia un nuovo avviso agli utenti</h1>
<form action="./utils/send-notification-script.php" method="POST" class="row g-4">

    <!-- Titolo avviso -->
    <div class="col-12">
        <label for="notification-title" class="form-label">Titolo dell'avviso:</label>
        <input type="text" id="notification-title" name="notification-title" placeholder="Inserisci il titolo dell'avviso" class="form-control" required>
    </div>

    <!-- Contenuto -->
    <div class="col-12">
        <label for="notification-content" class="form-label">Contenuto dell'avviso:</label>
        <textarea name="notification-content" id="notification-content" placeholder="Inserisci il contenuto dell'avviso" class="form-control" required></textarea>
    </div>

    <!-- Pulsante per l'invio -->
    <div class="col-12 text-center">
        <button type="submit" class="btn btn-primary btn-lg">Invia avviso</button>
    </div>
</form>



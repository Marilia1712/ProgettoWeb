<div class="row justify-content-center">
    <!-- Sezione Login -->
    <div class="col-12 col-md-6 mb-5">
        <h1 class="text-center mb-4">Accedi</h1>
        <?php if (isset($_GET["wrongPassword"])): ?>
            <h3>Password errata, riprovare</h3>
        <?php endif; ?>
        <?php if (isset($_GET["notRegistered"])): ?>
            <h3>Non sei ancora registrato nel nostro sito!</h3>
        <?php endif; ?>
        <form action="./utils/check-login.php" method="POST" class="needs-validation">
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Accedi</button>
            </div>
        </form>
    </div>

    <!-- Sezione Registrazione -->
    <div class="col-12 col-md-6">
        <h1 class="text-center mb-4">Registrati</h1>
        <?php if (isset($_GET["alreadyRegistered"])): ?>
            <h3>Sei già registrato nel nostro sito!</h3>
        <?php endif; ?>
        <form action="./utils/check-signup.php" method="POST" class="needs-validation">
            <div class="mb-3">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="cognome">Cognome</label>
                <input type="cognome" id="cognome" name="cognome" required>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-lg">Registrati</button>
            </div>
        </form>
    </div>
</div>

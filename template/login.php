<section class="basic-bg mx-2">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <!-- Sezione Login -->
            <div class="col-12 col-md-6 mb-5 d-flex flex-column align-items-center">
                <h1 class="text-center mb-4">Accedi</h1>
                <form action="./utils/check-login-script.php" method="POST" class="needs-validation w-75">
                    <?php if (isset($_GET["wrongPassword"])): ?>
                        <h3 class="text-center text-danger">Password errata, riprovare</h3>
                    <?php endif; ?>
                    <?php if (isset($_GET["notRegistered"])): ?>
                        <h3 class="text-center text-warning">Non sei ancora registrato nel nostro sito!</h3>
                    <?php endif; ?>
                    <?php if (isset($_GET["notVerified"])): ?>
                        <h3 class="text-center text-warning">Stiamo attendendo che verifichi il tuo indirizzo email, controlla la casella di posta!</h3>
                    <?php endif; ?>
                    <?php if (isset($_GET["verified"])): ?>
                        <h3 class="text-center text-success">Email verificata, effettua il login!</h3>
                    <?php endif; ?>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg" style="background-color:#005BAD; color:#fff;">Accedi</button>
                    </div>
                </form>
            </div>

            <!-- Sezione Registrazione -->
            <div class="col-12 col-md-6 d-flex flex-column align-items-center">
                <h1 class="text-center mb-4">Registrati</h1>
                <?php if (isset($_GET["alreadyRegistered"])): ?>
                    <h3 class="text-center text-info">Sei già registrato nel nostro sito!</h3>
                <?php endif; ?>
                <form action="./utils/check-signup-script.php" method="POST" class="needs-validation w-75">
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <label for="cognome">Cognome</label>
                            <input type="text" id="cognome" name="cognome" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg" style="background-color:#005BAD; color:#fff;">Registrati</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

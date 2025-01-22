<div>
    <!-- Sezione Login -->
    <div>
        <h1>Accedi</h1>
        <?php if (isset($_GET["wrongPassword"])): ?>
            <h3>Password errata, riprovare</h3>
        <?php endif; ?>
        <?php if (isset($_GET["notRegistered"])): ?>
            <h3>Non sei ancora registrato nel nostro sito!</h3>
        <?php endif; ?>
        <form action="./utils/check-login.php" method="POST">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" required>
            <br><br>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <button type="submit">Accedi</button>
        </form>
    </div>
    <br><br>
    <!-- Sezione Registrazione -->
    <div>
        <h1>Registrati</h1>
        <?php if (isset($_GET["alreadyRegistered"])): ?>
            <h3>Sei già registrato nel nostro sito!</h3>
        <?php endif; ?>
        <form action="./utils/check-signup.php" method="POST">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" required>
            <br><br>
            <label for="cognome">Cognome</label>
            <input type="cognome" id="cognome" name="cognome" required>
            <br><br>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <br><br>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <button type="submit">Registrati</button>
        </form>
    </div>
    <br><br>
</div>
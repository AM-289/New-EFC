<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Login_signup.css">
</head>
<body>
    <?php
        include_once 'header.html';
    ?>

    <form class="login" action="" method="POST">
        <fieldset>
            <legend>Connexion</legend>
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            <p>Mot de passe oublié ? <a href="reset_password.php">Réinitialiser le mot de passe</a></p>
            <button type="submit">Se connecter</button>
            <p>Pas encore de compte ? <!--a href="inscription.php"--><span onclick="signup()">Créez-en un ici</span></p>
        </fieldset>
    </form>

    <form class="sign_up" action="" method="POST">
        <fieldset>
            <legend>Créer un compte :</legend>
            <input type="text" id="new_username" name="new_username" placeholder="Nom d'utilisateur" required>
            <input type="email" id="new_email" name="new_email" placeholder="Email" required>
            <input type="password" id="new_password" name="new_password" placeholder="Mot de passe" required>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmer le mot de passe" required>
            <div class="terms">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">En créant un compte, vous acceptez nos <a href="terms.php">conditions d'utilisation</a>.</label>
            </div>
            <button type="submit">Créer un compte</button>
            <p>Déjà un compte ? <span onclick="login()">Connectez-vous ici</span></p>
        </fieldset>
    </form>

    <script>
        function signup() {
            document.querySelector('.sign_up').style.display = 'flex';
            document.querySelector('.login').style.display = 'none';
        }

        function login() {
            document.querySelector('.login').style.display = 'flex';
            document.querySelector('.sign_up').style.display = 'none';
        }

    </script>

    <?php
        include_once 'footer.html';
    ?>
</body>
</html>
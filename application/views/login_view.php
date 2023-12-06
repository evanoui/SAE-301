<!-- login_view.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>

    <h2>Connexion</h2>
    
    <?php echo validation_errors(); ?>

    <?php if(isset($error_message)) echo '<p>'.$error_message.'</p>'; ?>

    <?php echo form_open('users/login'); ?>

    <label for="login">Nom d'utilisateur</label>
    <input type="text" name="username" required>

    <label for="password">Mot de passe</label>
    <input type="password" name="password" required>

    <button type="submit">Se connecter</button>

    <?php echo form_close(); ?>

    

</body>
</html>

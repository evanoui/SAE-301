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

    <?php if ($user_is_logged_in): ?>
        <!-- Afficher le lien de déconnexion uniquement lorsque l'utilisateur est connecté -->
        <p>Bienvenue, <?php echo $user->login; ?> | <a href="<?php echo base_url('users/logout'); ?>">Déconnexion</a></p>
    <?php else: ?>
        <!-- Afficher le lien de connexion uniquement lorsque l'utilisateur n'est pas connecté -->
        <p><a href="<?php echo base_url('users/login'); ?>">Connexion</a></p>
    <?php endif; ?>

</body>
</html>

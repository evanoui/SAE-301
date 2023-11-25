<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un utilisateur</title>
</head>
<body>

    <h2>Créer un nouvel utilisateur</h2>

    <?php echo validation_errors(); ?>

    <?php echo form_open('users/create'); ?>

        <label for="login">Nom d'utilisateur:</label>
        <input type="text" name="login" value="<?php echo set_value('login'); ?>">

        <label for="password">Mot de passe:</label>
        <input type="password" name="password">

        <label for="nom">Nom:</label>
        <input type="text" name="nom" value="<?php echo set_value('nom'); ?>">

        <label for="prenom">Prénom:</label>
        <input type="text" name="prenom" value="<?php echo set_value('prenom'); ?>">

        <label for="ddn">Date de naissance:</label>
        <input type="date" name="ddn" value="<?php echo set_value('ddn'); ?>">

        <label for="email">Adresse e-mail:</label>
        <input type="text" name="email" value="<?php echo set_value('email'); ?>">

        <label for="type_utilisateur">Type d'utilisateur:</label>
        <input type="text" name="type_utilisateur" value="<?php echo set_value('type_utilisateur'); ?>">

        <input type="submit" value="Créer un utilisateur">

    <?php echo form_close(); ?>

</body>
</html>

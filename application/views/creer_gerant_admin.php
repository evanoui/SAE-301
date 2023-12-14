<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>
        <?php echo $content; ?> - CodeIgniter 3 Tutorial
    </title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/inscription.css'); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400;500;600;700;800;900&family=Source+Code+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&family=Source+Code+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <header>
        <div class="contain1">
            <h1><a href="..">Dicathlon</a></h1>
        </div>
        <div class="contain2"><input type="text" class="recherche" placeholder="Que recherchez vous ?"></div>

        <div class="contain4">
            <div class="box"><img class="icone" src="<?php echo base_url('img/compte.svg'); ?>"
                    alt="Description de l'image">
                <h3>Compte</h3>
            </div>
            <div class="box"><img class="icone" src="<?php echo base_url('img/reservation.svg'); ?>"
                    alt="Description de l'image">
                <h3>Réservations</h3>
            </div>
            <div class="box"><img class="icone" src="<?php echo base_url('img/aide.svg'); ?>"
                    alt="Description de l'image">
                <h3>Aide/FAQ</h3>
            </div>
        </div>
    </header>

    <h2>Créer un nouvel utilisateur</h2>

    <?php echo validation_errors(); ?>

    <?php echo form_open('users/create'); ?>
    <div class="conteneur_connexion">
        <label for="login">Nom d'utilisateur:</label>
        <input class="saisi" type="text" name="login" value="<?php echo set_value('login'); ?>">

        <label for="password">Mot de passe:</label>
        <input class="saisi" type="password" name="password">
        
        <label for="nom">Nom:</label>
        <input class="saisi" type="text" name="nom" value="<?php echo set_value('nom'); ?>">

        <label for="prenom">Prénom:</label>
        <input class="saisi" type="text" name="prenom" value="<?php echo set_value('prenom'); ?>">

        <label for="ddn">Date de naissance:</label>
        <input class="saisi" type="date" name="ddn" value="<?php echo set_value('ddn'); ?>">

        <label for="email">Adresse e-mail:</label>
        <input class="saisi" type="text" name="email" value="<?php echo set_value('email'); ?>">

        <label for="type_utilisateur">Type d'utilisateur:</label>
        <input class="saisi" type="text" name="type_utilisateur" value="<?php echo set_value('type_utilisateur'); ?>">

        <div class='conteneur_bouton'>
            <button class="bouton" type="submit" value="Créer un utilisateur">Créer un utilisateur</button>
        </div>
    </div>
    <?php echo form_close(); ?>
</body>
</html>
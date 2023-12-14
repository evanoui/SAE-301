<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>
        <?php echo $content; ?> - CodeIgniter 3 Tutorial
    </title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/catalogue.css'); ?>">
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
    <div class="conteneur_categories">
        <div class="categorie">
            <h2><a href="..">Accueil</a></h2>
        </div>
        <div class="categorie">
            <h2><a href="../produits/list">Catalogue</a></h2>
        </div>
        <div class="categorie">
            <h2>Nouveauté</h2>
        </div>
    </div>

    <body>
        <h1>Félicitation, vous venez de créer un nouvel utilisateur !</h1>
    </body>
</html>
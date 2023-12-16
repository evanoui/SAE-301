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
        <div class="box"><img class="icone" src="<?php echo base_url('img/aide.svg'); ?>" alt="Description de l'image">
            <h3>Aide/FAQ</h3>
        </div>
    </div>
</header>

<body>
<form method="post" action="<?php echo base_url('index.php/users/delete_account'); ?>">
    <!-- ... autres champs du formulaire ... -->

    <!-- Champ de confirmation -->
    <label for="confirm">Confirmer la suppression du compte :</label>
    <input type="checkbox" name="confirm" id="confirm" value="1">

    <!-- Bouton de soumission -->
    <input type="submit" value="Supprimer mon compte">
</form>


    <h2>Liste des Utilisateurs</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom d'utilisateur</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de Naissance</th>
            <th>Email</th>
            <th>Type d'Utilisateur</th>
            <th>Action</th>
        </tr>

        <?php
        // Récupérez l'utilisateur connecté depuis la session
        $connected_user = $this->User_model->get_user($this->session->userdata('user_id'));

        // Vérifiez si l'utilisateur est connecté avant d'afficher les informations
        if ($connected_user) :
        ?>
            <tr>
                <td><?php echo $connected_user->id; ?></td>
                <td><?php echo $connected_user->login; ?></td>
                <td><?php echo $connected_user->nom; ?></td>
                <td><?php echo $connected_user->prenom; ?></td>
                <td><?php echo $connected_user->ddn; ?></td>
                <td><?php echo $connected_user->email; ?></td>
                <td><?php echo $connected_user->type_utilisateur; ?></td>
                <td>
                    <!---Suppression utilisateur-->
                    <a href="<?php echo base_url('index.php/users/delete_account'); ?>"
                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ?')">Supprimer</a>
                </td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>
        <?php echo $content; ?> - CodeIgniter 3 Tutorial
    </title>
    <link rel = "stylesheet" type = "text/css" 
   href = "<?php echo base_url('css/inscription.css'); ?>">
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400;500;600;700;800;900&family=Source+Code+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&family=Source+Code+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

     
<header>
    <div class="contain1"><h1><a href="..">Dicathlon</a></h1></div>
    <div class="contain2"><input type="text" class="recherche" placeholder="Que recherchez vous ?"></div>
    
    <div class="contain4">
    <div class="box"><img class="icone" src="<?php echo base_url('img/compte.svg'); ?>" alt="Description de l'image"><h3>Compte</h3></div>
    <div class="box"><img class="icone" src="<?php echo base_url('img/reservation.svg'); ?>" alt="Description de l'image"><h3>Réservations</h3></div>
    <div class="box"><img class="icone" src="<?php echo base_url('img/aide.svg'); ?>" alt="Description de l'image"><h3>Aide/FAQ</h3></div>
    </div>
    </header>
<body>
    

<h2>Mon Compte</h2>
<h1>Bienvenue, <?php echo $this->session->userdata('username'); ?> !</h1>

<form action="<?php echo base_url('index.php/users/delete_account'); ?>" method="post">
    <input type="hidden" name="confirm" value="true">
    <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ?')">Supprimer mon compte</button>
</form>


                    <!-- Dans votre vue ou tableau affichant les utilisateurs -->
                    <a href="<?php echo base_url('index.php/users/delete_account'); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ?')">Supprimer mon compte</a>







</body>

</html>

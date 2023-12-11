<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>
        <?php echo $content; ?> - CodeIgniter 3 Tutorial
    </title>
    <link rel = "stylesheet" type = "text/css" 
   href = "<?php echo base_url('css/index.css'); ?>">
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400;500;600;700;800;900&family=Source+Code+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&family=Source+Code+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    
        
    <header>
    <div class="contain1"><h1>Dicathlon</h1></div>
    <div class="contain2"><input type="text" class="recherche" placeholder="Que recherchez vous ?"></div>
    <div class="contain3">
    <h1>Bienvenue, <?php echo $this->session->userdata('username'); ?> !</h1>

        <?php if ($this->session->userdata('username')): ?>
        <!-- Afficher le bouton de déconnexion uniquement si l'utilisateur est connecté -->
        <form action="<?php echo base_url('index.php/users/logout'); ?>" method="post">
            <button class="bouton" type="submit">Déconnexion</button>
        </form>
        
        <?php else: ?>
        
    <!-- Afficher le bouton "Se connecter" qui redirige vers le formulaire de connexion -->
    
    <a href="<?php echo base_url('index.php/users/login'); ?>"><button>Se connecter</button></a>
<?php endif; ?>
</div>
    <div class="contain4">
    <div class="box"><img class="icone" src="<?php echo base_url('img/compte.svg'); ?>" alt="Description de l'image"><h3>Compte</h3></div>
    <div class="box"><img class="icone" src="<?php echo base_url('img/reservation.svg'); ?>" alt="Description de l'image"><h3>Réservations</h3></div>
    <div class="box"><img class="icone" src="<?php echo base_url('img/aide.svg'); ?>" alt="Description de l'image"><h3>Aide/FAQ</h3></div>
    </div>
    </header>
    <div class="conteneur_categories">
    <div class="categorie"><h2>Accueil</h2></div>
    <div class="categorie"><h2><a href="produits/list_client">Catalogue</a></h2></div>
    <div class="categorie"><h2>Nouveauté</h2></div>
    </div>
        </div><!-- # entete -->
        <div id="contenu">
        <h1>Vos Recommandations</h1>
        <div class="part_recommandation">
        <div class="carousselle" id="1">
            <div class="description">Venez découvrir notre nouvelle gamme de <u>tapis roulant</u></div>
            <div class="boutton">Découvrir</div>
        </div>
        </div>
        <h1>Vos recherches récentes</h1>
        <div class="part_recherche-recentes">
            <div class="box">
                <h2>Tapis Roulant</h2>
                <img src="<?php echo base_url('img\article_recherche-recentes.png'); ?>" alt="Tapis de course">
                <div class="info">
                    <button>Réserver</button>
                    <p>35€/jour</p>
                </div>
            </div>
            <div class="box">
                <h2>Tapis Roulant</h2>
                <img src="<?php echo base_url('img\article_recherche-recentes.png'); ?>" alt="Tapis de course">
                <div class="info">
                    <button>Réserver</button>
                    <p>35€/jour</p>
                </div>
            </div>
            <div class="box">
                <h2>Tapis Roulant</h2>
                <img src="<?php echo base_url('img\article_recherche-recentes.png'); ?>" alt="Tapis de course">
                <div class="info">
                    <button>Réserver</button>
                    <p>35€/jour</p>
                </div>
            </div>
        </div>
            
        </div>


        
   
        </div><!-- # contenu -->
        
<footer>
    <div class="conteneur_footer">
    <div class="conteneur_info">
    <div class="info"><h3>Notre entreprise</h3>
<p>Qui sommes nous ?</p>
<p>Nos magasins</p></div>

    <div class="info"><h3>Besoin d'aide ?</h3>
    <p>Modes de livraison</p>
<p>Retour et échange</p></div>

    <div class="info"><h3>Faire du sport</h3>
    <p>Conseils sportifs</p>
<p>Appli de sport gratuite</p></div>
<div class="info"><h3>Nos services</h3>
    <p>Entretenir et réparer</p>
<p>Louer votre matériel</p></div>
    </div>
    <p>Dicathlon 2023 ©</p>
    </div>
    
</footer>

</body>

</html>

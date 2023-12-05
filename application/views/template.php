<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>
        <?php echo $content; ?> - CodeIgniter 3 Tutorial
    </title>
    <link rel = "stylesheet" type = "text/css" 
   href = "<?php echo base_url('css/style.css'); ?>">
</head>

<body>
    <div id="global">
        <div id="entete">
        <div class="header">
    <div class="contain1"><h1>Dicathlon</h1></div>
    <div class="contain2"><div class="box"><input type="text"></div><img src="" alt=""></div>
    <div class="contain3">
    <div class="box"><img src="" alt=""><h3>Compte</h3></div>
    <div class="box"><img src="" alt=""><h3>Réservations</h3></div>
    <div class="box"><img src="" alt=""><h3>Aide/FAQ</h3></div></div>
    </div>
        </div><!-- # entete -->
        <div id="contenu">
        <h1>Bienvenue, <?php echo $this->session->userdata('username'); ?>!</h1>
        
        <?php if ($this->session->userdata('username')): ?>
        <!-- Afficher le bouton de déconnexion uniquement si l'utilisateur est connecté -->
        <form action="<?php echo base_url('index.php/users/logout'); ?>" method="post">
            <button type="submit">Déconnexion</button>
        </form>
    <?php endif; ?>
   
        </div><!-- # contenu -->
        <div id="pied">
            <strong>&copy;2021</strong>
        </div><!--#pied-->
    </div><!--#global-->
</body>

</html>

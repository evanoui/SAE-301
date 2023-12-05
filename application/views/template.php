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
            <?php $this->load->view($content); ?>
        </div><!-- # contenu -->
        <div id="pied">
            <strong>&copy;2021</strong>
        </div><!--#pied-->
    </div><!--#global-->
</body>

</html>
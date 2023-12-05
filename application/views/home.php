<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" type = "text/css" 
   href = "<?php echo base_url(); ?>css/style.css">
    
</head>
<body>
    <h1>Page home</h1>
     <!-- template.php ou autre fichier -->
<!-- ... votre contenu précédent ... -->
<?php if ($this->session->userdata('username')) : ?>
    <a href="<?php echo base_url('logout'); ?>">Déconnexion</a>
<?php endif; ?>
<!-- ... votre contenu suivant ... -->

    ?>
</body>
</html>

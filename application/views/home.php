<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Lien vers votre fichier CSS, si nécessaire -->
    <link rel="stylesheet" href="">
</head>
<body>
    <h1>Home</h1>

    <?php
    // Chargement de la bibliothèque de base de données
    $this->load->database();

    // Exécution de la requête pour sélectionner tous les produits
    $query = $this->db->get('produit');

    // Vérification s'il y a des résultats
    if ($query->num_rows() > 0) {
        // Affichage des résultats
        foreach ($query->result() as $row) {
            echo 'ID: ' . $row->id . '<br>';
            echo 'Type: ' . $row->type . '<br>';
            echo 'Description: ' . $row->description . '<br>';
            echo 'Marque: ' . $row->marque . '<br>';
            echo 'Modèle: ' . $row->modele . '<br>';
            echo 'Prix de location: ' . $row->prix_location . '<br>';
            echo 'État: ' . $row->etat . '<br>';
            echo '<hr>';
        }
    } else {
        echo 'Aucun produit trouvé.';
    }
    ?>
</body>
</html>

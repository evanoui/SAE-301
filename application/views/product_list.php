<!-- product_list.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
</head>
<body>

    <h2>Liste des Produits</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Description</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Prix de Location</th>
            <th>État</th>
            <th>Action</th>
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product->id; ?></td>
                <td><?php echo $product->type; ?></td>
                <td><?php echo $product->description; ?></td>
                <td><?php echo $product->marque; ?></td>
                <td><?php echo $product->modele; ?></td>
                <td><?php echo $product->prix_location; ?></td>
                <td><?php echo $product->etat; ?></td>
                <td>
                    <a href="<?php echo base_url('index.php/produits/delete/' . $product->id); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>

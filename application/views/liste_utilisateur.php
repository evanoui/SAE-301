<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
</head>

<body>

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
        <?php foreach ($users as $user): ?>
            <tr>
                <td>
                    <?php echo $user->id; ?>
                </td>
                <td>
                    <?php echo $user->login; ?>
                </td>
                <td>
                    <?php echo $user->nom; ?>
                </td>
                <td>
                    <?php echo $user->prenom; ?>
                </td>
                <td>
                    <?php echo $user->ddn; ?>
                </td>
                <td>
                    <?php echo $user->email; ?>
                </td>
                <td>
                    <?php echo $user->type_utilisateur; ?>
                </td>
                <td>
                    <!---Suppression utilisateur-->
                    <a href="<?php echo base_url('index.php/users/delete/' . $user->id); ?>"
                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
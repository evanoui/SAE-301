<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Utilisateur</title>
</head>
<body>
    <h2>Ajouter un Utilisateur</h2>
    <?php echo form_open('user/add'); ?>
        <label for="login">Login :</label>
        <input type="text" name="login" required><br>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required><br>

        <label for="nom">Nom :</label>
        <input type="text" name="nom" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" required><br>

        <label for="ddn">Date de Naissance :</label>
        <input type="date" name="ddn" required><br>

        <label for="email">Email :</label>
        <input type="email" name="email" required><br>

        <label for="type_utilisateur">Type d'Utilisateur :</label>
        <select name="type_utilisateur" required>
            <option value="client">Client</option>
            <option value="agent">Agent</option>
            <option value="admin">Admin</option>
        </select><br>

        <input type="submit" value="Ajouter">
    <?php echo form_close(); ?>
</body>
</html>

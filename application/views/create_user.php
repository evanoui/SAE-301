<h2>Créer un nouvel utilisateur</h2>
<?php echo validation_errors(); ?>
<?php $this->load->database(); ?>
<?php echo form_open('users/create'); ?>
    <label for="login">Login :</label>
    <input type="text" name="login" required><br>

    <label for="password">Mot de passe :</label>
    <input type="password" name="password" required><br>

    <label for="nom">Nom :</label>
    <input type="text" name="nom" required><br>

    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" required><br>

    <label for="ddn">Date de naissance :</label>
    <input type="date" name="ddn" required><br>

    <label for="email">Email :</label>
    <input type="email" name="email" required><br>

    <label for="type_utilisateur">Type d'utilisateur :</label>
    <input type="text" name="type_utilisateur" required><br>

    <button type="submit">Créer l'utilisateur</button>
</form>

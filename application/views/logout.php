<?php
session_start();
session_destroy();

// Redirigez vers la page de connexion
header("Location: login.php");
exit();
?>
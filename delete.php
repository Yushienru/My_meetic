<?php
session_start();
require "my_meetic.php";
$user->delete($_SESSION['user_id']);
session_destroy();
header('location: index.php');
echo "Votre compte a bien été supprimé!";

?>

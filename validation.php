<?php
require('config/config.php');
require('model/functions.fn.php');
session_start();

if(	isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) &&
	!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {

    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $message = '';

    if (!isUsernameAvailable($db, $email)) {
        $message = 'Erreur : Ce nom d\'utilisateur est déjà utilisé';
    } elseif (!isEmailAvailable($db, $email)) {
        $message = 'Erreur : Cette adresse email est déjà utilisée';
    } else {
        userRegistration($db, $username, $email, $password);
        header('Location: login.php');
    }

    $_SESSION['message'] = $message;
    header('Location: register.php');

} else{
	$_SESSION['message'] = 'Erreur : Formulaire incomplet';
	header('Location: register.php');
}

<?php session_start();

/******************************** 
	 DATABASE & FUNCTIONS 
********************************/
require('config/config.php');
require('model/functions.fn.php');


/********************************
			PROCESS
********************************/

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password)){
        $connectionResult = userConnection($db, $email, $password);

        if($connectionResult) {
            header('Location: dashboard.php');
            exit;
        } else {
            $error = 'Mauvais identifiants';
        }
    }else{
        $error = 'Champs requis !';
    }
}

/******************************** 
			VIEW 
********************************/
include 'view/_header.php';
include 'view/login.php';
include 'view/_footer.php';
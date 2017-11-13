<?php
    require 'partials/database.php';

//FUNGERANDE FÖR username och password:

//if((!empty($_POST["username"])) && (!empty($_POST["password"]))){
//
//    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
//    $username = $_POST["username"];
//
//    $statement = $pdo->prepare("
//      INSERT INTO users (username, password)
//      VALUES (:username, :password)");
//
//    $statement->execute(array(
//      ":username" => $username,
//      ":password" => $password
//    )); 
//
//    header("Location: ../registration_success.php");
//    
//} else {
//    header("Location: ../index.php?registration_error=true");
//    
//}

if((!empty($_POST["username"])) && (!empty($_POST["password"])) && (!empty($_POST["email"])) && (!empty($_POST["firstname"])) && (!empty($_POST["lastname"]))){

    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $username = $_POST["username"];
    $email = $_POST["email"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];

    $statement = $pdo->prepare("
      INSERT INTO users (username, password, email, firstname, lastname)
      VALUES (:username, :password, :email, :firstname, :lastname)");

    $statement->execute(array(
      ":username" => $username,
      ":password" => $password,
      ":email" => $email,
      ":firstname" => $firstname,
      ":lastname" => $lastname
    )); 

    header("Location: partials/registration_success.php");
    
} else {
    header("Location: ../registration_login_form.php?registration_error=true");
    
}
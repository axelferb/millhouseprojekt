<?php
    require 'partials/database.php';

$checkUsername = $_POST["username"];

$statement = $pdo->prepare("SELECT username FROM users WHERE username = :name");
$statement->bindParam(':name', $checkUsername);
$statement->execute();

if($statement->rowCount() > 0){
    header("Location: ../registration_login_form.php?username_already_taken=true");
    }elseif   ((!empty($_POST["username"]))
            && (!empty($_POST["password"]))
            && (!empty($_POST["email"])) 
            && (!empty($_POST["firstname"]))
            && (!empty($_POST["lastname"]))){
    
    

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
    
}else{
    header("Location: ../registration_login_form.php?registration_error=true");
    
}

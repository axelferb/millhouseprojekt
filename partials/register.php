<?php
    require 'database.php';

//STATEMENT FOR USERNAME CHECK
$checkUsername = $_POST["username"];

$usernameStatement = $pdo->prepare("SELECT username FROM users WHERE username = :name");
$usernameStatement->bindParam(':name', $checkUsername);
$usernameStatement->execute();

//STATMENT FOR EMAIL CHECK  
$checkEmail = $_POST["email"];

$emailStatement = $pdo->prepare("SELECT email FROM users WHERE email = :email");
$emailStatement->bindParam(':email', $checkEmail);
$emailStatement->execute();


//CHECKS IN THE DATABASE IF THE USERNAME IS ALREADY BEING USED
if(($usernameStatement->rowCount() > 0 ) && (!empty($_POST["username"]))){
    header("Location: ../register_form.php?username_already_taken=true");
    
//CHECKS IN THE DATABASE IF THE EMAIL IS ALREADY BEING USED    
}elseif(($emailStatement->rowCount() > 0) && (!empty($_POST["email"]))){
    header("Location: ../register_form.php?email_already_taken=true");
    
//IF THE USERNAME AND EMAIL IS NOT BEING USED AND ALL THE FIELDS ARE FILLED IN CORRECTLY THE DATABASE WILL BE UPDATED WITH THE USER INFORMATION.     
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

    header("Location: ../login_form.php?register_success=Grattis! Du är nu registrerad och kan logga in:");
    
}else{
        header("Location: ../register_form.php?registration_error=true");

}

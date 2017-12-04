<?php
    require 'database.php';

// MAN SKA INTE KUNNA REGISTRERA FLERA ANVÄNDARE MED SAMMA USERNAME 
$checkUsername = $_POST["username"];

$usernameStatement = $pdo->prepare("SELECT username FROM users WHERE username = :name");
$usernameStatement->bindParam(':name', $checkUsername);
$usernameStatement->execute();

//SLUT USERNAME-KOLL

// MAN SKA INTE KUNNA REGISTRERA SAMMA EMAIL FLER ÄN EN GÅNG 
$checkEmail = $_POST["email"];

$emailStatement = $pdo->prepare("SELECT email FROM users WHERE email = :email");
$emailStatement->bindParam(':email', $checkEmail);
$emailStatement->execute();

// SLUT EMAIL-KOLL

if(($usernameStatement->rowCount() > 0 ) && (!empty($_POST["username"]))){
    header("Location: ../register_form.php?username_already_taken=true");
    
}elseif(($emailStatement->rowCount() > 0) && (!empty($_POST["email"]))){
    header("Location: ../register_form.php?email_already_taken=true");
    
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

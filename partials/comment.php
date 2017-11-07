<?php
    require 'database.php';

    $name = $_POST["name_comment"];
    $email = $_POST["email_comment"];
    $comment = $_POST["new_comment"];

    $statement = $pdo->prepare("
      INSERT INTO comments (name_comment, email_comment, new_comment)
      VALUES (:name, :email, :comment)");

    $statement->execute(array(
      ":name" => $name,
      ":emali" => $email,
      ":comment" => $comment
    )); 

    header("#");

?>
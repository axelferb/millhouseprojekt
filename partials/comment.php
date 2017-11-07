<?php
    require 'database.php';

    $name = $_POST["name_comment"];
    $email = $_POST["email_comment"];
    $comment = $_POST["new_comment"];

    $statement = $pdo->prepare("
      INSERT INTO posts (title, post, category)
      VALUES (:title, :post, :category)");

    $statement->execute(array(
      ":title" => $title,
      ":post" => $post,
      ":category" => $category
    )); 

    header("#");

?>
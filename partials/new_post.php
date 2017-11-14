<?php
    require 'database.php';

    $title = $_POST["post_title"];
    $post = $_POST["new_post"];
    $category = $_POST["category"];

    $statement = $pdo->prepare("
      INSERT INTO posts (title, post, category)
      VALUES (:title, :post, :category)");

    $statement->execute(array(
      ":title" => $title,
      ":post" => $post,
      ":category" => $category
    )); 

    header("Location: ../registration_login_form.php");

?>
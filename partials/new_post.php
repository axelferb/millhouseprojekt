<?php
    require 'database.php';

    $user = $_POST["user"];
    $title = $_POST["post_title"];
    $post = $_POST["new_post"];
    $category = $_POST["category"];

    $statement = $pdo->prepare("
      INSERT INTO posts (user, title, post, category)
      VALUES (:user, :title, :post, :category)");

    $statement->execute(array(
      ":user" => $user,
      ":title" => $title,
      ":post" => $post,
      ":category" => $category
    )); 

    header("Location: ../registration_login_form.php");

?>
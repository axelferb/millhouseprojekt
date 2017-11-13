<?php
    require 'database.php';

    $new_post = $_POST["new_post"];
    $post_title = $_POST["post_title"];


    $statement = $pdo->prepare("
      INSERT INTO posts (post, title)
      VALUES (:new_post, :post_title)");

    $statement->execute(array(
      ":new_post" => $new_post,
      ":post_title" => $post_title
    )); 

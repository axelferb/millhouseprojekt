<?php
    require 'database.php';

    $title = $_POST["post_title"];
    $post = $_POST["new_post"];
    $category = $_POST["category"];

    $statement = $pdo->prepare("
      INSERT INTO posts (title, post, category)
      VALUES (:title, :post, :category)
      ");

    $statement->execute(array(
      ":title" => $title,
      ":post" => $post,
      ":category" => $category
    )); 

    header("Location: ../registration_login_form.php");

?>

<!--

Möjlig lösning?:

UPDATE `access_users`   
   SET `contact_first_name` = :firstname,
       `contact_surname` = :surname,
       `contact_email` = :email,
       `telephone` = :telephone 
 WHERE `user_id` = :user_id -- you probably have some sort of id
  
 -->
 

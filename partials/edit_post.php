<?php
    require 'database.php';

    $title = $_POST["post_title"];
    $post = $_POST["new_post"];
    $category = $_POST["category"];
    $id = $_POST["blog_id"];

    $statement = $pdo->prepare("
    UPDATE posts  
       SET title = :title,
           post = :post,
           category = :category
     WHERE id = :id

      ");

//      INSERT INTO posts (title, post, category)
//      VALUES (:title, :post, :category)

    $statement->execute(array(
      ":title" => $title,
      ":post" => $post,
      ":category" => $category,
      ":id" => $id
    )); 

    header("Location: ../registration_login_form.php");

?>

<!--

Möjlig lösning?:

UPDATE posts  
   SET title = :title,
       post = :post,
       category = :category
 WHERE id = :id
  
 -->
 

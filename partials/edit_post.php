<?php
    require 'database.php';

    $user = $_POST["user"];
    $title = $_POST["post_title"];
    $post = $_POST["new_post"];
    $category = $_POST["category"];
    $id = $_POST["blog_id"];

    $path = $_FILES["uploaded_file"]["tmp_name"];
    $filename = $_FILES["uploaded_file"]["name"];


if(move_uploaded_file($path, "../blog_img/" . $filename)){
    // var_dump($_FILES);
    
    $statement = $pdo->prepare("
        UPDATE posts 
        SET title = :title,
            post = :post,
            category = :category,
            image = :image
        WHERE id = :id
        ");
    
        $statement->execute(array(
        ":id" => $id,
        ":title" => $title,
        ":post" => $post,
        ":category" => $category,
        ":image" => "blog_img/" . $filename
    ));
    

    header("Location: ../post.php?post=$id");
    

} else {


    $statement = $pdo->prepare("
    UPDATE posts  
       SET title = :title,
           post = :post,
           category = :category
     WHERE id = :id
      ");

    $statement->execute(array(
      ":title" => $title,
      ":post" => $post,
      ":category" => $category,
      ":id" => $id
    )); 

      header("Location: ../post.php?post=$id");
    
}

?>


 

<?php
require "database.php";

    $blog_id = $_POST["blog_id"];

    $statement = $pdo->prepare("
    DELETE FROM posts  
     WHERE id = :blog_id
      ");

    $statement->execute(array(
      ":blog_id" => $blog_id
    )); 

    var_dump($statement); 

?>

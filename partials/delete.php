<?php
require "database.php";

foreach ($_POST as $key => $value){
   if(isset($_POST['delete'])){
       $statement = $pdo->prepare(
           "DELETE FROM posts WHERE id = " . $value
       );
       $statement->execute();
       
        $statement2 = $pdo->prepare(
           "DELETE FROM comments WHERE idoriginalpost = " . $value
       );
       $statement2->execute();
       
   }    
}

header("Location: ../list_single_users_posts.php?delete_post=true");
    
?>


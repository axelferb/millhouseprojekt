<?php
require "database.php";

foreach ($_POST as $key => $value){
   if(isset($_POST['delete'])){
       $statement = $pdo->prepare(
           "DELETE FROM comments WHERE id = " . $value
       );
       $statement->execute(); 
   }    
}

header("Location: ../admin_list_comments.php?delete_post=true");
    
?>


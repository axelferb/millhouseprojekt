<?php
require "database.php";

foreach ($_POST as $key => $value){
   if(isset($_POST['delete'])){
       $statement = $pdo->prepare(
           "DELETE FROM posts WHERE id = " . $value
       );
       $statement->execute();
   }    
}
    
?>


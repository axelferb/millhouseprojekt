<?php
require "database.php";

<<<<<<< HEAD
foreach ($_POST as $key => $value){
   if(isset($_POST['delete'])){
       $statement = $pdo->prepare(
           "DELETE FROM posts WHERE id = " . $value
       );
       $statement->execute();
   }    
}
    
?>

=======
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
>>>>>>> master

<?php
    session_start();
    require 'head.php';
    require 'database.php';

$statement = $pdo->prepare(
    "SELECT post, id FROM posts WHERE id = 4"
);

$statement->execute();

$comments = $statement->fetchAll(PDO::FETCH_ASSOC);
 // var_dump($comments);   


foreach($comments as $kommentarer){ 
    echo $kommentarer["post"] . '<br>';
    echo $kommentarer["id"] . '<br>';
?>
   
    
<div class="container mt-5">
  <h4>Ny kommentar:</h4>
  
  <form action="new_comment.php" method="POST">
   
    <div class="form-group">
      <label for="new_comment"> Kommentar: </label>
      <input type="text" name="new_comment" class="form-control">
    </div>
    
<!-- SKICKAR MED UNIKT ID PÅ BLOGGINLÄGGET: -->
    <input type="hidden" name="originalid" value="<?= $kommentarer["id"]; ?>">
        
    <div class="form-group">
      <input type="submit" name="knapp" class="btn btn-primary">
    </div>
    
  </form>
</div>
    
    
<?php

}



?>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
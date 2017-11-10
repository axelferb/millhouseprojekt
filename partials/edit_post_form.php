<?php
    session_start();
    require 'database.php';
    require 'head.php';

    $statement = $pdo->prepare("
      SELECT title, post, category, date FROM posts WHERE id = 4"
    );

    $statement->execute(); 
    
    
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    // var_dump($comments);  


 foreach($posts as $poster){ 
//    echo $poster["post"] . '<br>';
//    echo $poster["date"] . '<br>';

?>


<div class="container mt-5">
  <h4>Nytt inlägg:</h4>
  
  <form action="edit_post.php" method="POST">
  
    <div class="form-group">
      <label for="post_title"> Rubrik: </label>
      <input type="text" name="post_title" value="<?= $poster["title"]; ?>" class="form-control">
    </div>
   
    <div class="form-group">
      <label for="new_post"> Inlägg: </label>
      <input type="text" name="new_post" value="<?= $poster["post"]; ?>" class="form-control">
    </div>
    
    <div class="form-group">
      <input type="hidden" name="blog_id" value="<?= $poster["id"]; ?>" class="form-control">
    </div>
    
<div class="form-group">
  <label for="sel1">Select list:</label>
  <select class="form-control" name="category" value="<?= $poster["category"]; ?>" id="sel1">
    <option>Glasögon</option>
    <option>Klockor</option>
    <option>Inredning</option>
  </select>
</div>
      
    
    <div class="form-group">
      <input type="submit" class="btn btn-primary">
    </div>
    
  </form>
</div>
     
<?php

    }

?>
   
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 

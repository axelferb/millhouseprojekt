<?php
    session_start();
    require 'database.php';
    require 'head.php';


    $statement = $pdo->prepare("
    SELECT id, title, post, category FROM posts WHERE id = 12
    ");


    $statement->execute(); 
    
    
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);


//    $post_id = $_POST["post_id"];

//foreach ($_POST as $key => $value){
//   if(isset($_POST['edit'])){
//

    // var_dump($posts);  



 foreach($posts as $poster){ 
?>
 

 <div class="container mt-5">
  <h4>Redigera inlägg:</h4>
  
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



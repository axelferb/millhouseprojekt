<?php
    session_start();
    require 'head.php';
    require 'database.php';
    
    
    ?>
    
    
<div class="container mt-5">
  <h4>Nytt inlägg:</h4>
  
  <form action="new_post.php" method="POST">
  
    <div class="form-group">
      <label for="post_title"> Rubrik: </label>
      <input type="text" name="post_title" class="form-control">
    </div>
   
    <div class="form-group">
      <label for="new_post"> Inlägg: </label>
      <input type="text-area" name="new_post" class="form-control">
    </div>
    
    <div class="form-group">
      <input type="submit" class="btn btn-primary">
    </div>
    
  </form>
</div>
<?php
    session_start();
    require 'head.php';
    require 'database.php';
    
    
    ?>
    
    
<div class="container mt-5">
  <h4>Lämna en kommentar:</h4>
  
  <form action="comment.php" method="POST">
  
    <div class="form-group">
      <label for="post_title"> Namn: </label>
      <input type="text" name="name_comment" class="form-control">
    </div>
   
    <div class="form-group">
      <label for="new_post"> E-post: </label>
      <input type="text" name="email_comment" class="form-control">
    </div>
    
    <div class="form-group">
      <label for="new_post"> Din kommentar: </label>
      <input type="text" name="new_comment" class="form-control">
    </div>
    
    <div class="form-group">
      <input type="submit" class="btn btn-primary">
    </div>
    
  </form>
</div>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
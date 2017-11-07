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
      <input type="text" name="new_post" class="form-control">
    </div>
    
<div class="form-group">
  <label for="sel1">Select list:</label>
  <select class="form-control" name="category" id="sel1">
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


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
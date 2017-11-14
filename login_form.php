<?php
    session_start();
    require 'head.php';
    require 'partials/database.php';
    require 'nav.php';

?>
<!--LOGIN FORM-->

<div class="container mt-5">
  <h4>Login</h4>
  
  <form action="partials/login.php" method="POST">
   
    <div class="form-group">
      <label for="username"> Username </label>
      <input type="text" name="username" class="form-control">
    </div>
    
    <div class="form-group">
      <label for="password"> Password </label>
      <input type="password" name="password" class="form-control">
    </div>
    
    <div class="form-group">
      <input type="submit" class="btn btn-primary">
    </div>
    
  </form>
</div>

<!--END OF LOGIN FORM-->
<?php require '../footer.php'; ?>
<?php
    session_start();
    require 'head.php';
    require 'partials/database.php';
    require 'nav.php';

?>
<!--LOGIN FORM-->

<div class="container mt-5">
 <?php
 if(isset($_GET["register_success"])){
     echo $_GET["register_success"];
 }
                     
if(isset($_GET["wrong_password"])){
    echo "Du angav fel lösenord. Prova att logga in igen:";
} 
 ?>
 
 
 <h1>Logga In</h1>
 <hr>
  
  <form action="partials/login.php" method="POST">
   
    <div class="form-group">
      <label for="username"> Username </label>
      <input id="username" type="text" name="username" class="form-control">
    </div>
    
    <div class="form-group">
      <label for="password"> Password </label>
      <input id="password" type="password" name="password" class="form-control">
    </div>
    
    <div class="form-group">
      <input type="submit" value="Logga In" class="btn btn-primary">
    </div>
    
  </form>
</div>

<!--END OF LOGIN FORM-->
<?php require 'footer.php'; ?>
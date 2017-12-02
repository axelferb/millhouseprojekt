<?php
    session_start();
    require 'partials/head.php';
    require 'partials/database.php';


    if(isset($_SESSION["user"])){
      echo "<h1 class='text-center'>" . 
              $_SESSION["user"]["username"] . 
            "</h1>";
    }
    if(isset($_GET["error"])){
      echo "<h1 class='alert alert-danger'>" . 
              $_GET["error"] . 
            "</h1>";
    }

?>

<!--REGISTER FORM-->

<div class="container mt-5">
  <h4>Register</h4>
  <form action="partials/register.php" method="POST">
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

<!--END OF REGISTER FORM-->



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


<a href="about.php?error=$_GET['error']"> Hej! </a>

    
<?php require 'partials/footer.php'; ?>
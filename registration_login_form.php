<?php
    session_start();
    require 'head.php';
    require 'partials/database.php';


// OM INLOGGNING SKETT FÖR ÖVER 10 MIN (10 * 60 sekunder = 600) SEDAN SKER AUTOMATISKT UTLOGGNING:
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    
// ANNARS VISAS SIDAN I INLOGGAT LÄGE MED ANVÄNDARNAMN OCH LOG OUT-LÄNK:
} else {
    
        //DESSA H1-KLASSER I IF NEDAN KAN MODIFIERAS/BYTA NAMN ELLER DYLIKT:
            if(isset($_SESSION["user"])){
              echo "<h1 class='text-center'>" . 
                      $_SESSION["user"]["username"] . 
                    "</h1>";
                
                    ?>
                    <a href="partials/log_out.php">Logga ut</a>
                    <?php   
            }     
}

$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


  
// OM MAN ÅTERVÄNDER TILL INDEX EFTER ETT MISSLYCKAT REGISRERINGSFÖRSÖK:
    if(isset($_GET["registration_error"])){
        echo "Din registrering misslyckades då du inte fyllt i alla fält.";
    }

?>


<!--REGISTER FORM-->

<div class="container mt-5">
  <h4>Register</h4>
  <form action="register.php" method="POST">
   
    <div class="form-group">
      <label for="username"> Username </label>
      <input type="text" name="username" class="form-control">
    </div>
    
    <div class="form-group">
      <label for="password"> Password </label>
      <input type="password" name="password" class="form-control">
    </div>
    
    <div class="form-group">
      <label for="email"> Email </label>
      <input type="email" name="email" class="form-control">
    </div>
    
    <div class="form-group">
      <label for="firstname"> First name </label>
      <input type="text" name="firstname" class="form-control">
    </div>
    
    <div class="form-group">
      <label for="lastname"> Last name </label>
      <input type="text" name="lastname" class="form-control">
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


    
<?php require 'footer.php'; ?>
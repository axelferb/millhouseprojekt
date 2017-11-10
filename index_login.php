<?php
    session_start();
    require 'partials/database.php';
    // OM INLOGGNING SKETT FÖR ÖVER 10 MIN (10 * 60 sekunder = 600) SEDAN SKER AUTOMATISKT UTLOGGNING:
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    
// ANNARS VISAS SIDAN I INLOGGAT LÄGE MED ANVÄNDARNAMN OCH LOG OUT-LÄNK:
} else {  
}

$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


  
// OM MAN ÅTERVÄNDER TILL INDEX EFTER ETT MISSLYCKAT REGISRERINGSFÖRSÖK:
    if(isset($_GET["registration_error"])){
        echo "Din registrering misslyckades då du inte fyllt i alla fält.";
    }
?>
    <div class="hidden-xs col-md-4">
         <?php
            if(isset($_SESSION["user"])){
                echo "<h1 class='text-center'>Välkommen:<br/>" . 
                $_SESSION["user"]["username"] . 
                "</h1>";   
            ?>
                <a class="btn btn-primary" href="partials/log_out.php">Logga ut</a>
            <?php
            }
                else{
            ?>
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
           <input type="submit" value="Logga in" class="btn btn-primary">
         </div>
         </div>
                <?php
            }
         ?>
       </form>
</div>
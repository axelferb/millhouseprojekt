<?php
    session_start();
    require 'head.php';
    require 'partials/database.php';

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
    
?>

<body>
    <?php
    require 'nav.php';
    ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
            
            
            
            <a href="upload_profilepic.php?user=<?= $_SESSION["user"]["username"] ?>">Ladda upp en profilbild</a>
    


            </div>  
        </div>
    </div> <!-- END DIV / CONTAINER -->
    

<?php
    include 'footer.php';
?>
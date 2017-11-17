<?php
    session_start();
    require 'head.php';
    require 'partials/database.php';

//    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
//        // last request was more than 30 minutes ago
//        session_unset();     // unset $_SESSION variable for the run-time 
//        session_destroy();   // destroy session data in storage
//        
//    // ANNARS VISAS SIDAN I INLOGGAT LÄGE MED ANVÄNDARNAMN OCH LOG OUT-LÄNK:
//    } else {
//        
//            //DESSA H1-KLASSER I IF NEDAN KAN MODIFIERAS/BYTA NAMN ELLER DYLIKT:
//                if(isset($_SESSION["user"])){
//                  echo "<h1 class='text-center'>" . 
//                          $_SESSION["user"]["username"] . 
//                        "</h1>";
//                    
//                        ?>
        <!-- <a href="partials/log_out.php">Logga ut</a> -->
        <?php   
//                }     
//    }
//    
//    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


// BELOW FETCHES 5 LATEST BLOGPOSTS
    $user = $_SESSION["user"]["id"];
    $statement = $pdo->prepare("
    SELECT title 
    FROM posts 
    WHERE user = :user
    ORDER BY date ASC
    LIMIT 5
    ");
    $statement->execute(array(
    ":user" => $user
    )); 
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
  
    
?>

<body>
    <?php
    require 'nav.php';
    ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
            
            
            
                        <div class="col-md-8">
                <div class="col-xs-12 ">
                    <h1 class="text-center">Profilsida 

                    <?php echo $_SESSION["user"]["username"]; ?>
                    </h1>
                </div>

                <div class="col-xs-4">
                    <div class="profilbild">IMG</div>

                    <a href="upload_profilepic.php?user=<?= $_SESSION["user"]["username"] ?>">Ladda upp en profilbild</a>

               </div>
                <div class="col-xs-8">
                    <div class="info_profile">
                    <p>Text</p>
                    <p>Text</p>
                    <p>Text</p>
                    <p>Text</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="col-xs-8">

                    <h2>
                    <?php echo $_SESSION["user"]["username"]; ?>
                    Statistik</h2>

                </div>

                <div class="col-xs-6 col-md-12">
                    <div class="antal_posts">
                    <p>Totalt antal inlägg</p>
                    </div>
                </div>

                <div class="col-xs-6 col-md-12">
                    <div class="antal_kommentarer">
                    <p>Totalt antal kommentarer</p>
                    </div>
                </div> 
            </div>
            
            <div class="col-xs-12">
                <h1 class="text-center">Senaste 5 blogginlägg</h1>
            </div>
            <div class="col-xs-12">
                    <div class="posts">
                    
                <?php                
                foreach($posts as $blogposts){   
                    echo $blogposts["title"] . '<br>';
                }
                ?>
                   
                    </div>
            </div>
                
            <div class="col-xs-12">
                <h1 class="text-center">Senaste 5 Kommentarer</h1>
            </div>
            <div class="col-xs-12">
                    <div class="kommentarer">
                    <p>Kommentar 1</p>
                    <p>Kommentar 2</p>
                    <p>Kommentar 3</p>
                    <p>Kommentar 4</p>
                    <p>Kommentar 5</p>
                    </div>
                </div>
            
            
    


            </div>  
        </div>
    </div> <!-- END DIV / CONTAINER -->
    

<?php
    include 'footer.php';
?>
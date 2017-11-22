<?php
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 600);
// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(600);
session_start();

    require 'head.php';
    require 'partials/database.php';

    $user = $_SESSION["user"]["id"];
    
// USER POSTS STATISTICS

    $statement_posts = $pdo->prepare("
    SELECT COUNT(DISTINCT post) as total
    FROM posts
    WHERE user = :user
    ");
    $statement_posts->execute(array(
    ":user" => $user
    ));
    $p_count = $statement_posts->fetch(PDO::FETCH_ASSOC);

// USER COMMENT STATISTICS

    $statement_comments = $pdo->prepare("
    SELECT COUNT(DISTINCT comment) as total
    FROM comments
    WHERE user = :user
    ");
    $statement_comments->execute(array(
    ":user" => $user
    ));
    $c_count = $statement_comments->fetch(PDO::FETCH_ASSOC);

// BELOW FETCHES 5 LATEST BLOGPOSTS
    $statement = $pdo->prepare("
    SELECT title, category 
    FROM posts 
    WHERE user = :user
    ORDER BY date DESC
    LIMIT 5
    ");
    $statement->execute(array(
    ":user" => $user
    )); 
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

// BELOW FETCHES 5 LATEST COMMENTS
    $statement2 = $pdo->prepare("
    SELECT comment 
    FROM comments
    WHERE user = :user
    ORDER BY date DESC
    LIMIT 5
    ");
    $statement2->execute(array(
    ":user" => $user
    )); 
    $comments = $statement2->fetchAll(PDO::FETCH_ASSOC);
  
    
?>

<body>
<?php
require 'nav.php';
?>

<div class="container">

    <!-- MAIN CONTENT -->
    <main class="col-md-8">

        <h1>Profilsida <span class="text-bold"><?php echo $_SESSION["user"]["username"]; ?></span></h1>

        <hr>

        <!-- PROFILINFO -->
        <div class="profile">

            <div class="profile-img text-center">
                <i class="fa fa-user-circle fa-5x" aria-hidden="true"></i>
                <a href="upload_profilepic.php?user=<?= $_SESSION[" user "]["username "] ?>">Ladda upp en profilbild</a>
            </div>

            <div class="profile-info">
                <?php
                    echo '<p class="profile-name">';
                    echo  $_SESSION["user"]["firstname"] . " " . $_SESSION["user"]["lastname"] . "<br />";
                    echo "</p>";
                    echo '<p class="profile-email">';
                    echo  $_SESSION["user"]["email"];
                    echo "</p>";
                ?>
                <a class="btn button-green btn-lg btn-block" href="new_post_form.php">Skriv inlägg</a><br>
            </div>
            
        </div>
        <br>
        <!-- END PROFILINFO --> 

        <h2>Senaste 5 blogginlägg</h2>
        <hr>

        <div class="posts">
            
                <?php
                    echo '<table class="table table-striped full-width">';
                    echo '<thead><tr>';
                    echo '<th scope="col">' . "Kategori" . '</th>';
                    echo '<th scope="col">' . "Inlägg". '</th>';
                    echo '</thead></tr>';                
                    foreach($posts as $blogposts){
                    echo '<tr><td>';       
                    echo '<span class="uppercase text-bold">' . $blogposts["category"] . '</span>';
                    echo '</td><td>';
                    echo '<a href="#">';
                    echo $blogposts["title"];
                    echo '</a>';
                    }
                    echo '</td></tr></table>';
                ?>
            </table>
            <br>
            <button type="button" class="btn button-test btn-block" href="list_single_users_posts.php">Se alla inlägg / Ta bort inlägg</button>
            <br>
        </div>

        <h2>Senaste 5 Kommentarer</h2>
        <hr>

        <div class="comments">
            <?php  
                print_r($comments);
                echo '<table class="table table-striped full-width">';
                echo '<thead><tr>';
                echo '<th scope="col">' . "Inlägg" . '</th>';
                echo '<th scope="col">' . "Kommentar". '</th>';
                echo '</thead></tr>';             
                foreach($comments as $blogcomments){
                echo '<tr><td>';
                echo 'LÄNKBAR INLÄGGSRUBRIK';
                echo '</td><td>';   
                echo $blogcomments["comment"] . '<br>';
                }
                echo '</td></tr></table>';
            ?>
        </div>

    </main><!-- END MAIN CONTENT -->


    <!-- SECONDARY CONTENT "ASIDE" -->
    <aside class="col-md-4">

        <h2 class="text-center"><span class="text-bold"><?php echo $_SESSION["user"]["username"]; ?></span> Statistik</h2>
        
        <div class="statistics text-center">
            <p class="small uppercase text-bold">Totalt antal inlägg:</p>
            <?php
                foreach ($p_count as $totalposts){
                echo $totalposts;
                }
                echo "st";
            ?>
            <br><br>
            <p class="small uppercase text-bold">Totalt antal kommentarer:</p>
            <?php
                foreach ($c_count as $totalcomments){
                echo $totalcomments;
                }
                echo "st";
            ?>
        </div>

    </aside>
    <!-- END SECONDARY CONTENT "ASIDE" -->

</div>
<!-- END DIV / CONTAINER -->
<?php
include 'footer.php';
?>
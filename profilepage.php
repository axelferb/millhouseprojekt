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
    SELECT title 
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
                                <a href="upload_profilepic.php?user=<?= $_SESSION[" user "]["username "] ?>">Ladda upp en profilbild</a>
                                <a href="list_single_users_posts.php">Visa alla inlägg och redigera eller ta bort</a>
                            </div>
                            <div class="col-xs-8">
                                <div class="info_profile">
                                    <?php
                    echo "Förnamn: " . $_SESSION["user"]["firstname"] . "<br>";
                    echo "Efternamn: " . $_SESSION["user"]["lastname"] . "<br>";
                    echo "Email: " . $_SESSION["user"]["email"];
                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-xs-8">
                                <h2>
                                    <?php echo $_SESSION["user"]["username"]; ?> Statistik
                                </h2>
                            </div>
                            <div class="col-xs-6 col-md-12">
                                <div class="antal_posts">
                                    <p>Totalt antal inlägg</p>
                                    <?php
                        foreach ($p_count as $totalposts){
                            echo $totalposts;
                        }
                    ?>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-12">
                                <div class="antal_kommentarer">
                                    <p>Totalt antal kommentarer</p>
                                    <?php
                        foreach ($c_count as $totalcomments){
                            echo $totalcomments;
                        }
                    ?>
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
                            <div class="comments">
                                <?php                
                foreach($comments as $blogcomments){   
                    echo $blogcomments["comment"] . '<br>';
                }
                ?>
                            </div>
                            <!--
                    
                <div class="kommentarer">
                    <p>Kommentar 1</p>
                    <p>Kommentar 2</p>
                    <p>Kommentar 3</p>
                    <p>Kommentar 4</p>
                    <p>Kommentar 5</p>
                    </div>
-->

                        </div>
                    </div>
                </div>
            </div>
            <!-- END DIV / CONTAINER -->
            <?php
    include 'footer.php';
?>
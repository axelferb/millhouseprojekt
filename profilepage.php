<?php
require 'partials/session.php';
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
    SELECT id, title, category 
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
    SELECT comment, idoriginalpost 
    FROM comments
    WHERE user = :user
    ORDER BY date DESC
    LIMIT 5
    ");
    $statement2->execute(array(
    ":user" => $user
    )); 
    $comments = $statement2->fetchAll(PDO::FETCH_ASSOC);

// BELOW FETCHES PROFILE PICTURE
    $statement3 = $pdo->prepare("
    SELECT image 
    FROM users 
    WHERE id = :user
    ");
    $statement3->execute(array(
    ":user" => $user
    )); 
    $profile_img = $statement3->fetchAll(PDO::FETCH_ASSOC);
      
 // BELOW FETCHES 5 LATEST COMMENTS AND ASSOCIATED BLOG TITLE
    $statement4 = $pdo->prepare("
    SELECT comments.comment AS comment, 
    comments.idoriginalpost,
    comments.date,
    posts.id AS id, 
    posts.title AS title
    FROM comments
    INNER JOIN posts
	ON posts.id = comments.idoriginalpost
    INNER JOIN users
    WHERE users.id = :user
    ORDER BY comments.date DESC
    LIMIT 5
    ");
    $statement4->execute(array(
    ":user" => $user
    )); 
    $commentz = $statement4->fetchAll(PDO::FETCH_ASSOC);


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
            
           <?php foreach($profile_img as $img){ 
                if($img["image"] == NULL){ ?>
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <?php
                    }else{ ?>
                     <img src="<?=$img["image"];?>" width="160">
                    <?php } 
            }?>

                <i class="fa fa-user-circle fa-5x" aria-hidden="true"></i><br><br>
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
           <table class="table table-striped full-width">
               <thead><tr>
               <th scope="col">Kategori</th>
               <th scope="col">Inlägg</th>
               </tr></thead>
               <?php
                foreach($posts as $blogposts){ ?>
                    <tr><td>
                        <span class="uppercase text-bold"><?= $blogposts["category"]; ?></span>
                    </td><td>
                        <a href="post.php?post=<?=$blogposts["id"];?>"><?=$blogposts["title"];?></a>
                </td></tr>
                <?php } ?>
           
           
            
                <?php
//                    echo '<table class="table table-striped full-width">';
//                    echo '<thead><tr>';
//                    echo '<th scope="col">' . "Kategori" . '</th>';
//                    echo '<th scope="col">' . "Inlägg". '</th>';
//                    echo '</thead></tr>';                
//                    foreach($posts as $blogposts){
//                    echo '<tr><td>';       
//                    echo '<span class="uppercase text-bold">' . $blogposts["category"] . '</span>';
//                    echo '</td><td>';
//                    echo '<a href="post.php?post=' . $blogposts["id"] . '">';
//                    echo $blogposts["title"];
//                    echo '</a>';
//                    }
//                    echo '</td></tr></table>';
                ?>
            </table>
            <br>
            <a class="btn button-test btn-block" href="list_single_users_posts.php" target="_self">Se alla / Redigera / ta bort</a>
            <br>
        </div>

        <h2>Senaste 5 Kommentarer</h2>
        <hr>

        <div class="comments">
      
           
            <?php  
                echo '<table class="table table-striped full-width">';
                echo '<thead><tr>';
                echo '<th scope="col">' . "Inlägg" . '</th>';
                echo '<th scope="col">' . "Kommentar". '</th>';
                echo '</thead></tr>';             
                foreach($comments as $blogcomments){
                    $statement_posts = $pdo->prepare("
                    SELECT title
                    FROM posts
                    WHERE id = :id
                    ");
                    $statement_posts->execute(array(
                    ":id" =>$blogcomments["idoriginalpost"]  
                    ));
                    $comment_post = $statement_posts->fetch(PDO::FETCH_ASSOC);
                    echo '<tr><td>';
                    echo '<a href="#">';
                    echo $comment_post['title'];
                    echo '</a>';
                    echo '</td><td>';   
                    echo $blogcomments["comment"] . '<br>';
                }
                echo '</td></tr></table>';
            ?>
        </div>

    </main><!-- END MAIN CONTENT -->


    <!-- SECONDARY CONTENT "ASIDE" -->
    <aside class="col-md-4">

        <h2 class="text-center"><span class="text-bold">
        <?php echo $_SESSION["user"]["username"]; ?>
        </span> Statistik</h2>
        
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


</body>

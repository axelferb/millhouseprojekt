<?php
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 600);
// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(600);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
require 'head.php';
require 'partials/database.php';
require 'partials/functions.php'; 
    
    $user = $_SESSION["user"]["id"];
    
    $statement = $pdo->prepare("
      SELECT id, title 
      FROM posts 
      WHERE user = :user 
      ORDER BY date DESC"
    );

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
            
            <?php
            if(isset($_GET["new_post"])){
                echo "Ditt nya inlägg har skapats";
            }
            ?>

            
            <?php
            foreach($posts as $blogposts){ 
            ?>
            
          <form action="delete.php" method="POST">
            <input type="checkbox" name="<?= $blogposts["id"]; ?>" value="<?= $blogposts["id"]; ?>">
            
                       
                       
            <a href="post.php?post=<?=$blogposts["id"];?>">
                <?php echo $blogposts["title"]; ?>
          </a>
            
          <a href="edit_post_form.php?posttoedit=<?= $blogposts["id"]; ?>">| Redigera</a><br>
           <?php

} 
?>

            <button type="submit" value="Ta bort" name="delete">
                Ta bort
            </button>
        </form>




            </div>  
        </div>


    </div> <!-- END DIV / CONTAINER -->

    <?php
    require "footer.php";
    ?>



</body>

</html>
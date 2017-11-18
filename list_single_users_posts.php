<!DOCTYPE html>
<html lang="en">
<?php
require 'head.php';
require 'partials/database.php';
require 'partials/functions.php'; 
    
    $statement = $pdo->prepare("
      SELECT id, title FROM posts WHERE user = 4 ORDER BY date ASC"
    );

    $statement->execute(); 

    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    ?>
    
<body>
    <?php
    require 'nav.php';
    ?>
    <div class="container">



        <div class="row">
            <div class="col-xs-12 col-md-12">
            <h4>Redigera eller ta bort dina inlägg:</h4>
            
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
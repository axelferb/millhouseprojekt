
<?php
    require 'database.php';

    $statement = $pdo->prepare("
      SELECT title FROM posts WHERE user = 4 ORDER BY date ASC"
    );

    $statement->execute(); 
     
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    //var_dump($posts); 



foreach($posts as $blogposts){ 
?>
      <form action="delete.php" method="POST">
            <input type="checkbox" name="<?= $blogposts["id"]; ?>" value="<?= $blogposts["id"]; ?>">
        
            <?php
            echo $blogposts["title"];
            ?>
          <a href="edit_post_form.php?posttoedit=<?= $blogposts["id"]; ?>">Redigera</a><br>
           <?php

} 
?>

            <button type="submit" value="Ta bort" name="delete">
                Ta bort
            </button>
        </form>


                




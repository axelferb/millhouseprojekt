
<?php
    require 'database.php';


    $statement = $pdo->prepare("
<<<<<<< HEAD
      SELECT id, title FROM posts WHERE user = 4 ORDER BY date ASC"
=======
      SELECT title FROM posts WHERE user = 4 ORDER BY date ASC"
>>>>>>> master
    );

    $statement->execute(); 
    
<<<<<<< HEAD
=======
    
>>>>>>> master
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    //var_dump($posts); 


<<<<<<< HEAD
foreach($posts as $blogposts){ 
?>
      <form action="delete.php" method="POST">
            <input type="checkbox" name="<?= $blogposts["id"]; ?>" value="<?= $blogposts["id"]; ?>">
        
            <?php
            echo $blogposts["title"] . '<br>';
=======


foreach($posts as $blogposts){ 
?>
      <form action="delete.php" method="POST">
        <input type="checkbox" name="blog_id" value="<?= $blogposts["id"]; ?>">
        
<?php
   
    echo $blogposts["title"] . '<br>';
                 
>>>>>>> master
} 
?>


<<<<<<< HEAD
            <button type="submit" value="Ta bort" name="delete">
                Ta bort
            </button>
        </form>
=======
                <button type="submit" value="Redigera" name="delete">
                    Redigera
                </button>
</form>
>>>>>>> master


                




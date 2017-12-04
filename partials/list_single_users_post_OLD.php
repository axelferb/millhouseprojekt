
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
      <form action="edit_post_form.php" method="post">
        <input type="checkbox" name="post_id" value="<?= $blogposts["id"]; ?>">
        
<?php
   
    echo $blogposts["title"] . '<br>';
                 
} 
?>


                <button type="submit" value="Redigera" name="edit">
                    Redigera
                </button>
</form>


                




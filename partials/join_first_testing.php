<?php
    require 'head.php';
    require 'database.php';

$statement = $pdo->prepare(
    "SELECT comments.comment, comments.date, posts.id FROM posts
    INNER JOIN comments 
    ON comments.idoriginalpost = posts.id"
    
//    "SELECT comment FROM comments WHERE id = 1"
    
//    "SELECT post FROM posts WHERE id = 4"
);

$statement->execute();

$comments = $statement->fetchAll(PDO::FETCH_ASSOC);
 // var_dump($comments);   


foreach($comments as $kommentarer){
    
    
    echo $kommentarer["comment"] . '<br>';
    echo $kommentarer["date"] . '<br>';
    echo $kommentarer["id"] . "<br />";
}



?>






<!--
SELECT comments.comment, posts.id
FROM comments
INNER JOIN comments, posts ON comments.original-post-id = posts.id-->

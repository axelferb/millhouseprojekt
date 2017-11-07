
<?php
    require 'database.php';

    $statement = $pdo->prepare("
      SELECT comment, date FROM comments WHERE idoriginalpost = 4 ORDER BY date ASC"
    );

    $statement->execute(); 
    
    
    $comments = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    // var_dump($comments);  


foreach($comments as $kommentarer){ 
    echo $kommentarer["comment"] . '<br>';
    echo $kommentarer["date"] . '<br>';
}



?>



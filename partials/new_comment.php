<?php
    require 'database.php';

    $comment = $_POST["new_comment"];
    $idoriginalpost = $_POST["idoriginalpost"];
    $user = $_POST["commenting_user"];

    $statement = $pdo->prepare("
      INSERT INTO comments (comment, idoriginalpost, user)
      VALUES (:comment, :idoriginalpost, :user)");

    $statement->execute(array(
      ":comment" => $comment,
      ":idoriginalpost" => $idoriginalpost,
      ":user" => $user
    )); 


   header("Location: ../post.php?post=$idoriginalpost");


?>



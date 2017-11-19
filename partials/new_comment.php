
<?php
    require 'database.php';

    $comment = $_POST["new_comment"];
    $idoriginalpost = $_POST["idoriginalpost"];

    $statement = $pdo->prepare("
      INSERT INTO comments (comment, idoriginalpost)
      VALUES (:comment, :idoriginalpost)");

    $statement->execute(array(
      ":comment" => $comment,
      ":idoriginalpost" => $idoriginalpost
    )); 

    // header("Location: ../registration_login_form.php");


?>



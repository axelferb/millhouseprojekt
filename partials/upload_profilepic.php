<?php
    require 'database.php';

$path = $_FILES["uploaded_file"]["tmp_name"];
$filename = $_FILES["uploaded_file"]["name"];

if(move_uploaded_file($path, "../images/" . $filename)){
    var_dump($_FILES);
    
    $statement = $pdo->prepare("
        INSERT INTO users (image) 
        VALUES (:image) ");
    
        $statement->execute(array(
        ":image" => "images/" . $filename
    ));
    

} else {
    echo "fail!";
}

var_dump($_POST);




?>


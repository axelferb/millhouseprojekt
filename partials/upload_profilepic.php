<?php
    require 'database.php';

$path = $_FILES["uploaded_file"]["tmp_name"];
$filename = $_FILES["uploaded_file"]["name"];
$user_id = $_POST["user_id"];

if(move_uploaded_file($path, "../images/" . $filename)){
echo '<pre>' . var_dump($_FILES) . '</pre>';
    
    $statement = $pdo->prepare("
        UPDATE users SET image = :image
        WHERE id = :user_id
        ");
                
        $statement->execute(array(
        ":image" => "images/" . $filename,
        ":user_id" => $user_id
    ));
    

} else {
    echo "fail!";
}

echo '<pre>' . var_dump($_POST) . '</pre>';




?>


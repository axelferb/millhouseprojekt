<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
require 'head.php';
require 'partials/database.php';
require 'partials/functions.php'; 
    
$post = $_GET["post"];

    $statement = $pdo->prepare("
    SELECT id, title, post, date, category FROM posts WHERE id = :post
    ");

    $statement->execute(array(
    ":post" => $post
    )); 
    
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

?>

<body>
    <?php
    require 'nav.php';
    ?>
    <div class="container">
<!--

        <div class="row">
            <div class="col-md-8" style="border:1px solid red">
            Left Content
            </div>
            <div class="col-md-4" style="border:1px solid green">
            Right Content
            </div>
        </div>
-->

        <div class="row">
            <div class="col-xs-12 col-md-12" style="border:1px solid blue">
                
                <?php
                foreach($posts as $poster){
                    echo $poster["title"] . '<br />';
                    echo $poster["post"];
                    
                }
                ?>
                
            </div>  
        </div>

    </div> <!-- END DIV / CONTAINER -->

    <?php
    require "footer.php";
    ?>
    
</body>

</html>
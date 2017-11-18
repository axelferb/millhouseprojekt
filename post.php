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
    
    // PARAGRAPH BELOW FOR FETCHING POST
    $statement = $pdo->prepare("
    SELECT id, title, post, date, category FROM posts WHERE id = :post
    ");
    $statement->execute(array(
    ":post" => $post
    )); 
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    // PARAGRAPH BELOW FOR FETCHING COMMENTS
    $statement2 = $pdo->prepare("
      SELECT comment, date FROM comments WHERE idoriginalpost = :post ORDER BY date ASC"
    );
    $statement2->execute(array(
    ":post" => $post
    )); 
    $comments = $statement2->fetchAll(PDO::FETCH_ASSOC);

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
               
                <div class="#" style="padding:20px">
                
                <?php
                foreach($posts as $poster){
                    echo $poster["title"] . '<br />';
                    echo $poster["post"] . '<br />';
                    echo $poster["date"];
                }
                ?>
                
                </div>
                
                <div class="#" style="padding:20px">
                
                <?php
                    foreach($comments as $kommentarer){ 
                        echo $kommentarer["comment"] . '<br>';
                        echo $kommentarer["date"] . '<br>';
                    }
                    
                    ?>
               
                </div>
                
                <div class="#" style="padding:20px">
                      <h4>Ny kommentar:</h4>

                      <form action="new_comment.php" method="POST">

                        <div class="form-group">
                          <label for="new_comment"> Kommentar: </label>
                          <input type="text" name="new_comment" class="form-control">
                        </div>

                    <!-- SKICKAR MED UNIKT ID PÅ BLOGGINLÄGGET: -->
                        <input type="hidden" name="originalid" value="<?= $kommentarer["id"]; ?>">

                        <div class="form-group">
                          <input type="submit" name="knapp" class="btn btn-primary">
                        </div>

                      </form>
                </div>
               
                
            </div>  
        </div>

    </div> <!-- END DIV / CONTAINER -->

    <?php
    require "footer.php";
    ?>
    
</body>

</html>
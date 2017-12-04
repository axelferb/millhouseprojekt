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
    SELECT id, title, post, date, category, image FROM posts WHERE id = :post
    ");
    $statement->execute(array(
    ":post" => $post
    )); 
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    // PARAGRAPH BELOW FOR FETCHING INFO ABOUT PUBLISHING BLOGGING USER
    $statement2 = $pdo->prepare("
    SELECT users.id, users.firstname, users.lastname, users.email, posts.user FROM posts 
    INNER JOIN users 
    ON users.id = posts.user
    WHERE posts.id = :post
    ");
    $statement2->execute(array(
    ":post" => $post
    ));
    $userinfo = $statement2->fetchAll(PDO::FETCH_ASSOC);
    
    // POST COMMENT STATISTICS
    $statement_comments = $pdo->prepare("
    SELECT COUNT(DISTINCT comment) as total
    FROM comments
    WHERE idoriginalpost = :post
    ");
    $statement_comments->execute(array(
    ":post" => $post
    ));
    $c_count = $statement_comments->fetch(PDO::FETCH_ASSOC);
    
// TEST-PARAGRAPH BELOW FOR FETCHING COMMENT & INFO ABOUT PUBLISHING COMMENTING USER
    $statement3 = $pdo->prepare("
    SELECT users.id, 
    users.username AS username, 
    users.email AS email, 
    comments.comment AS comment, 
    comments.date AS date, 
    comments.idoriginalpost 
    FROM comments 
    INNER JOIN users 
	ON users.id = comments.user
    WHERE comments.idoriginalpost = :post
    ORDER BY date ASC
    ");
    $statement3->execute(array(
    ":post" => $post
    ));
    $comments_info = $statement3->fetchAll(PDO::FETCH_ASSOC);    
?>

<body>

<?php
require 'nav.php';
?>

<div class="container">

    <main class="col-md-8">
       <div class="inlagg">
        <h1>Blogginlägg</h1>
        <div class= "span12"><hr></div>
        
            <?php
                if (isset($_POST['Klockor'])) {
                    specificPost($_POST["Klockor"], count($posts));
                }
                elseif (isset($_POST['Solglasögon'])) {
                    specificPost($_POST["Solglasögon"], count($posts));
                }
                elseif (isset($_POST['Inredning'])) {
                    specificPost($_POST["Inredning"], count($posts));
                }
                else {
                    specificPost(count($posts));
                }  
            ?>
        </div>

        <br/>
        
<?php if(isset($_SESSION["user"])){ ?>
    
        <div class="comment_on_post">
            <h2>Kommentera</h2>

            <hr>

            <form action="partials/new_comment.php" method="POST">
                <div class="commentArea">
                    <label for="new_comment"> Kommentar: </label>
                    <input type="text" name="new_comment" class="form-control" placeholder="&#xf075; Meddelande">
                </div>

                <!-- SKICKAR MED UNIKT ID PÅ BLOGGINLÄGGET: -->
                <input type="hidden" name="idoriginalpost" value="<?= $post; ?>">

                <!-- SKICKAR MED UNIKT ID PÅ ANVÄNDAREN: -->
                <input type="hidden" name="commenting_user" value="<?= $_SESSION["user"]["id"]; ?>">

                <div class="form-group">
                    <input type="submit" name="knapp" class="btn button-green btn-lg btn-block">
                </div>
            </form>
        </div>
        
<?php } ?>
 
        



        <div class="comments_post">
            <h2>Kommentarer</h2>

            <hr>
            <?php       
            if(!($c_count["total"] == 0)){ 

                foreach($comments_info as $ci){ ?>
                   <span class="author">
                    <?php   echo $ci["username"] ?> </span> 
                    <?php   echo ' ' . 'skriver:' . '<br>'; ?>
                    <span class="date">
                    <?php        echo $ci["date"] . '<br>';?></span>
            
                    <span class="specificComment">
                    <?php echo $ci["comment"] . '<br>'; ?>
                    </span>
                    <?php echo "<hr>";
            }
            ?>
        </div>
        
<?php }else{ ?>
            <span class="specificComment">
               Det här blogginlägget har inga kommentarer ännu. 
            </span>
                
            <?php } ?>


    </main>

    <!-- ASIDE SECONDARY CONTENT (LOGIN-FIELD) -->
    
        <h1 class="text-center">Användare</h1>
        <div class= "col-md-4" style="margin-top:-5px;"><hr></div>

        
        
        <?php 
            require "index_login.php";
        ?>
    
    <!-- END ASIDE -->

</div> <!-- END DIV / CONTAINER -->



<?php
require "footer.php";
?>

</body>

</html>
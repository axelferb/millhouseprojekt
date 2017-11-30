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

    $statement4 = $pdo->prepare("
    SELECT COUNT(comment) as totalComments
    FROM comments 
    ");
    $statement4->execute();
    $numbersOfComments = $statement4->fetchAll(PDO::FETCH_ASSOC);

            
    foreach($numbersOfComments as $amountOfComments){
    echo $amountOfComments["totalComments"];
} 

    
?>

<body>

<?php
require 'nav.php';
?>

<div class="container">

    <main class="col-md-8">
       <div class="inlagg">
        <h1>Blogginlägg</h1>
        <hr>
        
            <?php
                if (isset($_POST['Klockor'])) {
                    specificPost($_POST["Klockor"], count($posts));
                }
                elseif (isset($_POST['Glasögon'])) {
                    specificPost($_POST["Glasögon"], count($posts));
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



        <div class="comments_post">
            <h2>Kommentarer</h2>

            <hr>

            <?php
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


    </main>

    <!-- ASIDE SECONDARY CONTENT (LOGIN-FIELD) -->
    <aside class="col-md-4" style="border: 1px solid green;">
        <h1 class="text-center">Användare</h1>
        <hr>
        <?php 
            require "index_login.php";
        ?>
    </aside>
    <!-- END ASIDE -->

</div> <!-- END DIV / CONTAINER -->



<?php
require "footer.php";
?>

</body>

</html>
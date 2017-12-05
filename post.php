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
    
    // COMMENT STATISTICS TO USE IN IF
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

    $statement = $pdo->prepare("
    SELECT users.id AS userid, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
    posts.id AS id,
    posts.post AS post,
    posts.title AS title, 
    posts.date AS date, 
    posts.category AS category, 
    posts.image AS image,
    posts.user
    FROM posts 
    INNER JOIN users 
	ON users.id =  posts.user
    WHERE posts.id = $post
    ");    
    $statement->execute();
    $posts_info = $statement->fetchAll(PDO::FETCH_ASSOC);    
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

        <?php foreach($posts_info as $blogdata){ 
           

//                           <div class="col-xs-12, col-md-6" style="height: 600px; overflow: hidden;">
//                       
//                    <div style="height: 550px; overflow: hidden;">


                    // IMAGE & CATEGORY: IF WATCHES
                        if($blogdata["category"] == 'Klockor'){ ?>
                            <div class="watch2 post_size"> <?php
                                if(!($blogdata["image"] == NULL)){ ?>
                                    <img src="<?=$blogdata["image"];?>"><?php    
                                }else{ ?>
                                    <img src="images/klockor_profil.png" alt="Klockor">'; 
                                <?php } ?>
                               </div>
                                <div>
                                <p class="watch-label uppercase small text-bold">Klockor</p>
                               </div>
                               <?php
                            
                    // IMAGE & CATEGORY: IF SUNGLASSES
                        }elseif($blogdata["category"] == 'Solglasögon'){ ?>
                                <div class="sunglasses2 post_size"> 
                                   <?php
                                    if(!($blogdata["image"] == NULL)){ ?>
                                        <img src="<?=$blogdata["image"];?>"><?php    
                                    }else{ ?>
                                        <img src="images/glasses_profil.png" alt="Solglasögon">
                                    <?php }?>
                                   </div>
                               <div>
                                <p class="sunglasses-label uppercase small text-bold">Solglasögon</p>
                               </div>
                                   <?php
                            
                    // IMAGE & CATEGORY: IF INTERIOR DESIGN
                        }elseif($blogdata["category"] == 'Inredning'){ ?>
                                <div class="furnish2 post_size"> 
                                    <?php
                                    if(!($blogdata["image"] == NULL)){ ?>
                                        <img src="<?=$blogdata["image"];?>"><?php    
                                    }else{ ?>
                                        <img src="images/glasses_profil.png" alt="Solglasögon">
                                    <?php } ?>         
                               </div>
                               <div>
                                <p class="furnish-label uppercase small text-bold">Inredning</p>
                               </div>
                               <?php
                        }?>
 
                        <div>
                            <h2><a href="post.php?post=<?=$blogdata["id"]?>"><?=$blogdata["title"]?></a></h2>
                        </div>
                       
                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                        <?= $blogdata["date"] . ' | '; ?>  
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
                        <?= $blogdata["firstname"] . ' ' . $blogdata["lastname"] . ' | '; ?> 
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> 
                        <?= $blogdata["email"]; ?>  
                        <p class="blogpost-text">
                        <?= $blogdata["post"]; ?>  
                        </p>   

<?php } ?>
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
        <div class= "hidden-xs hidden-sm col-md-4" style="margin-top:-5px;">
                <h1 class="text-center">Användare</h1>
                <hr></div>
     

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

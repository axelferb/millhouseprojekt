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
    
    // PARAGRAPH BELOW FOR FETCHING INFO ABOUT PUBLISHING BLOGGING USER
    $statement3 = $pdo->prepare("
    SELECT users.id, users.firstname, users.lastname, users.email, posts.user FROM posts 
    INNER JOIN users 
    ON users.id = posts.user
    WHERE posts.id = :post
    ");
    $statement3->execute(array(
    ":post" => $post
    ));
    $userinfo = $statement3->fetchAll(PDO::FETCH_ASSOC);
    
    // PARAGRAPH BELOW FOR FETCHING INFO ABOUT PUBLISHING COMMENTING USER
    $statement4 = $pdo->prepare("
    SELECT users.id, users.username, users.email, comments.idoriginalpost FROM comments 
    INNER JOIN users 
    ON users.id = comments.user
    WHERE comments.idoriginalpost = :post
    ");
    $statement4->execute(array(
    ":post" => $post
    ));
    $comment_userinfo = $statement4->fetchAll(PDO::FETCH_ASSOC);
    
    //var_dump($comment_userinfo);  
?>

<body>
    <?php
    require 'nav.php';
    ?>
    
    
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                   <div class="inlägg">
                       
                       <?php
                
                        if (isset($_POST['Klockor'])) {
                            TESTAR($_POST["Klockor"], count($posts));
                           }
                        elseif (isset($_POST['Glasögon'])) {
                            TESTAR($_POST["Glasögon"], count($posts));
                            }
                        elseif (isset($_POST['Inredning'])) {
                            TESTAR($_POST["Inredning"], count($posts));
                           }
                        else {
                            TESTAR(count($posts));
                        }  
                                  
                                          foreach($userinfo as $info){
                    echo $info["firstname"] . ' ';
                    echo $info["lastname"] . ' ';
                    echo $info["email"];
                }     
                                   
                    ?>
                </div>
                    
                    
                <div class="comment_on_post">
                         <h4>Kommentera</h4>

                      <form action="partials/new_comment.php" method="POST">

                        <div class="form-group">
                          <label for="new_comment"> Kommentar: </label>
                          <input type="text" name="new_comment" class="form-control">
                        </div>

                    <!-- SKICKAR MED UNIKT ID PÅ BLOGGINLÄGGET: -->
                        <input type="hidden" name="idoriginalpost" value="<?= $post; ?>">
                        
                    <!-- SKICKAR MED UNIKT ID PÅ ANVÄNDAREN: -->
                        <input type="hidden" name="commenting_user" value="<?= $_SESSION["user"]["id"]; ?>">

                        <div class="form-group">
                          <input type="submit" name="knapp" class="btn btn-primary">
                        </div>

                      </form>
                </div>
                    
                    
                    
                <div class="comments_post">
                    <h2>Kommentarer</h2>
                    <?php
                    
                    $counter = 0;
                    
                    foreach($comments as $kommentarer){ 
                        echo $kommentarer["comment"] . '<br>';
                        echo $kommentarer["date"] . '<br>';
                        echo "<hr>";
                        
                                foreach($comment_userinfo as $cui){ 
                                    echo $cui["username"] . '<br>';
                                    echo $cui["email"] . '<br>';
                                    
                                       if ($counter = 1) 
                                        break;
                                       $counter++;
                                }
                    }   
                ?>
                </div>
                </div>
            </div>
  
                  
                  
              
            
    
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
                    echo $poster["date"] . '<br />';
                }
                ?>
                </div>
                <div class="#" style="padding:20px">
                   
                <?php
                foreach($userinfo as $info){
                    echo $info["firstname"] . ' ';
                    echo $info["lastname"] . ' ';
                    echo $info["email"];
                }
                ?>
                
                </div>
                
                <div class="#" style="padding:20px">
                
                
                <?php
                    
                    $counter = 0;
                    
                    foreach($comments as $kommentarer){ 
                        echo $kommentarer["comment"] . '<br>';
                        echo $kommentarer["date"] . '<br>';
                        
                                foreach($comment_userinfo as $cui){ 
                                    echo $cui["username"] . '<br>';
                                    echo $cui["email"] . '<br>';
                                    
                                       if ($counter = 1) 
                                        break;
                                       $counter++;
                                }
                    }
                      
                ?>
               
                </div>
                
                <div class="#" style="padding:20px">
                      <h4>Ny kommentar:</h4>

                      <form action="partials/new_comment.php" method="POST">

                        <div class="form-group">
                          <label for="new_comment"> Kommentar: </label>
                          <input type="text" name="new_comment" class="form-control">
                        </div>

                    <!-- SKICKAR MED UNIKT ID PÅ BLOGGINLÄGGET: -->
                        <input type="hidden" name="idoriginalpost" value="<?= $post; ?>">
                        
                    <!-- SKICKAR MED UNIKT ID PÅ ANVÄNDAREN: -->
                        <input type="hidden" name="commenting_user" value="<?= $_SESSION["user"]["id"]; ?>">

                        <div class="form-group">
                          <input type="submit" name="knapp" class="btn btn-primary">
                        </div>

                      </form>
                </div>
               
                
            </div>  
        </div>

    </div> <!-- END DIV / CONTAINER -->
</main>
   
<aside>
    <div class="row">
        <div class="col-md-4">
            <?php require "index_login.php";
            ?>
        </div>
    </div>
</aside>
   
   
    <?php
    require "footer.php";
    ?>
    
</body>

</html>
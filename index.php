<?php
require 'partials/session.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php
require 'head.php';
require 'partials/database.php';
require 'partials/print_posts.php';
    



//$statement = $pdo->prepare("SELECT * FROM posts ORDER BY id DESC");
//$statement->execute();
//$posts = $statement->fetchALL(PDO::FETCH_ASSOC);

    
// USER POSTS STATISTICS
    $statement_count = $pdo->prepare("
    SELECT COUNT(DISTINCT post) as total
    FROM posts
    ");
    $statement_count->execute();
    $p_count = $statement_count->fetch(PDO::FETCH_ASSOC);
    var_dump($p_count["total"]);
    
    
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
    ORDER BY posts.id DESC
    LIMIT $p_count[total] OFFSET 1
    ");    
    // LIMIT $p_count[total] OFFSET 1
    // LIMIT 5 OFFSET $offset_number
    $statement->execute();
    $post_info = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    
    $statement2 = $pdo->prepare("
    SELECT users.id, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
    posts.post AS post,
    posts.title AS title, 
    posts.date AS date, 
    posts.category AS category, 
    posts.image AS image,
    posts.user
    FROM posts 
    INNER JOIN users 
	ON users.id =  posts.user
    WHERE posts.category = 'Klockor'
    ORDER BY posts.id DESC
    ");
    $statement2->execute();
    $post_info_watches = $statement2->fetchAll(PDO::FETCH_ASSOC);
    
    $statement3 = $pdo->prepare("
    SELECT users.id, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
    posts.post AS post,
    posts.title AS title, 
    posts.date AS date, 
    posts.category AS category, 
    posts.image AS image,
    posts.user
    FROM posts 
    INNER JOIN users 
	ON users.id =  posts.user
    WHERE posts.category = 'Solglasögon'
    ORDER BY posts.id DESC
    ");
    $statement3->execute();
    $post_info_glasses = $statement3->fetchAll(PDO::FETCH_ASSOC);
    
    $statement4 = $pdo->prepare("
    SELECT users.id, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
    posts.post AS post,
    posts.title AS title, 
    posts.date AS date, 
    posts.category AS category, 
    posts.image AS image,
    posts.user
    FROM posts 
    INNER JOIN users 
	ON users.id =  posts.user
    WHERE posts.category = 'Inredning'
    ORDER BY posts.id DESC
    ");
    $statement4->execute();
    $post_info_interior = $statement4->fetchAll(PDO::FETCH_ASSOC);
    
    $statement5 = $pdo->prepare("
    SELECT users.id, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
    posts.post AS post,
    posts.title AS title, 
    posts.date AS date, 
    posts.category AS category, 
    posts.image AS image,
    posts.user
    FROM posts 
    INNER JOIN users 
	ON users.id =  posts.user
    ORDER BY posts.id DESC
    LIMIT 1
    ");
    $statement5->execute();
    $first_post = $statement5->fetchAll(PDO::FETCH_ASSOC);
    
    $stmt = $pdo->prepare("
    SELECT id
    FROM posts
    ");
    $stmt->execute();
    $first_postt = $pdo->lastInsertId();
    
?>
<body>
    <?php
?>
    <!-- NAVIGATION -->
    <?php
        require 'nav.php';
    ?>

    <!-- HERO IMAGE -->
    <div class="jumbotron"></div>
    <div class="blue-line"></div>

    <main class="container">

        <div class="row">              
            <div class="col-xs-12, col-md-8">
                <div>
                    <h1>Våra blogginlägg</h1>
                    <hr style="width: 97%;">
                </div>
                <div class="right-align">
                    <span class="filter">Filtrera efter:</span>
                       
                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kategori: <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="index_idas.php">Allt</a></li>
                            <li><a href="index_idas.php?cat_glasses=true">Solglasögon</a></li>
                            <li><a href="index_idas.php?cat_watches=true">Klockor</a></li>
                            <li><a href="index_idas.php?cat_interior=true">Inredning</a></li>
                          </ul>
                        </div>
                        
                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Månad: <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="index_idas.php?cat=all">Allt</a></li>
                            <li><a href="index_idas.php?cat=sunglasses">Solglasögon</a></li>
                            <li><a href="index_idas.php?cat=watches">Klockor</a></li>
                            <li><a href="index_idas.php?cat=interior">Inredning</a></li>
                          </ul>
                        </div>
                </div>
                   
                <div>
                    <?php
                first_image_category($first_post);
                    ?>
                </div>     
            </div>
            
            <div class="hidden-xs, hidden-sm, col-md-4">
                <div>
                    <h1>Användare:</h1>
                    <hr style="width: 97%;">
                </div>
                <div>
                    <?php
                        require 'index_login_idas.php';
                    ?>
                </div>
            </div>
        </div>
             
        <div class="row">
               
          <?php
        // FUNCTION FOR PRINTING OUT BLOG POST
            if(isset($_GET["cat_watches"])){
                image_category($post_info_watches);
            }elseif(isset($_GET["cat_glasses"])){
               image_category($post_info_glasses);
            }elseif(isset($_GET["cat_interior"])){
                image_category($post_info_interior);               
            }else{
                image_category($post_info);
            } ?>

     

        </div>
            

       

        
   
    <!--main End-->
    </main>
    

 
   
    <?php
        require "footer.php";
    ?>
    
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>

</html>
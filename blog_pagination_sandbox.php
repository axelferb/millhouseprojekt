<?php
require 'partials/session.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php
require 'head.php';
require 'partials/database.php';
require 'partials/print_posts.php'; 
    
    $page = $_GET["page"];
    if(isset($_GET["page"])){
        $page = $_GET["page"];
    }else{
        $page = 1;
    }
    
    
// $last_page = ceil($p_count / 5);

    // POSTS STATISTICS
    $statement_count = $pdo->prepare("
    SELECT COUNT(DISTINCT post) as total
    FROM posts
    ");
    $statement_count->execute();
    $p_count = $statement_count->fetch(PDO::FETCH_ASSOC);
    var_dump($p_count);
    
    $offset_number = 5;
    
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
    LIMIT 5 OFFSET $offset_number
    "); 
    //LIMIT $p_count[total] OFFSET 1
    // LIMIT $p_count[total] OFFSET 1
    // LIMIT 5 OFFSET $offset_number
    // LIMIT $p_count[total] OFFSET 1
    $statement->execute();
    $post_info = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        $page = $_GET["page"];
    if(isset($_GET["page"])){
        $page = $_GET["page"];
    }else{
        $page = 1;
    }
    

    
    //$offset_number = $page * 5 - 5;
    
    
// $last_page = ceil($p_count / 5);
    
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
            <div class="col-xs-12, col-md-12">
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
                            <li><a href="blog.php">Allt</a></li>
                            <li><a href="blog.php?cat_glasses=true">Solglasögon</a></li>
                            <li><a href="blog.php?cat_watches=true">Klockor</a></li>
                            <li><a href="blog.php?cat_interior=true">Inredning</a></li>
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
         
         
<?php
    $last_page = ceil($p_count["total"] / 5);
    // $p_count[0]['COUNT(id)']
    var_dump($p_count);
    var_dump($last_page);
       

    if($page -1 >= 1){ ?>
        <a href="index.php?page=<?=$page;?>"><?=$page;?></a>
    <?php }
    if($page < $last_page){ ?>
        <a href="blog_pagination_sandbox.php?page=<?=$page + 1?>"><?= $page + 1 ?></a>
        <a href="blog_pagination_sandbox.php?page=<?=$page + 2?>"><?= $page + 2 ?></a>
        <a href="blog_pagination_sandbox.php?page=<?=$page + 3?>"><?= $page + 3 ?></a>
    <?php }



   
   ?>
         
          
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
<?php
require 'partials/session.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php
require 'head.php';
require 'partials/database.php';
require 'partials/print_posts.php';
    
// FOR PAGINATION
    
    if(isset($_GET["page"])){
        $page = $_GET["page"];
    }else{
        $page = 1;
    }
    
    $offset_number = $page * 5 - 5;
    
require 'partials/blog_statements.php';
    
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
            
            
//                if(isset($_GET["cat_watches"])){
//                image_category($post_info_watches);
//            }elseif(isset($_GET["cat_glasses"])){
//               image_category($post_info_glasses);
//            }elseif(isset($_GET["cat_interior"])){
//                image_category($post_info_interior);               
//            }elseif($_GET["month"] == january2017){
//                image_category($post_info_month);              
//            }else{
//                image_category($post_info);
//            } 
            
            
         ?>


    
<div class="pagination">    
         
<?php
        
    $last_page = ceil($p_count["total"] / 5);
    
    if($page == 1){ ?>
    <a href="blog.php?page=<?=$page;?>"><b><?=$page;?></b></a>
        <a href="blog.php?page=<?=$page + 1?>"><?= $page + 1 ?></a>
        <a href="blog.php?page=<?=$page + 2?>"><?= $page + 2 ?></a>
        <a href="blog.php?page=<?=$page + 1?>">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true">
        </a> <?php   
    }
    
    if(!($page == 1) && ($page < $last_page) && !($page == $last_page)){ ?>
       <a href="blog.php?page=<?=$page - 1?>">
           <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
       </a> 

        <a href="blog_pagination_sandbox.php?page=<?=$page?>"><b><?= $page ?></b></a>
         
            <a href="blog.php?page=<?=$page + 1?>"><?= $page + 1 ?></a>
        <a href="blog_pagination_sandbox.php?page=<?=$page + 2?>"><?= $page + 2 ?></a>

       <a href="blog.php?page=<?=$page + 1?>">
           <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
       </a> 
             
    <?php 
    }
 
            
        if($page == $last_page){ ?>
       <a href="blog.php?page=<?=$page - 1?>">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
       </a>
        <a href="blog.php?page=<?=$page - 2?>"><?= $page - 2 ?></a> 
        <a href="blog.php?page=<?=$page - 1?>"><?= $page - 1 ?></a> 
        <a href="blog.php?page=<?=$page?>"><b><?= $page ?></b></a>
    <?php } 
      
 } ?> 
            </div>
            
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
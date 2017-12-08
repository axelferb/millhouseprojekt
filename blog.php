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
    
$order = require 'partials/blog_statements.php';

    
?>


<body>
    <?php
?>
    <!-- NAVIGATION -->
    <?php
        require 'nav.php';
        require 'jumbotron.php'
    ?>

    <!-- HERO IMAGE -->
    
    <div class="blue-line"></div>

    <main class="container">

        <div class="row">              
            <div class="col-xs-12, col-md-12">
                <div>
                    <h1>Våra blogginlägg</h1>
                    <hr>
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
                            Relevans: <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">

                            <li><a href="blog.php?january2017=true">Januari 2017</a></li>
                            <li><a href="blog.php?february2017=true">Februari 2017</a></li>
                            <li><a href="blog.php?march2017=true">Mars 2017</a></li>
                            <li><a href="blog.php?april2017=true">April 2017</a></li>
                            <li><a href="blog.php?may2017=true">Maj 2017</a></li>
                            <li><a href="blog.php?june2017=true">Juni 2017</a></li>
                            <li><a href="blog.php?july2017=true">Juli 2017</a></li>
                            <li><a href="blog.php?august2017=true">Augusti 2017</a></li>
                            <li><a href="blog.php?september2017=true">September 2017</a></li>
                            <li><a href="blog.php?october2017=true">Oktober 2017</a></li>
                            <li><a href="blog.php?november2017=true">November 2017</a></li>
                            <li><a href="blog.php?december2017=true">December 2017</a></li>

                            <li><a href="blog.php?newest=true">Nyast</a></li>
                            <li><a href="blog.php?oldest=true">Äldst</a></li>

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
                
                
        // IF MONTH:
            }elseif(isset($_GET["january2017"])){
                image_category($post_info_january);
            }elseif(isset($_GET["february2017"])){
               image_category($post_info_february);
            }elseif(isset($_GET["march2017"])){
                image_category($post_info_march);  
            }elseif(isset($_GET["april2017"])){
                image_category($post_info_april); 
            }elseif(isset($_GET["may2017"])){
                image_category($post_info_may);
            }elseif(isset($_GET["june2017"])){
               image_category($post_info_june);
            }elseif(isset($_GET["july2017"])){
                image_category($post_info_july);  
            }elseif(isset($_GET["august2017"])){
                image_category($post_info_august);
            }elseif(isset($_GET["september2017"])){
               image_category($post_info_september);
            }elseif(isset($_GET["october2017"])){
                image_category($post_info_october);  
            }elseif(isset($_GET["november2017"])){
                image_category($post_info_november); 
            }elseif(isset($_GET["december2017"])){
                image_category($post_info_december);      
        // END OF MONTH
            
            }else{
                
                if(isset($_GET["oldest"])){
                    image_category($post_info_asc);
                }elseif(isset($_GET["newest"])){
                    image_category($post_info); 
                }else{
                    image_category($post_info);             
                }
         ?>


<div class="col-xs-12 pagination">

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
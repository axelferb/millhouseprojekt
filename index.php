<?php
require 'partials/session.php';
?>


<!DOCTYPE html>

<html lang="en">

<?php
require 'head.php';
require 'partials/database.php';
require 'partials/print_posts.php';
require 'partials/index_statements.php'; 
?>

<body>

    <!-- NAVIGATION -->

    <?php
        require 'nav.php';
        require 'jumbotron.php'
    ?>

    <!-- HERO IMAGE -->

    <div class="blue-line"></div>

    <main class="container">

        <div class="row">              
            <div class="col-xs-12, col-md-8">
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
<!--
                        
                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Månad: <span class="caret"></span>
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

                          </ul>
                        </div>
-->

                </div>
                   
                <div>
                    <?php
                first_image_category($first_post);
                    ?>
                </div>     
            </div>
            
            <div class="hidden-xs hidden-sm col-md-4">
                <div>
                    <h1 class="text-center">Användare</h1>
                    <hr>
                </div>
                <div>
                    <?php
                        require 'index_login.php';
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
            

       

        <a class="btn button-green btn-lg btn-block" href="blog.php">Läs alla inlägg här</a>    
   
    <!--main End-->
    </main>
    

 
   
    <?php
        require "footer.php";
    ?>
    
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>

</html>
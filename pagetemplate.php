<!DOCTYPE html>
<html lang="en">
<?php
require 'head.php';
require 'partials/database.php';
require 'partials/functions.php';       
?>

<body>
    <?php
    require 'nav.php';
    ?>
    <div class="container">

        <div class="row">
            <div class="col-md-8" style="border:1px solid red">
            Left Content
            </div>
            <div class="col-md-4" style="border:1px solid green">
            Right Content
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-12" style="border:1px solid blue">
                Main Content
            </div>  
        </div>

    </div> <!-- END DIV / CONTAINER -->

    <?php
    require "footer.php";
    ?>
    
</body>

</html>
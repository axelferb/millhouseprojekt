<?php
require 'partials/session.php';
?>


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
            <div class="col-xs-12 col-md-12">
    

    
<!--<div class="container mt-5">-->
  <h4>Ladda upp profilbild:</h4>
  <form action="partials/upload_profilepic.php" method="post" enctype="multipart/form-data">
    <input type="file" name="uploaded_file">
    <input type="hidden" name="user_id" value="<?=$_SESSION["user"]["id"];?>">
    <button>Send</button>
</form>
  



            </div>  
        </div>


    </div> <!-- END DIV / CONTAINER -->

    <?php
    require "footer.php";
    ?>



</body>

</html>
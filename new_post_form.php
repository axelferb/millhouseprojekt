<?php
require 'partials/session.php';


//<!DOCTYPE html>
//<html lang="en">


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
  <h4>Nytt inlägg:</h4>
  
  <form action="partials/new_post.php" method="POST">
  
    <div class="form-group">
      <input type="hidden" name="user" value="<?= $_SESSION["user"]["id"]; ?> " class="form-control">
    </div>
  
    <div class="form-group">
      <label for="post_title"> Rubrik: </label>
      <input type="text" name="post_title" class="form-control">
    </div>
    
    <div class="form-group">
      <label for="new_post"> Inlägg: </label>
    <textarea name="new_post" id="editor"></textarea>
    </div>
    
    <div class="form-group">
  <label for="sel1">Select list:</label>
  <select class="form-control" name="category" id="sel1">
    <option>Solglasögon</option>
    <option>Klockor</option>
    <option>Inredning</option>
  </select>
</div>
    
    <div class="form-group">
      <input type="submit" class="btn btn-primary">
    </div>
    
  </form>
<!--</div>-->


            </div>  
        </div>


    </div> <!-- END DIV / CONTAINER -->

    <?php
    require "footer.php";
    ?>
    



<!--    Detta script är till wysiwyg editorn:-->
    <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>


</body>

</html>
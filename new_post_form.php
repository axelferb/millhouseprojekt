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

    <div class="col-xs-12 col-md-12">

      <h1>Nytt blogginlägg</h1>

      <hr class="full-width">

      <form action="partials/new_post.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
          <input type="hidden" name="user" value="<?= $_SESSION["user"]["id"]; ?> " class="form-control">
        </div>

        <div class="form-group">
          <label for="post_title"> Rubrik: </label>
          <input id="post_title" type="text" name="post_title" class="form-control">
        </div>

        <div class="form-group">
          <label for="new_post"> Inlägg: </label>
          <textarea name="new_post" id="editor"></textarea>
        </div>

        <div class="form-group">
          <label for="sel1">Kategori:</label>
          <select class="form-control" name="category" id="sel1">
            <option>Solglasögon</option>
            <option>Klockor</option>
            <option>Inredning</option>
          </select>
        </div>

        <div class="form-group">
          <label for="new_post">Bild (valfritt): </label>
          <input id="new_post" type="file" name="uploaded_file">
        </div>


        <div class="form-group">
          <input type="submit" class="btn btn-primary">
        </div>

      </form> 

      <br><hr class="full-width"><br>

      <a class="btn button-test btn-block" href="profilepage.php" target="_self">Tillbaka till profilsidan</a>

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
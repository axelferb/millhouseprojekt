<!DOCTYPE html>
<html lang="en">
<?php
require 'head.php';
require 'partials/database.php';
require 'partials/functions.php';    

$statement = $pdo->prepare("SELECT * FROM posts ORDER BY id DESC");
$statement->execute();
$posts = $statement->fetchALL(PDO::FETCH_ASSOC);
    
?>
<body>
    <?php
    require 'nav.php';
    ?>
    <div class="jumbotron">
        <h1>HEROIMAGE</h1>
    </div>
    <div class="container">
        <div class="row">
          <div class= "col-xs-12">
           <form action="index.php" method="POST">
                        <input type="submit" name="Klockor" value="Klockor">
                        <input type="submit" name="Glasögon" value="Glasögon">
                        <input type="submit" name="Inredning" value="Inredning">
                        <input type="submit" name="all" value="allt">
                    </form>
            </div>
            <div class="col-xs-12 col-md-8">
                <div class="profilbild"></div>
                <h2>Blogginläggsrubrik 1</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi in hic ea nulla soluta sequi cumque maiores
                    exercitationem consequatur, sapiente quasi sunt fugiat aliquam? Repellat ea nesciunt culpa ipsam. Officia.</p>
            </div>
            <div class="hidden-xs hidden-sm col-md-4 index-login">
                <form>
                    <div class="form-group">
                        <label for="username">Användarnamn</label>
                        <input type="text" class="form-control" placeholder="Ditt användarnamn">
                    </div>
                    <div class="form-group">
                        <label for="password">Lösenord</label>
                        <input type="password" class="form-control" placeholder="Ditt lösenord">
                    </div>
                    <button type="submit" class="btn btn-primary">Logga in</button>
                </form>
            </div>
                 <?php
                
    
                if (isset($_POST['Klockor'])) {
                    handleCategory($_POST["Klockor"]);
                   }
                elseif (isset($_POST['Glasögon'])) {
                    handleCategory($_POST["Glasögon"]);
                    }
                elseif (isset($_POST['Inredning'])) {
                    handleCategory($_POST["Inredning"]);
                   }
                else {
                    allCategories();
                }    

                ?>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
</body>

</html>
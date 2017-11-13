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

            <div class="col-xs-12 col-md-8">
            <h1>Våra blogginlägg</h1>
            <hr>
            <span class="filter">Filtrera efter:</span>
            <form action="index.php" method="POST" class="filter">
                <input type="submit" name="Klockor" value="Klockor">
                <input type="submit" name="Glasögon" value="Glasögon">
                <input type="submit" name="Inredning" value="Inredning">
                <input type="submit" name="all" value="allt">
            </form>
                <div class="profilbild-big"></div>
                <h2>Blogginläggsrubrik 1</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi in hic ea nulla soluta sequi cumque maiores
                    exercitationem consequatur, sapiente quasi sunt fugiat aliquam? Repellat ea nesciunt culpa ipsam. Officia.</p>
            </div>
            <div class="hidden-xs hidden-sm col-md-4 index-login">
                   <?php
        require 'index_login.php';
                   ?>
            </div>
                 <?php
                
    
                if (isset($_POST['Klockor'])) {
                    handleCategories($_POST["Klockor"], 5);
                   }
                elseif (isset($_POST['Glasögon'])) {
                    handleCategories($_POST["Glasögon"], 5);
                    }
                elseif (isset($_POST['Inredning'])) {
                    handleCategories($_POST["Inredning"], 5);
                   }
                else {
                    allCatergories(5);
                }    

                ?>
            </div>
            <br><br>
        <hr>
        <p style="text-align:center;">button previous | button next</p>
    <?php
    include "footer.php";
    ?>
</body>

</html>
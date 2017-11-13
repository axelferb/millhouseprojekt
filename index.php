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
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> 364c8ab95225fa271c8721328a506528a532ffa0
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
        <br><br>
        <hr>
        <p style="text-align:center;">button previous | button next</p>
<<<<<<< HEAD
=======
        <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Välj kategori
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
    <form action="index.php" method="POST">
    <li><input type="submit" name="Klockor" value="Klockor"></li>
    <li><input type="submit" name="Glasögon" value="Glasögon"></li>
    <li><input type="submit" name="Inredning" value="Inredning"></li>
    <li><input type="submit" name="all" value="allt"></li>
    </form>
    </ul>
    </div>
    <?php
        require 'index_login.php';
    ?>
    </div>
>>>>>>> master
=======
    </div>
>>>>>>> 364c8ab95225fa271c8721328a506528a532ffa0
    </div>
    <?php
    include "footer.php";
    ?>
</body>

</html>
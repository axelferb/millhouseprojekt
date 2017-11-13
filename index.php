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
<<<<<<< HEAD
    <div class="row">
=======
        <div class="row">
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> 364c8ab95225fa271c8721328a506528a532ffa0
>>>>>>> dcd5d7a7e0aa1eb3d513625a20c56e1985a15ea8
            <div class="col-xs-12 col-md-8">
            <h1>Våra blogginlägg</h1>
            <hr>
            <span class="filter">Filtrera efter:</span>
            <form action="index.php" method="POST" class="filter">
                <button class="btn btn-default" type="submit" name="Klockor" value="Klockor">Klockor</button>
                <button class="btn btn-default" type="submit" name="Glasögon" value="Glasögon">Glasögon</button>
                <button class="btn btn-default" type="submit" name="Inredning" value="Inredning">Inredning</button>
                <button class="btn btn-default" type="submit" name="all" value="Allt">Allt</button>
            </form>
            </div>
            <?php

                require 'index_login.php';
            
            ?>

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
        <div class="row">
        <div class="col-xs-12">
        <hr>
        <p style="text-align:center;">button previous | button next</p>
<<<<<<< HEAD
        </div>
        </div>
        </div>
=======
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
>>>>>>> dcd5d7a7e0aa1eb3d513625a20c56e1985a15ea8
    <?php
    require "footer.php";
    ?>
</body>

</html>
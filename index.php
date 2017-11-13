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
                        <span class="filter">SORTERA EFTER:</span>
                        <form action="index.php" method="POST" class="filter">
                            <button class="btn button-green" type="submit" name="Klockor" value="Klockor">Klockor</button>
                            <button class="btn button-orange" type="submit" name="Glasögon" value="Glasögon">Glasögon</button>
                            <button class="btn button-blue" type="submit" name="Inredning" value="Inredning">Inredning</button>
                            <button class="btn btn-default" type="submit" name="all" value="Allt">Allt</button>
                        </form>
                        <div class="btn-group">
                            <button type="button" class="btn button-test dropdown-toggle" data-toggle="dropdown">
                                <span>
                                    <i class="fa fa-arrows-v" aria-hidden="true"></i>
                                </span>
                                KATEGORI
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#" type="submit" name="all" value="Allt">Allt</a>
                                </li>
                                <li>
                                    <a href="#" type="submit" name="Klockor" value="Klockor">Klockor</a>
                                </li>
                                <li>
                                    <a href="#" type="submit" name="Glasögon" value="Glasögon">Glasögon</a>
                                </li>
                                <li>
                                    <a href="#" type="submit" name="Inredning" value="Inredning">Inredning</a>
                                </li>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn button-test dropdown-toggle" data-toggle="dropdown">
                                <span>
                                    <i class="fa fa-arrows-v" aria-hidden="true"></i>
                                </span>
                                DATUM
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#">Klockor</a>
                                </li>
                                <li>
                                    <a href="#">Glasögon</a>
                                </li>
                                <li>
                                    <a href="#">Inredning</a>
                                </li>
                            </ul>
                        </div>
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
                        <p style="text-align:center;">
                            <i class="fa fa-3x fa-chevron-circle-left" aria-hidden="true"></i> button previous | button next
                            <i class="fa fa-3x fa-chevron-circle-right" aria-hidden="true"></i>
                        </p>
                    </div>
                </div>
            </div>
            <?php
    require "footer.php";
    ?>
    </body>

</html>
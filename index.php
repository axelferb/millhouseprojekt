<?php
    session_start();
?>

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

        <!-- NAVIGATION -->
        <?php
  require 'nav.php';
  ?>

            <!-- HERO IMAGE -->
            <div class="jumbotron">
            </div>
            <div class="blue-line"></div>
            <div class="container">
                <div class="row">
                    <div class="index_login hidden-xs hidden-sm col-md-4">
                        <h1 style="text-align:center;">LOGGA IN</h1>
                        <hr>
                    </div>
                    <div class="index_login hidden-xs hidden-sm col-md-8">
                    <h1>Våra blogginlägg</h1>
                    <hr>
                </div>
                </div>
                <div class="row">
                        <div class="col-xs-12 right-align">
                            <span class="filter">Filtrera efter:</span>
                            <div class="btn-group">
                                <button type="button" class="btn button-test dropdown-toggle" data-toggle="dropdown">
                                    <span>
                                        <i class="fa fa-arrows-v" aria-hidden="true"></i>
                                    </span>
                                    KATEGORI
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                <form action="index.php" method="POST" class="filter">
                                    <li>
                                        <input href="#" type="submit" name="all" value="Allt"></input>
                                    </li>
                                    <li>
                                        <input href="#" type="submit" name="Klockor" value="Klockor"></input>
                                    </li>
                                    <li>
                                        <input href="#" type="submit" name="Glasögon" value="Glasögon"></input>
                                    </li>
                                    <li>
                                        <input href="#" type="submit" name="Inredning" value="Inredning"></input>
                                    </li>
                                    </form>
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
                <!-- END DIV-ROW -->
                <div class="row">
                    <div class="col-xs-12">
                        <hr>
                            <p style="text-align:center;">
                                <a href="blog.php">Läs alla inlägg här</a>
                            </p>
                        <!--- KNAPPAR SOM SKA ANVÄNDAS VID VG-KRITERIER
                        <p style="text-align:center;">
                            <i class="fa fa-3x fa-chevron-circle-left" aria-hidden="true"></i> button previous | button next
                            <i class="fa fa-3x fa-chevron-circle-right" aria-hidden="true"></i>
                        </p>
                        -->
                    </div>
                    <!-- END DIV-ROW -->
                </div>
                <!-- END DIV-CONTAINER -->
            </div>
            <?php
  require "footer.php";
  ?>
    </body>

</html>
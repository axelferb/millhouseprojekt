<?php
require 'partials/session.php';
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
    <?php
    require 'nav.php';
    ?>
    <div class="jumbotron"></div>
    <div class="blue-line"></div>
    <div class="container">
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
                                            <input href="#" type="submit" name="all" value="Allt">
                                        </li>
                                        <li>
                                            <input href="#" type="submit" name="Klockor" value="Klockor">
                                        </li>
                                        <li>
                                            <input href="#" type="submit" name="Solglasögon" value="Solglasögon">
                                        </li>
                                        <li>
                                            <input href="#" type="submit" name="Inredning" value="Inredning">
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
                                   <form action="index.php" method="POST" class="filter">
                                    <li>
                                        <input href="#" type="submit" name="all" value="Allt">
                                    </li>
                                    <li>
                                        <input href="#" type="submit" name="Klockor" value="Klockor">
                                    </li>
                                    <li>
                                        <input href="#" type="submit" name="Solglasögon" value="Solglasögon">
                                    </li>
                                    <li>
                                        <input href="#" type="submit" name="Inredning" value="Inredning">
                                    </li>
                                </form>
                            </ul>
                        </div>
                    </div>
                 <?php
                
                if (isset($_POST['Klockor'])) {
                    handleCategories($_POST["Klockor"], count($posts), 'col-md-6','col-md-6');
                   }
                elseif (isset($_POST['Solglasögon'])) {
                    handleCategories($_POST["Solglasögon"], count($posts, 'col-md-6'), 'col-md-6');
                    }
                elseif (isset($_POST['Inredning'])) {
                    handleCategories($_POST["Inredning"], count($posts, 'col-md-6'), 'col-md-6');
                   }
                else {
                    allCatergories(count($posts), 'col-md-6', 'col-md-6');
                }    

                ?>

    </div>
    <?php
    include "footer.php";
    ?>
</body>

</html>
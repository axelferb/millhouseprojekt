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
    </div>
    <?php
    include "footer.php";
    ?>
</body>

</html>
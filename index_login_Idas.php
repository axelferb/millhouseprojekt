<?php
require 'partials/database.php';



?>
<!--    <div class="hidden-xs hidden-sm col-md-4 login-wrap">-->
           <div class="login-field">
            <?php
            if(isset($_SESSION["user"])){
                // FETCHING USER
                $user = $_SESSION["user"]["id"];

                // BELOW FETCHES PROFILE PICTURE
                $statement3 = $pdo->prepare("
                SELECT image 
                FROM users 
                WHERE id = :user
                ");
                $statement3->execute(array(
                ":user" => $user
                )); 
                $profile_img = $statement3->fetchAll(PDO::FETCH_ASSOC);
                foreach($profile_img as $img){ 
                    if($img["image"] == NULL){ ?>
                <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                <?php
                    }
                    else{ 
                    ?>
                    <img src="<?=$img[" image "];?>" width="160">
                    <?php
                    } 
                    }
                    ?>
                        <?php
                echo "<h1 class='text-center white-text'>Välkommen:<br/>" . 
                $_SESSION["user"]["username"] . 
                "</h1>";   
            ?>
                           
                           <?php 
                            if($_SESSION["user"]["username"] == "admin"){ ?>
                            <a class="btn-default btn-lg btn-block" href="profilepage_admin.php">Till adminsida</a>
                            <?php }else{ ?>
                            <a class="btn-default btn-lg btn-block" href="profilepage.php">Till Profilsida</a>
                            <?php } ?>
                            <a class="btn button-green btn-lg btn-block" href="new_post_form.php">Skriv inlägg</a>
                            <br>
                            <a href="partials/log_out.php">
                                <h3>Logga ut</h3>
                            </a>

                            <?php
            }
                else{
            ?>

                                <form class="index-form" action="partials/login.php" method="POST">

                                    <div class="form-group">
                                        <input type="text" placeholder="&#xf007;  Användarnamn" name="username" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <input type="password" placeholder="&#xf023;  Lösenord" name="password" class="form-control">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <input type="submit" value="LOGGA IN" class="btn button-green btn-lg btn-block">
                                    </div>
                                    <p>Har du inget konto?</p>
                                    <a href="register_form.php">
                                        <h3>Registrera dig</h3>
                                    </a>
                                    <?php
            }
         ?>
        </div>
<!--    </div>-->

    </form>
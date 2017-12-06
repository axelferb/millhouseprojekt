<?php



    
    


// PRINTS OUT REGULAR BLOG POST IN INDEX.PHP/BLOG.PHP
function image_category($print){
    
    //COUNTS TOTAL NUMBERS OF COMMENTS ON A POST
    function get_comment_count($idoriginalpost){
    require 'partials/database.php';
    $statement_comments_post = $pdo->prepare("
    SELECT COUNT(comment) as total
    FROM comments
    WHERE idoriginalpost = :post
    ");
    $statement_comments_post->execute(array(
    ":post" => $idoriginalpost
    ));
    return $statement_comments_post->fetch(PDO::FETCH_ASSOC);
}
                  
            foreach($print as $blogdata){ ?>
                      
                <!---  THESE 2 DIV'S BELOWS NEED A LITTLE BIT OF STYLING! 
                      AND THE INLINESTYLING NEEDS TO BE MOVED TO STYLE.CSS -->
                       
                <div class="col-xs-12, col-md-6" style="height: 600px; overflow: hidden;">
                       
                <!-- DIV BELOW CONTROL HEIGHT ON POST, THUS ALSO PLACEMENT OF "Läs mer & kommentera"-BUTTON 
                   --> 
                    <div style="height: 550px; overflow: hidden;">

                        <?php
                    // IMAGE & CATEGORY: IF WATCHES
                        if($blogdata["category"] == 'Klockor'){ ?>
                            <div class="watch2 cat"> <?php
                                if(!($blogdata["image"] == NULL)){ ?>
                                    <img src="<?=$blogdata["image"];?>" alt="Klockor"><?php    
                                }else{ ?>
                                    <img src="images/klockor_profil.png" alt="Klockor">'; 
                                <?php } ?>
                               </div>
                                <div>
                                <p class="watch-label uppercase small text-bold">Klockor</p>
                               </div>
                               <?php
                            
                    // IMAGE & CATEGORY: IF SUNGLASSES
                        }elseif($blogdata["category"] == 'Solglasögon'){ ?>
                                <div class="sunglasses2 cat"> 
                                   <?php
                                    if(!($blogdata["image"] == NULL)){ ?>
                                        <img src="<?=$blogdata["image"];?>" alt="Solglasögon"><?php    
                                    }else{ ?>
                                        <img src="images/glasses_profil.png" alt="Solglasögon">
                                    <?php }?>
                                   </div>
                               <div>
                                <p class="sunglasses-label uppercase small text-bold">Solglasögon</p>
                               </div>
                                   <?php
                            
                    // IMAGE & CATEGORY: IF INTERIOR DESIGN
                        }elseif($blogdata["category"] == 'Inredning'){ ?>
                                <div class="furnish2 cat"> 
                                    <?php
                                    if(!($blogdata["image"] == NULL)){ ?>
                                        <img src="<?=$blogdata["image"];?>" alt="Inredning"><?php    
                                    }else{ ?>
                                        <img src="images/inredning_profil.png" alt="Inredning">
                                    <?php } ?>         
                               </div>
                               <div>
                                <p class="furnish-label uppercase small text-bold">Inredning</p>
                               </div>
                               <?php
                        }?>
 
                        <div>
                            <h2><a href="post.php?post=<?=$blogdata["id"]?>"><?=$blogdata["title"]?></a></h2>
                        </div>
                       
                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                        <?= $blogdata["date"] . ' | ' ; ?>  
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
                        <?= $blogdata["firstname"] . ' ' . $blogdata["lastname"]  . '</br>'; ?> 
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> 
                        <?= $blogdata["email"]; ?>  
                        <p class="blogpost-text">
                            <?php
                               $short_text = $blogdata["post"];
                                echo substr($short_text, 0, 200) . '...';
                            ?> 
                        </p>   
                    </div>
                    
                    <div style="padding: 10px;">
                        <a class="btn button-test btn-block" href="post.php?post=<?=$blogdata["id"];?>">
                        Läs mer & kommentera
                        <?php
                            //TOTAL COMMENTS ON A POST
                            $comments_count = get_comment_count($blogdata["id"]);
                            echo '(' . $comments_count["total"] . ')';
                        ?>
                        </a>
                        
                        
                    </div> 

            </div>              
        <?php
            }

        ?>
<?php    
}
 


// PRINTS OUT FIRST BIGGER BLOG POST ON INDEX.PHP
function first_image_category($print){

    //COUNTS TOTAL NUMBERS OF COMMENTS ON A POST
    function get_comment_count_big($idoriginalpost){
    require 'partials/database.php';
    $statement_comments_post = $pdo->prepare("
    SELECT COUNT(comment) as total
    FROM comments
    WHERE idoriginalpost = :post
    ");
    $statement_comments_post->execute(array(
    ":post" => $idoriginalpost
    ));
    return $statement_comments_post->fetch(PDO::FETCH_ASSOC);
}
                 
            foreach($print as $blogdata){ ?>
                       
                <div style="height: 600px; overflow: hidden;">
                       
                    <div style="height: 550px; overflow: hidden;">

                        <?php
                    // IMAGE & CATEGORY: IF WATCHES
                        if($blogdata["category"] == 'Klockor'){ ?>
                            <div class="watch2 post_size"> <?php
                                if(!($blogdata["image"] == NULL)){ ?>
                                    <img src="<?=$blogdata["image"];?>"><?php    
                                }else{ ?>
                                    <img src="images/klockor_profil.png" alt="Klockor">'; 
                                <?php } ?>
                               </div>
                                <div>
                                <p class="watch-label uppercase small text-bold">Klockor</p>
                               </div>
                               <?php
                            
                    // IMAGE & CATEGORY: IF SUNGLASSES
                        }elseif($blogdata["category"] == 'Solglasögon'){ ?>
                                <div class="sunglasses2 post_size"> 
                                   <?php
                                    if(!($blogdata["image"] == NULL)){ ?>
                                        <img src="<?=$blogdata["image"];?>"><?php    
                                    }else{ ?>
                                        <img src="images/glasses_profil.png" alt="Solglasögon">
                                    <?php }?>
                                   </div>
                               <div>
                                <p class="sunglasses-label uppercase small text-bold">Solglasögon</p>
                               </div>
                                   <?php
                            
                    // IMAGE & CATEGORY: IF INTERIOR DESIGN
                        }elseif($blogdata["category"] == 'Inredning'){ ?>
                                <div class="furnish2 post_size"> 
                                    <?php
                                    if(!($blogdata["image"] == NULL)){ ?>
                                        <img src="<?=$blogdata["image"];?>"><?php    
                                    }else{ ?>
                                        <img src="images/glasses_profil.png" alt="Solglasögon">
                                    <?php } ?>         
                               </div>
                               <div>
                                <p class="furnish-label uppercase small text-bold">Inredning</p>
                               </div>
                               <?php
                        }?>
                        <div>
                            <h2><a href="post.php?post=<?=$blogdata["id"]?>"><?=$blogdata["title"]?></a></h2>
                        </div>
                       
                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                        <?= $blogdata["date"] . ' | '   ; ?>  
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
                        <?= $blogdata["firstname"] . ' ' . $blogdata["lastname"] . '</br>'; ?> 
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> 
                        <?= $blogdata["email"]; ?>  
                        <p class="blogpost-text">
                            <?php
                               $short_text = $blogdata["post"];
                                echo substr($short_text, 0, 200) . '...';
                            ?> 
                        </p>   
                    </div>
                    
                    <div style="padding: 10px;">
                        <a class="btn button-test btn-block" href="post.php?post=<?=$blogdata["id"];?>">Läs mer & kommentera
                        <?php
                            //TOTAL COMMENTS ON A POST
                            $comments_count = get_comment_count_big($blogdata["id"]);
                            echo '(' . $comments_count["total"] . ')';
                        ?>
                        </a>   
                                                                
                    </div> 

            </div>              
        <?php
            }
        ?>
<?php    
}


?>
<?php

function handleUsers(){
        
    global $userinfo;
    
        foreach($userinfo as $userInformation){ ?> 
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
<?php   echo $userInformation["firstname"] . ' ';
        echo $userInformation["lastname"] . ' ' . ' | '; ?>
            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
<?php   echo ' ' . $userInformation["email"];
                                }
}

function handleImage($category, $image_source){
    
    
    if(!$image_source == NULL){
        ?>
        <img class="img-fluid" src="<?= $image_source; ?>">
        <?php    
    }else{
        if ($category == 'Klockor'){
        echo '<img class="img-fluid" src="images/klockor_profil.png" alt="Klockor">';
        }
        if ($category == 'Solglasögon'){
        echo '<img class="img-fluid" src="../images/glasses_profil.png" alt="Solglasögon">';
        }
        if ($category == 'Inredning'){
        echo '<img class="img-fluid" src="../images/inredning_profil.png" alt="Inredning">';
}
}
}
function handleCategories($category, $amount, $big_div, $small_div) {
    $i = 0; 
    global $posts; 
    foreach($posts as $list){ 
        if($i==$amount) break; 
        
        if ($category == $list['category']){
        
        if ($i == 0 && $big_div == 'col-md-8'){ ?>
            <article class='col-xs-12 <?php echo $big_div; ?> '>
            <div class="img-wrap-big"><?php handleImage($list["category"], $list["image"])?></div>

        <?php
       
                    }else { 
                            ?>
            <article class='col-xs-12 <?php echo $small_div; ?>'>

                    <div class="img-wrap-small"><?php handleImage($list["category"], $list["image"]) ?></div>
            <?php } ?>
                <div class="article-text">

                    <?php
                    if($list["category"] == 'Klockor'){
                        echo '<div class="klocka-big"></div>';
                        echo '<p class="watch-label uppercase small text-bold">Klockor</p>';
                    }
                    if($list["category"] == 'Solglasögon'){
                        echo '<div class="glasögon-big"></div>';
                        echo '<p class="sunglasses-label uppercase small text-bold">Solglasögon</p>';
                    }
                    if($list["category"] == 'Inredning'){
                        echo '<div class="inredning-big"></div>';
                        echo '<p class="furnish-label uppercase small text-bold">Inredning</p>';
                    }
                    ?>

                    <h2>
                        <?php echo '<a href="post.php?post=' . $list["id"] . '">';
                              echo $list["title"]; 
                              echo '</a>';  ?>
                    </h2>

                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                    <?php echo $list["date"] . ' | '; ?>

                    <?php 
                    $bigText = $list["post"];
                    $smallText = substr($bigText, 0, 100);
                    echo '<p class="blogpost-text">';
                    echo "$smallText" . "..."; 
                    echo '</p>';
                    ?>
                    <a class="btn button-test btn-block" href="post.php?post=<?=$list["id"];?>" target="_self">Läs mer & kommentera</a>
                </div>

                </article>
                <?php
                if ($i == 0 && $big_div == 'col-md-8'){ 
                    require 'index_login.php';
                    }
            
            $i++;
            }
            }
            }
    
function allCatergories($amount, $big_div, $small_div) {
    $i = 0;
    global $posts; 
    foreach($posts as $list){ 
        if($i==$amount) break; 
        
        if ($i == 0 && $big_div == 'col-md-8'){ ?>
            <article class='col-xs-12 <?php echo $big_div; ?> '>
            <div class="img-wrap-big"><?php handleImage($list["category"], $list["image"])?></div>

        <?php
       
                    }else { 
                            ?>
            <article class='col-xs-12 <?php echo $small_div; ?>'>

                    <div class="img-wrap-small"><?php handleImage($list["category"], $list["image"]) ?></div>
            <?php } ?>
                <div class="article-text">

                    <?php
                    if($list["category"] == 'Klockor'){
                        echo '<div class="klocka"></div>';
                        echo '<p class="watch-label uppercase small text-bold">Klockor</p>';
                    }
                    if($list["category"] == 'Solglasögon'){
                        echo '<div class="glasögon"></div>';
                        echo '<p class="sunglasses-label uppercase small text-bold">Solglasögon</p>';
                    }
                    if($list["category"] == 'Inredning'){
                        echo '<div class="inredning"></div>';
                        echo '<p class="furnish-label uppercase small text-bold">Inredning</p>';
                    }
                    ?>

                    <h2><?php echo '<a href="post.php?post=' . $list["id"] . '">';
                              echo $list["title"]; 
                              echo '</a>';  ?>
                    </h2>

                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                    <?php echo $list["date"] . ' | '; 
                    $bigText = $list["post"];
                    $smallText = substr($bigText, 0, 100);
                    echo '<p class="blogpost-text">';
                    echo "$smallText" . "..."; 
                    echo '</p>'; ?>
                    <a class="btn button-test btn-block" href="post.php?post=<?=$list["id"];?>" target="_self">Läs mer & kommentera</a>
                    
                </div>

                </article>
                <?php
                if ($i == 0 && $big_div == 'col-md-8'){ 
                    require 'index_login.php';
                    }
            
            $i++;
            }
            }
    



function specificPost($amount) {



    $i = 0;
    global $posts;
    global $userinfo;
    foreach($posts as $list){
        if($i==$amount) break;

        if ($i == 0){
            ?>
                        <article class='col-xs-12'>

                            <div class="img-wrap-big full-width">
                                  <?php
                                // FETCH IMAGE FORM DATABASE, NEEDS WORK?? /IDA
                                if(!($list["image"] == NULL)){
                                ?>
                                <img class="img-fluid" src="<?=$list["image"];?>"> 
                                <?php    
                                }else{
                                    handleImage($list['category']);
                                } ?>
                            </div>   
                            
                          <?php
            
                                    if($list["category"] == 'Klockor'){
                                        echo '<div class="klocka"></div>';
                                        echo '<p class="watch-label uppercase small text-bold">Klockor</p>';
                                    }
                                    if($list["category"] == 'Glasögon'){
                                        echo '<div class="glasögon"></div>';
                                        echo '<p class="sunglasses-label uppercase small text-bold">Solglasögon</p>';
                                    }
                                    if($list["category"] == 'Inredning'){
                                        echo '<div class="inredning"></div>';
                                        echo '<p class="furnish-label uppercase small text-bold">Inredning</p>';
                                    }
     
                            ?>
                            
                            
                        </article>
                        
<!--- Lists the specific blog post with created-date and name of the author --->                            
                                <h2>

                                    <?php echo $list["title"]; ?>
                                </h2>
                                
                                <span class="glyphicon glyphicon-time" aria-hidden="true"></span> 
                            <?php   echo $list["date"] . ' | ';
            
                                foreach($userinfo as $userInformation){ ?> 
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
                            <?php   echo $userInformation["firstname"] . ' ';
                                    echo $userInformation["lastname"] . ' ' . ' | '; ?>
                                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                            <?php   echo ' ' . $userInformation["email"];
                                }
                                ?>
            
                                <p>
                                    <?php echo $list["post"]; ?> 
                                </p>
                            <?php
            
        }

        $i++;
}
}

?>
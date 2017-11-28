<?php

/*
function handleCategory($category) {

    global $posts;
    foreach($posts as $list){

        if ($category == $list['category']){
?>
    <div class='col-xs-12 col-md-6'>

        <<<<<<< HEAD <<<<<<< HEAD <div class="profilbild-small">
    </div>
    <h2>
        <?php echo $list["title"]; ?> </h2>
    <p>
        <?php echo $list["post"]; ?> </p>
    =======
    <div class="profilbild"></div>
    <h2>
        <?php echo $list["title"]; ?> </h2>
    <p>
        <?php echo $list["post"]; ?> </p>
    >>>>>>> master =======

    <div class="profilbild-small"></div>
    <h2>
        <?php echo $list["title"]; ?> </h2>
    <p>
        <?php echo $list["post"]; ?> </p>
    >>>>>>> 364c8ab95225fa271c8721328a506528a532ffa0


    </div>
    <?php
                                    
}
}
}



function allCategories() {

    global $posts;
    foreach($posts as $list){

?>
        <<<<<<< HEAD <<<<<<< HEAD <div class='col-xs-12 col-md-6'>
            <div class="profilbild-small"></div>
            <h2>
                <?php echo $list["title"]; ?> </h2>
            <span class="author">DATUM | NAMN | EMAILADRESS</span>
            <p>
                <?php echo $list["post"]; ?> </p>
            </div>
            ======= ======= >>>>>>> 364c8ab95225fa271c8721328a506528a532ffa0
            <div class='col-xs-12 col-md-6'>

                <div class="profilbild-small"></div>
                <h2>
                    <?php echo $list["title"]; ?> </h2>
                <span class="author">DATUM | NAMN | EMAILADRESS</span>
                <p>
                    <?php echo $list["post"]; ?> </p>

            </div>
            <<<<<<< HEAD>>>>>>> master ======= >>>>>>> 364c8ab95225fa271c8721328a506528a532ffa0
                <?php
                                    
}
} 
*/

function handleImage($category){
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


function handleCategories($category, $amount) {
    $i = 0;
    global $posts;
    foreach($posts as $list){

    if($i==$amount) break;

        if ($category == $list['category']){
            
        if($i == 0){    
?>
                    <article class='col-xs-12 col-md-8'>

                        <div class="img-wrap-big">
                        
                        <?php                          
                        handleImage($list['category']); 
                            ?></div>
                        <?php
                        if($list["category"] == 'Klockor'){
                            echo '<div class="klocka-big"></div>';
                            echo '<p>Klockor</p>';
                        }
                        if($list["category"] == 'Solglasögon'){
                            echo '<div class="glasögon-big"></div>';
                            echo '<p>Solglasögon</p>';
                        }
                        if($list["category"] == 'Inredning'){
                            echo '<div class="inredning-big"></div>';
                            echo '<p>Inredning</p>';
                        }
                    ?>
                            <h2>
                                <?php echo $list["title"]; ?> </h2>
                            <p>      
                                <?php 
                                $bigText = $list["post"];
                                $smallText = substr($bigText, 0, 100);

                                echo "$smallText" . "..."; ?>            
                            </p>
                    </article>
                    <?php
                    require 'index_login.php';
        }
         else {
                ?>
                        <article class='col-xs-12 col-md-6 div-max-height'>
                            <div class="img-wrap-small">
                            <?php 
                                handleImage($list['category']);   
                            ?>
                            </div>
                            <?php
                        if($list["category"] == 'Klockor'){
                            echo '<div class="klocka"></div>';
                            echo '<p>Klockor</p>';
                        }
                        if($list["category"] == 'Solglasögon'){
                            echo '<div class="glasögon"></div>';
                            echo '<p>Solglasögon</p>';
                        }
                        if($list["category"] == 'Inredning'){
                            echo '<div class="inredning"></div>';
                            echo '<p>Inredning</p>';
                        }
                    ?>
                                <h2>
                                    <?php echo $list["title"]; ?>
                                </h2>
                                 <p>  
                                    <?php 
                                    $bigText = $list["post"];
                                    $smallText = substr($bigText, 0, 100);

                                    echo "$smallText" . "..."; ?>            
                                </p>
                        </article>
                        <?php 
         }
            $i++;
}
}
}



function allCatergories($amount) {

    $i = 0;
    global $posts;
    foreach($posts as $list){
        if($i==$amount) break;

        if ($i == 0){
            ?>
                        <article class='col-xs-12 col-md-8'>
                    
                            <div class="img-wrap-big"><?php handleImage($list['category']); ?></div>
                            <?php
                        if($list["category"] == 'Klockor'){
                            echo '<div class="klocka-big"></div>';
                            echo '<p>Klockor</p>';
                        }
                        if($list["category"] == 'Solglasögon'){
                            echo '<div class="glasögon-big"></div>';
                            echo '<p>Solglasögon</p>';
                        }
                        if($list["category"] == 'Inredning'){
                            echo '<div class="inredning-big"></div>';
                            echo '<p>Inredning</p>';
                        }
                    ?>
                                <h2>
                                 <?php
                            
                                    echo $list["title"];  
                                ?>
                               </h2>
                               
                               <span class="glyphicon glyphicon-time" aria-hidden="true"></span> 
                            <?php   echo $list["date"] . ' | '; ?>

                                <p>
                                       
                                    <?php 
                                    $bigText = $list["post"];
                                    $smallText = substr($bigText, 0, 100);

                                    echo "$smallText" . "..."; ?>            
                                </p>
                                   

                        </article>
                        <?php
                        require 'index_login.php';
            
        }
        else{
            ?>
                            <article class='col-xs-12 col-md-6 div-max-height'>

                                <div class="img-wrap-small"><?php handleImage($list['category']); ?></div>
                                <?php
                        if($list["category"] == 'Klockor'){
                            echo '<div class="klocka"></div>';
                            echo '<p>Klockor</p>';
                        }
                        if($list["category"] == 'Solglasögon'){
                            echo '<div class="glasögon"></div>';
                            echo '<p>Solglasögon</p>';
                        }
                        if($list["category"] == 'Inredning'){
                            echo '<div class="inredning"></div>';
                            echo '<p>Inredning</p>';
                        }
                    ?>
                                    <h2>
                                        <?php echo $list["title"]; ?> </h2>
                                        
                                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span> 
                            <?php   echo $list["date"] . ' | ';?>
                                        
                                    <p>
                                        <?php 
                                        $bigText = $list["post"];
                                        $smallText = substr($bigText, 0, 100);
            
                                        echo "$smallText" . "..."; ?>            
                                    </p>

                            </article>

                            <?php
            
        }
        $i++;
}
}

    ?>
    
<?php

function specificPost($amount) {



    $i = 0;
    global $posts;
    global $userinfo;
    foreach($posts as $list){
        if($i==$amount) break;

        if ($i == 0){
            ?>
                        <article class='col-xs-12'>

                            <div class="img-wrap-big">
                                  <?php
                                // FETCH IMAGE FORM DATABASE, NEEDS WORK?? /IDA
                                if(!($list["image"] == NULL)){
                                ?>
                                <img src="<?=$list["image"];?>" width="400"> 
                                <?php    
                                }else{
                                    handleImage($list['category']);
                                } ?>
                                
                            
                          <?php
            
                                    if($list["category"] == 'Klockor'){
                                        echo '<div class="klocka-big"></div>';
                                        echo '<p>Klockor</p>';
                                    }
                                    if($list["category"] == 'Glasögon'){
                                        echo '<div class="glasögon-big"></div>';
                                        echo '<p>Glasögon</p>';
                                    }
                                    if($list["category"] == 'Inredning'){
                                        echo '<div class="inredning-big"></div>';
                                        echo '<p>Inredning</p>';
                                    }
     
                            ?>
                            
                            </div>
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

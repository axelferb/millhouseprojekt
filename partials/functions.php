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
         echo '<img src="images/klockor_profil.png" alt="Klockor">';
}
    if ($category == 'Solglasögon'){
         echo '<img src="../images/glasses_profil.png" alt="Solglasögon">';
}
    if ($category == 'Inredning'){
         echo '<img src="../images/inredning_profil.png" alt="Inredning">';
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

                        <div class="profilbild-big"><?php handleImage($list['category']); ?></div>
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
                                <?php echo $list["post"]; ?> </p>
                    </article>
                    <?php
                    require 'index_login.php';
        }
         else {
                ?>
                        <article class='col-xs-12 col-md-6 div-max-height'>
                            <div class="profilbild-small"><?php handleImage($list['category']); ?></div>
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
                                    <?php echo $list["post"]; ?> </p>
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

                            <div class="profilbild-big"><?php handleImage($list['category']); ?></div>
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
                                        $smallText = substr($bigText, 0, 70);
            
                                        echo "$smallText" . "..."; ?>            
                                </p>
                                   

                        </article>
                        <?php
                        require 'index_login.php';
            
        }
        else{
            ?>
                            <article class='col-xs-12 col-md-6 div-max-height'>

                                <div class="profilbild-small"><?php handleImage($list['category']); ?></div>
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
    foreach($posts as $list){
        if($i==$amount) break;

        if ($i == 0){
            ?>
                        <article class='col-xs-12'>

                            <div class="profilbild-big"></div>
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
                        </article>
                        <h2>
                                    <?php echo $list["title"]; ?>
                                </h2>
                                <p>
                                    <?php echo $list["post"]; ?> </p>
                        <?php
            
        }

        $i++;
}
}


    ?>

<?php


/*
function handleCategory($category) {

    global $posts;
    foreach($posts as $list){

        if ($category == $list['category']){
?>
            <div class='col-xs-12 col-md-6'>
                        

                <div class="profilbild-small"></div>
                <h2> <?php echo $list["title"]; ?> </h2>
                <p> <?php echo $list["post"]; ?> </p>


            </div>
<?php
                                    
}
}
}



function allCategories() {

    global $posts;
    foreach($posts as $list){

?>
        <div class='col-xs-12 col-md-6'>

            <div class="profilbild-small"></div>
            <h2> <?php echo $list["title"]; ?> </h2>
            <span class="author">DATUM   |   NAMN   |   EMAILADRESS</span>
            <p> <?php echo $list["post"]; ?> </p>
            
        </div>
<?php
                                    
}
} 
*/

function handleCategories($category, $amount) {
    $i = 0;
    global $posts;
    foreach($posts as $list){
    if($i==$amount) break;

        if ($category == $list['category']){
            
        if($i == 0){    
?>
            <div class='col-xs-12 col-md-8'>
                        
                <div class="profilbild-big"></div>
                <h2> <?php echo $list["title"]; ?> </h2>
                <p> <?php echo $list["post"]; ?> </p>


            </div>
        
<?php
        }
         else {
             ?>
             <div class='col-xs-12 col-md-6'>
                        
                <div class="profilbild-small"></div>
                <h2> <?php echo $list["title"]; ?></h2>
                <p> <?php echo $list["post"]; ?> </p>


            </div>
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
            <div class='col-xs-12 col-md-8'>
                        
                <div class="profilbild-big"></div>
                <h2> <?php echo $list["title"]; ?> </h2>
                <p> <?php echo $list["post"]; ?> </p>


            </div>
<?php
            
        }
        else{
            ?>
            <div class='col-xs-12 col-md-6'>
                        
                <div class="profilbild-small"></div>
                <h2> <?php echo $list["title"]; ?> </h2>
                <p> <?php echo $list["post"]; ?> </p>


            </div>
            
<?php
            
        }
        $i++;
}
}


    ?> 
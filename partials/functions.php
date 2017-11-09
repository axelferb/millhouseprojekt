<?php


function handleCategory($category) {

        global $posts;
        foreach($posts as $list){

            if ($category == $list['category']){
?>
                <div class='col-xs-12 col-md-6'>
                        
                        <div class="profilbild"></div>
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

        <div class="profilbild"></div>
        <h2> <?php echo $list["title"]; ?> </h2>
        <p> <?php echo $list["post"]; ?> </p>
    </div>

<?php
                                    
}
}



    ?> 
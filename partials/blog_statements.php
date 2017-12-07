<?php

// ALL POSTS
    $statement = $pdo->prepare("
    SELECT users.id AS userid, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
    posts.id AS id,
    posts.post AS post,
    posts.title AS title, 
    posts.date AS date, 
    posts.category AS category, 
    posts.image AS image,
    posts.user
    FROM posts 
    INNER JOIN users 
	ON users.id =  posts.user
    ORDER BY posts.id DESC
    LIMIT 6 OFFSET $offset_number
    ");  
    $statement->execute();
    $post_info = $statement->fetchAll(PDO::FETCH_ASSOC);

// OLDEST FIRST (ASC)
    $statement_asc = $pdo->prepare("
    SELECT users.id AS userid, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
    posts.id AS id,
    posts.post AS post,
    posts.title AS title, 
    posts.date AS date, 
    posts.category AS category, 
    posts.image AS image,
    posts.user
    FROM posts 
    INNER JOIN users 
	ON users.id =  posts.user
    ORDER BY posts.id ASC
    LIMIT 6 OFFSET $offset_number
    ");  
    $statement_asc->execute();
    $post_info_asc = $statement_asc->fetchAll(PDO::FETCH_ASSOC);

    $statement_count = $pdo->prepare("
    SELECT COUNT(DISTINCT id) as total
    FROM posts
    ");
    $statement_count->execute();
    $p_count = $statement_count->fetch(PDO::FETCH_ASSOC);

// WATCHES
    $statement2 = $pdo->prepare("
    SELECT users.id, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
    posts.id AS id,
    posts.post AS post,
    posts.title AS title, 
    posts.date AS date, 
    posts.category AS category, 
    posts.image AS image,
    posts.user
    FROM posts 
    INNER JOIN users 
	ON users.id =  posts.user
    WHERE posts.category = 'Klockor'
    ORDER BY posts.id DESC
    ");
    $statement2->execute();
    $post_info_watches = $statement2->fetchAll(PDO::FETCH_ASSOC);

// GLASSES
    $statement3 = $pdo->prepare("
    SELECT users.id, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
    posts.id AS id,
    posts.post AS post,
    posts.title AS title, 
    posts.date AS date, 
    posts.category AS category, 
    posts.image AS image,
    posts.user
    FROM posts 
    INNER JOIN users 
	ON users.id =  posts.user
    WHERE posts.category = 'Solglasögon'
    ORDER BY posts.id DESC
    ");
    $statement3->execute();
    $post_info_glasses = $statement3->fetchAll(PDO::FETCH_ASSOC);

// INTERIOR
    $statement4 = $pdo->prepare("
    SELECT users.id, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
    posts.id AS id,
    posts.post AS post,
    posts.title AS title, 
    posts.date AS date, 
    posts.category AS category, 
    posts.image AS image,
    posts.user
    FROM posts 
    INNER JOIN users 
	ON users.id =  posts.user
    WHERE posts.category = 'Inredning'
    ORDER BY posts.id DESC
    ");
    $statement4->execute();
    $post_info_interior = $statement4->fetchAll(PDO::FETCH_ASSOC);


///////////////// DISPLAY PER MONTH ///////////


// MONTH: JANUARY

    $statement = $pdo->prepare("
    SELECT 
    users.id AS userid, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
    posts.id AS id,
    posts.post AS post,
    posts.title AS title, 
    posts.date AS date, 
    posts.category AS category, 
    posts.image AS image,
    posts.user
    FROM posts 
    INNER JOIN users 
	ON users.id =  posts.user
    WHERE MONTH(date) = 1 AND YEAR(date) = 2017
    ORDER BY posts.id DESC
    ");  
    $statement->execute();
    $post_info_january = $statement->fetchAll(PDO::FETCH_ASSOC);

// MONTH: FEBRUARY

    $statement = $pdo->prepare("
    SELECT 
    users.id AS userid, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
    posts.id AS id,
    posts.post AS post,
    posts.title AS title, 
    posts.date AS date, 
    posts.category AS category, 
    posts.image AS image,
    posts.user
    FROM posts 
    INNER JOIN users 
	ON users.id =  posts.user
    WHERE MONTH(date) = 2 AND YEAR(date) = 2017
    ORDER BY posts.id DESC
    ");  
    $statement->execute();
    $post_info_february = $statement->fetchAll(PDO::FETCH_ASSOC);

// MONTH: MARCH

    $statement = $pdo->prepare("
    SELECT 
    users.id AS userid, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
    posts.id AS id,
    posts.post AS post,
    posts.title AS title, 
    posts.date AS date, 
    posts.category AS category, 
    posts.image AS image,
    posts.user
    FROM posts 
    INNER JOIN users 
	ON users.id =  posts.user
    WHERE MONTH(date) = 3 AND YEAR(date) = 2017
    ORDER BY posts.id DESC
    ");  
    $statement->execute();
    $post_info_march = $statement->fetchAll(PDO::FETCH_ASSOC);

// MONTH: APRIL

    $statement = $pdo->prepare("
    SELECT 
    users.id AS userid, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
    posts.id AS id,
    posts.post AS post,
    posts.title AS title, 
    posts.date AS date, 
    posts.category AS category, 
    posts.image AS image,
    posts.user
    FROM posts 
    INNER JOIN users 
	ON users.id =  posts.user
    WHERE MONTH(date) = 4 AND YEAR(date) = 2017
    ORDER BY posts.id DESC
    ");  
    $statement->execute();
    $post_info_april = $statement->fetchAll(PDO::FETCH_ASSOC);

// MONTH: MAY

    $statement = $pdo->prepare("
    SELECT 
    users.id AS userid, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
    posts.id AS id,
    posts.post AS post,
    posts.title AS title, 
    posts.date AS date, 
    posts.category AS category, 
    posts.image AS image,
    posts.user
    FROM posts 
    INNER JOIN users 
	ON users.id =  posts.user
    WHERE MONTH(date) = 5 AND YEAR(date) = 2017
    ORDER BY posts.id DESC
    ");  
    $statement->execute();
    $post_info_may = $statement->fetchAll(PDO::FETCH_ASSOC);

// MONTH: JUNE
    $statement = $pdo->prepare("
    SELECT 
    users.id AS userid, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
    posts.id AS id,
    posts.post AS post,
    posts.title AS title, 
    posts.date AS date, 
    posts.category AS category, 
    posts.image AS image,
    posts.user
    FROM posts 
    INNER JOIN users 
	ON users.id =  posts.user
    WHERE MONTH(date) = 6 AND YEAR(date) = 2017
    ORDER BY posts.id DESC
    ");  
    $statement->execute();
    $post_info_june = $statement->fetchAll(PDO::FETCH_ASSOC);

// MONTH: JULY

    $statement = $pdo->prepare("
    SELECT 
    users.id AS userid, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
    posts.id AS id,
    posts.post AS post,
    posts.title AS title, 
    posts.date AS date, 
    posts.category AS category, 
    posts.image AS image,
    posts.user
    FROM posts 
    INNER JOIN users 
	ON users.id =  posts.user
    WHERE MONTH(date) = 7 AND YEAR(date) = 2017
    ORDER BY posts.id DESC
    ");  
    $statement->execute();
    $post_info_july = $statement->fetchAll(PDO::FETCH_ASSOC);

// MONTH: AUGUST

    $statement = $pdo->prepare("
    SELECT 
    users.id AS userid, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
    posts.id AS id,
    posts.post AS post,
    posts.title AS title, 
    posts.date AS date, 
    posts.category AS category, 
    posts.image AS image,
    posts.user
    FROM posts 
    INNER JOIN users 
	ON users.id =  posts.user
    WHERE MONTH(date) = 8 AND YEAR(date) = 2017
    ORDER BY posts.id DESC
    ");  
    $statement->execute();
    $post_info_august = $statement->fetchAll(PDO::FETCH_ASSOC);

// MONTH: SEPTEMBER

    $statement = $pdo->prepare("
    SELECT 
    users.id AS userid, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
    posts.id AS id,
    posts.post AS post,
    posts.title AS title, 
    posts.date AS date, 
    posts.category AS category, 
    posts.image AS image,
    posts.user
    FROM posts 
    INNER JOIN users 
	ON users.id =  posts.user
    WHERE MONTH(date) = 9 AND YEAR(date) = 2017
    ORDER BY posts.id DESC
    ");  
    $statement->execute();
    $post_info_september = $statement->fetchAll(PDO::FETCH_ASSOC);

// MONTH: OCTOBER

    $statement = $pdo->prepare("
    SELECT 
    users.id AS userid, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
    posts.id AS id,
    posts.post AS post,
    posts.title AS title, 
    posts.date AS date, 
    posts.category AS category, 
    posts.image AS image,
    posts.user
    FROM posts 
    INNER JOIN users 
	ON users.id =  posts.user
    WHERE MONTH(date) = 10 AND YEAR(date) = 2017
    ORDER BY posts.id DESC
    ");  
    $statement->execute();
    $post_info_october = $statement->fetchAll(PDO::FETCH_ASSOC);

// MONTH: NOVEMBER

    $statement = $pdo->prepare("
    SELECT 
    users.id AS userid, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
    posts.id AS id,
    posts.post AS post,
    posts.title AS title, 
    posts.date AS date, 
    posts.category AS category, 
    posts.image AS image,
    posts.user
    FROM posts 
    INNER JOIN users 
	ON users.id =  posts.user
    WHERE MONTH(date) = 11 AND YEAR(date) = 2017
    ORDER BY posts.id DESC
    ");  
    $statement->execute();
    $post_info_november = $statement->fetchAll(PDO::FETCH_ASSOC);

// MONTH: DECEMBER

    $statement = $pdo->prepare("
    SELECT 
    users.id AS userid, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
    posts.id AS id,
    posts.post AS post,
    posts.title AS title, 
    posts.date AS date, 
    posts.category AS category, 
    posts.image AS image,
    posts.user
    FROM posts 
    INNER JOIN users 
	ON users.id =  posts.user
    WHERE MONTH(date) = 12 AND YEAR(date) = 2017
    ORDER BY posts.id DESC
    ");  
    $statement->execute();
    $post_info_december = $statement->fetchAll(PDO::FETCH_ASSOC);

    
?>

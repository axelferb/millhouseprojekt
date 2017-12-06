<?php

    
// USER POSTS STATISTICS
    $statement_count = $pdo->prepare("
    SELECT COUNT(DISTINCT post) as total
    FROM posts
    ");
    $statement_count->execute();
    $p_count = $statement_count->fetch(PDO::FETCH_ASSOC);
    
    
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
    LIMIT 4 OFFSET 1
    ");    
    $statement->execute();
    $post_info = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    $statement2 = $pdo->prepare("
    SELECT users.id, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
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
    
    $statement3 = $pdo->prepare("
    SELECT users.id, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
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
    
    $statement4 = $pdo->prepare("
    SELECT users.id, 
    users.username AS username, 
    users.firstname AS firstname, 
    users.lastname AS lastname, 
    users.email AS email,
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
    
    $statement5 = $pdo->prepare("
    SELECT users.id as userid, 
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
    LIMIT 1
    ");
    $statement5->execute();
    $first_post = $statement5->fetchAll(PDO::FETCH_ASSOC);
    
    $stmt = $pdo->prepare("
    SELECT id
    FROM posts
    ");
    $stmt->execute();
    $first_postt = $pdo->lastInsertId();
    
    ?>
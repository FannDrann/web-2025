<?php
    require_once '../data/sql/scripts.php';
    $connection = connectDatabase();
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, [
    'filter' => FILTER_CALLBACK,
    'options' => function ($value) {
        return (strlen($value) >= 1) ? $value : false;
    }
]);
    if (($id === false)){
        header("Location: http://localhost:3000/lw8/home/");
    }
    $user = findUserInDatabase($connection, $id);
    $posts = findAllUsersPosts($connection, $id);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <title>Profile</title>
</head>
<body> 
    <div class="navigation">
        <a href="http://localhost:3000/lw8/home/">
            <img src="src/home.png" alt="Home">
        </a>
        <a href="http://localhost:3000/lw8/profile/index.php?id=1">
            <img src="src/profile_active.png" alt="Profile">
        </a>
        <img src="src/plus.png" alt="Plus">
    </div>
    <div class="profile">
        <img src=<?= $user['logo_path'] ?> alt="User" class="logo">
        <p class="name"><?= $user['username'] ?></p>
        <p class="description"><?= $user['description']?></p>
        <div class="post">
            <img src="src/post.svg" alt="posts" class="post-img">
            <p class="post-text"><?= count($posts)?>&nbspпостов</p>
        </div>
        <div class="userposts">
            <?php foreach ($posts as $post): ?>
                <img src=<?= $post['image_path'] ?> alt="post" class="pic">
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
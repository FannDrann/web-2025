<?php
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, [
    'filter' => FILTER_CALLBACK,
    'options' => function ($value) {
        return (strlen($value) >= 1) ? $value : false;
    }
]);
    if ($id === false) {
        header("Location: http://localhost:3000/lw11/home/");
    }
    require_once '../data/sql/scripts.php';
    $connection = connectDatabase();
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
        <a href="http://localhost:3000/lw11/home/">
            <img src="src/Menu_Item_1.svg" alt="Home">
        </a>
        <a href="http://localhost:3000/lw9/profile/index.php?id=1">
            <img src="src/Menu_Item_2.svg" alt="Profile">
        </a>
        <img src="src/Menu_Item_3.svg" alt="Plus">
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
                <?php $image = findPostImagesInDatabase($connection, $post['id']);?>
                <img src="<?= htmlspecialchars($image[0]['image_path']) ?>" alt="post" class="pic">
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
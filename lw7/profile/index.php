<?php
    $usersJson = file_get_contents('../users.json');
    $users = json_decode($usersJson, true);
    $id = $_GET['id'] ?? null;
    if (($usersJson === false) || ($users === null) || ($id === null) || (!isset($users[$id]))){
        header("Location: /home/");
    }
    $user = $users[$id];
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
        <a href="http://localhost:3000/lw7/home/">
            <img src="src/home.png" alt="Home">
        </a>
        <a href="http://localhost:3000/lw7/profile/index.php?id=1">
            <img src="src/profile_active.png" alt="Profile">
        </a>
        <img src="src/plus.png" alt="Plus">
    </div>
    <div class="profile">
        <img src=<?= $user['logo'] ?> alt="User" class="logo">
        <p class="name"><?= $user['name'] ?></p>
        <p class="description"><?= $user['description']?></p>
        <div class="post">
            <img src="src/post.svg" alt="posts" class="post-img">
            <p class="post-text"><?= count($user['posts'])?>&nbspпостов</p>
        </div>
        <div class="userposts">
            <?php foreach ($user['posts'] as $post): ?>
                <img src=<?= $post['pic'] ?> alt="post" class="pic">
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
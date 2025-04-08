<?php
    $users = file_get_contents('users.json');
    $users = json_decode($users, true);
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
        <img src="src/home.png" alt="Home">
        <img src="src/profile_active.png" alt="Profile">
        <img src="src/plus.png" alt="Plus">
    </div>
    <div class="profile">
        <img src=<?= $users['user_1']['logo'] ?> alt="User" class="logo">
        <p class="name"><?= $users['user_1']['name'] ?></p>
        <p class="description"><?= $users['user_1']['description']?></p>
        <div class="post">
            <img src="src/post.svg" alt="posts" class="post-img">
            <p class="post-text"><?= count($users['user_1']['posts'])?></p>
        </div>
        <div class="userposts">
            <?php foreach ($users['user_1']['posts'] as $post): ?>
                <img src=<?= $post['pic'] ?> alt="post" class="pic">
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
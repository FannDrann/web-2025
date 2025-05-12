<?php
    $postsJson = file_get_contents('../posts.json');
    $posts = json_decode($postsJson, true);
    require_once '../validation.php';
    
    function formatTime($timestamp) {
        $currentTime = time();
        $diff = $currentTime - $timestamp;
        if ($diff < 60) {
            return $diff . ' сек. назад';
        } elseif ($diff < 3600) {
            return floor($diff / 60) . ' мин. назад';
        } elseif ($diff < 86400) {
            return floor($diff / 3600) . ' ч. назад';
        } else {
            return floor($diff / 86400) . ' дн. назад';
        }
    }

    if (validatePostsJson($posts)):  ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <link rel="stylesheet" href="home.css">
            <title>Home</title>
        </head>
        <body>
            <div class="navigation">
                <a href="http://localhost:3000/lw7/home/">
                    <img src="src/Menu_Item_1.svg" alt="Home">
                </a>
                <a href="http://localhost:3000/lw7/profile/index.php?id=1">
                    <img src="src/Menu_Item_2.svg" alt="Profile">
                </a>        
                <img src="src/Menu_Item_3.svg" alt="Plus">
            </div>
            <div class="posts">
                <?php foreach ($posts as $post): ?>
                    <?php include 'post_template.php'; ?>
                <?php endforeach; ?>
            </div>
        </body>
        </html>
    <?php endif;
?>
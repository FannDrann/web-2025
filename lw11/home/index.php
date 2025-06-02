<?php
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="home.css">
    <script src="slider.js" defer></script>
    <title>Home</title>
</head>
<body>
    <div class="navigation">
        <a href="http://localhost:3000/lw11/home/">
            <img src="src/Menu_Item_1.svg" alt="Home">
        </a>
        <a href="http://localhost:3000/lw11/profile/index.php?id=1">
            <img src="src/Menu_Item_2.svg" alt="Profile">
        </a>        
        <img src="src/Menu_Item_3.svg" alt="Plus">
    </div>
    <div class="posts">
        <?php
        require_once '../data/sql/scripts.php';
        $connection = connectDatabase();
        $posts = findAllPosts($connection); 
        foreach ($posts as $post) {
            include 'post_template.php';
        }
        ?>
    </div>
</body>
</html>
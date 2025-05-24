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
    <title>Home</title>
</head>
<body>
    <div class="navigation">
        <a href="http://localhost:3000/lw9/home/">
            <img src="src/Menu_Item_1.svg" alt="Home">
        </a>
        <a href="http://localhost:3000/lw9/profile/index.php?id=1">
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
    <div class="modal modal_disabled" id="modal">
        <div class="modal-wrapper">
            <button class="modal__close">X</button>
            <div class="modal__carousel">
                <div class="modal__images"></div>
                <button type="button" class="modal__arrow modal__arrow-left">
                    <img src="src/left.png" alt="Previous" class="modal__arrow-icon">
                </button>
                <button type="button" class="modal__arrow modal__arrow-right">
                    <img src="src/right.png" alt="Next" class="modal__arrow-icon">
                </button>
            </div>
            <div class="modal__counter"></div>
        </div>
    </div>
</body>
</html>
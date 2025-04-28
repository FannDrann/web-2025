<?php
    $postsJson = file_get_contents('../posts.json');
    $posts = json_decode($postsJson, true);
?>
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
        <div class="post">
            <div class="userdata">
                <a href="http://localhost:3000/lw7/profile/?id=<?= $post['author']['user_id']?>">
                    <img src="<?= $post['author']['logo']?>" alt="<?= $post['author']['name']?>" class="logo">
                </a> 
                <p class="text-name"><?= $post['author']['name']?></p>   
                <img src="src/edit.svg" alt="Edit" class="edit">
            </div>
            <?php if (!empty($post['images'])): ?>
                <img src="<?= $post['images'][0]['path']?>" alt="post image" class="post_photo">
                <?php if (count($post['images']) > 1): ?>
                    <p class="count">1/<?= count($post['images'])?></p>
                    <img src="src/left.svg" alt="" class="left">
                    <img src="src/right.svg" alt="" class="right">
                <?php endif; ?>
            <?php endif; ?>
            <div class="likes">
                <img src="src/like.png" alt="Like" class="heart">
                <p class="like_text"><?= $post['likes']?></p>
            </div>
            <?php if (!empty($post['text'])): ?>
                <p class="content">
                    <?= $post['text']?>  
                </p>
                <span class="more">...еще</span>
            <?php endif; ?>
            <p class="time"><?= formatTime($post['timestamp'])?></p>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>

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
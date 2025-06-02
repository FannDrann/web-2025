<?php
require_once '../data/sql/scripts.php';

$user = findUserInDatabase($connection, $post['user_id']);
$post_images = findPostImagesInDatabase($connection, $post['id']);
?>

<div class="post">
    <div class="userdata">
        <a href="http://localhost:3000/lw11/profile/?id=<?= $user['id'] ?>">
            <img src="<?= $user['logo_path'] ?>" alt="<?= $user['username'] ?>" class="logo">
        </a> 
        <p class="text-name"><?= $user['username'] ?></p>   
        <img src="src/edit.svg" alt="Edit" class="edit">
    </div>

    <?php if (!empty($post_images)): ?>
        <div class="post_carousel">
            <?php foreach ($post_images as $index => $image): ?>
                <img src="<?= $image['image_path'] ?>" alt="Post image" class="post_photo <?= $index === 0 ? 'active' : 'hidden' ?>">
            <?php endforeach; ?>

            <?php if (count($post_images) > 1): ?>
                <span class="count">1/<?= count($post_images) ?></span>
                <button type="button" class="post_arrow post_arrow-left">
                    <img src="src/right.svg" alt="Previous" class="post_arrow-icon">
                </button>
                <button type="button" class="post_arrow post_arrow-right">
                    <img src="src/right.svg" alt="Next" class="post_arrow-icon">
                </button>
            <?php endif; ?>
        </div>
    <?php endif; ?>


    <div class="likes">
        <img src="src/like.png" alt="Like" class="heart">
        <p class="like_text"><?= (int)$post['likes'] ?></p>
    </div>

    <?php if (!empty($post['content'])): ?>
        <p class="content">
            <?= $post['content'] ?>  
        </p>
        <span class="more">...еще</span>
    <?php endif; ?>

    <p class="time"><?= formatTime(strtotime($post['created_at'])) ?></p>
</div>
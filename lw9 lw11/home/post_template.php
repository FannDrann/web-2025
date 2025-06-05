<?php
require_once '../data/sql/scripts.php';

$user = findUserInDatabase($connection, $post['user_id']);
$post_images = findPostImagesInDatabase($connection, $post['id']);
?>

<div class="post">
    <div class="post__user">
        <a href="http://localhost:3000/lw11/profile/?id=<?= $user['id'] ?>">
            <img src="<?= $user['logo_path'] ?>" alt="<?= $user['username'] ?>" class="post__user-logo">
        </a> 
        <p class="post__user-name"><?= $user['username'] ?></p>   
        <img src="src/edit.svg" alt="Edit" class="post__edit-btn">
    </div>

    <?php if (!empty($post_images)): ?>
        <div class="post__carousel">
            <?php foreach ($post_images as $index => $image): ?>
                <img src="<?= $image['image_path'] ?>" alt="Post image" class="post__carousel-photo">
            <?php endforeach; ?>

            <?php if (count($post_images) > 1): ?>
                <span class="post__carousel-count"><?= count($post_images) ?></span>
                <button type="button" class="post__carousel-arrow-left">
                    <img src="src/right.svg" alt="Previous">
                </button>
                <button type="button" class="post__carousel-arrow-right">
                    <img src="src/right.svg" alt="Next">
                </button>
            <?php endif; ?>
        </div>
    <?php endif; ?>


    <div class="post__likes">
        <img src="src/like.png" alt="Like" class="post__likes-icon">
        <p class="post__likes-count"><?= (int)$post['likes'] ?></p>
    </div>

    <?php if (!empty($post['content'])): ?>
        <div class="post__content">
            <p class="post__text" data-fulltext="<?= htmlspecialchars($post['content']) ?>">
                <?= htmlspecialchars($post['content']) ?>  
            </p>
            <span class="post__more-btn">...ещё</span>
        </div>
    <?php endif; ?>

    <p class="post__time"><?= formatTime(strtotime($post['created_at'])) ?></p>
</div>

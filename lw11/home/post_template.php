<?php
require_once '../data/sql/scripts.php';

$user = findUserInDatabase($connection, $post['user_id']);
$post_images = findPostImagesInDatabase($connection, $post['id']);
?>

<div class="post">
    <div class="userdata">
        <a href="http://localhost:3000/lw11/profile/?id=<?= $user['id'] ?>" class="post__user">
            <img src="<?= $user['logo_path'] ?>" alt="<?= htmlspecialchars($user['username']) ?>" class="logo">
            <span class="text-name"><?= htmlspecialchars($user['username']) ?></span>
        </a>
        <a href="#" class="post__edit">
            <img src="src/edit.svg" alt="Edit post" class="edit">
        </a>
    </div>

    <?php if (!empty($post_images)): ?>
        <div class="post__carousel">
            <?php foreach ($post_images as $index => $image): ?>
                <img 
                    src="<?= $image['image_path'] ?>" 
                    alt="Post image" 
                    class="post_photo <?= $index === 0 ? 'active' : 'hidden' ?>"
                >
            <?php endforeach; ?>

            <?php if (count($post_images) > 1): ?>
                <span class="post__counter">1/<?= count($post_images) ?></span>
                <button type="button" class="post__arrow post__arrow-left">
                    <img src="src/left.svg" alt="Previous" class="post__arrow-icon">
                </button>
                <button type="button" class="post__arrow post__arrow-right">
                    <img src="src/right.svg" alt="Next" class="post__arrow-icon">
                </button>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="likes">
        <div class="post__like">
            <img src="src/like.png" alt="Like" class="heart">
            <span class="like_text"><?= (int)$post['likes'] ?></span>
        </div>
    </div>

    <?php if (!empty($post['content'])): ?>
        <div class="content">
            <p class="post__text"><?= htmlspecialchars($post['content']) ?></p>
            <span class="more">...еще</span>
        </div>
    <?php endif; ?>

    <p class="time"><?= formatTime(strtotime($post['created_at'])) ?></p>
</div>
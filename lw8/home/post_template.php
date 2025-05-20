<?php
require_once '../data/sql/scripts.php';

$user = findUserInDatabase($connection, $post['user_id']);
?>

<div class="post">
    <div class="userdata">
        <a href="http://localhost:3000/lw8/profile/?id=<?= $user['id'] ?>">
            <img src="<?= htmlspecialchars($user['logo_path']) ?>" alt="<?= htmlspecialchars($user['username']) ?>" class="logo">
        </a> 
        <p class="text-name"><?= htmlspecialchars($user['username']) ?></p>   
        <img src="src/edit.svg" alt="Edit" class="edit">
    </div>

    <?php if (!empty($post['image_path'])): ?>
        <img src="<?= htmlspecialchars($post['image_path']) ?>" alt="post image" class="post_photo">
    <?php endif; ?>

    <div class="likes">
        <img src="src/like.png" alt="Like" class="heart">
        <p class="like_text"><?= (int)$post['likes'] ?></p>
    </div>

    <?php if (!empty($post['content'])): ?>
        <p class="content">
            <?= htmlspecialchars($post['content']) ?>  
        </p>
        <span class="more">...еще</span>
    <?php endif; ?>

    <p class="time"><?= formatTime(strtotime($post['created_at'])) ?></p>
</div>
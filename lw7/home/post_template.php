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
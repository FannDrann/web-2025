<?php
function connectDatabase(): PDO
{
    $dsn = 'mysql:host=localhost;dbname=blog';
    $user = 'root';
    $password = 'aboba';

    return new PDO($dsn, $user, $password);
}

function savePostToDatabase(PDO $connection, array $postParams): int
{
    $query = <<<SQL
        INSERT INTO post (user_id, content, likes)
        VALUES (?, ?, ?)
        SQL;
    $statement = $connection->prepare($query);
    $statement->execute([
        $postParams['user_id'],
        $postParams['content'],
        $postParams['likes']
    ]);

    return (int)$connection->lastInsertId();
}

function savePostImageToDatabase(PDO $connection, array $postParams): int
{
    $query = <<<SQL
        INSERT INTO post_image (post_id, image_path)
        VALUES (?, ?)
        SQL;
    $statement = $connection->prepare($query);
    $statement->execute([
        $postParams['post_id'],
        $postParams['image_path']
    ]);

    return (int) $connection->lastInsertId();
}

function findPostInDatabase(PDO $connection, int $id): array
{
    $query = <<<SQL
        SELECT *
        FROM post 
        WHERE id = $id
        SQL;

    $statement = $connection->query($query);
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        throw new RuntimeException("Post with id $id not found");
    }

    return $row;
}

function findUserInDatabase(PDO $connection, int $id): array
{
    $query = <<<SQL
        SELECT *
        FROM user 
        WHERE id = $id
        SQL;

    $statement = $connection->query($query);
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        throw new RuntimeException("User with id $id not found");
    }

    return $row;
}

function findPostImagesInDatabase(PDO $connection, int $id): array
{
    $query = <<<SQL
        SELECT *
        FROM post_image 
        WHERE post_id = $id
        SQL;

    $statement = $connection->query($query);
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (!$rows) {
        throw new RuntimeException("Post with id $id have not images");
    }

    return $rows;
}

function findAllPosts(PDO $connection): array
{
    $query = <<<SQL
        SELECT * 
        FROM post 
        ORDER BY id ASC
        SQL;

    $statement = $connection->query($query);
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $rows;
}

function findAllUsersPosts(PDO $connection, int $id): array
{
    $query = <<<SQL
        SELECT * 
        FROM post 
        WHERE user_id = $id
        ORDER BY likes DESC
        SQL;

    $statement = $connection->query($query);
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $rows;
}
?>
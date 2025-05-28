<?php
require_once 'data/sql/scripts.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Method not allowed. Use POST.']);
    exit;
}

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data) {
    echo json_encode(['error' => 'Invalid JSON']);
    exit;
}
if (!isset($data['content'])){
    echo json_encode(['error' => 'Invalid content']);
    exit;
}
if (!isset($data['images'])) {
    echo json_encode(['error' => 'Invalid images']);
    exit;
}

$content = $data['content'];
$images = $data['images'];
$likes = $data['likes'];

foreach ($images as $img) {
    if (!is_string($img)) {
        echo json_encode(['error' => 'Image data must be strings URL']);
        exit;
    }
}

$imageDir = __DIR__ . '/data/images/content/';
if (!is_dir($imageDir)) {
    mkdir($imageDir, 0775, true);
}

$imagePaths = [];
foreach ($images as $img) {
    if (substr($img, -4) === '.gif') {
        $fileName = uniqid('img_', true) . '.gif';
        $savePath = $imageDir . $fileName;
        if (!$img) {
            echo json_encode(['error' => 'Empty URL']);
            exit;
        }
    }
    else {
        $fileName = uniqid('img_', true) . '.png';
        $savePath = $imageDir . $fileName;
        if (!$img) {
            echo json_encode(['error' => 'Empty URL']);
            exit;
        }
    }
    $headers = @get_headers($img);
    if (!$headers || substr($headers[0], 9, 3) !== '200') {
        echo json_encode(['error' => 'Incorrect URL']);
        exit;
    }
    $decoded = file_get_contents($img);
    if (!file_put_contents($savePath, $decoded)) {
        echo json_encode(['error' => 'Failed to save image']);
        exit;
    }
    $imagePaths[] = '../data/images/content/' . $fileName;
}

$connection = connectDatabase();
$userId = 1;
$postData = [
    'user_id' => $userId,
    'content' => $content,
    'likes' => $likes,
    'image_path' => !empty($imagePaths) ? implode(',', $imagePaths) : ''
];

$postId = savePostToDatabase($connection, $postData);

$response = [
    'success' => true,
    'message' => 'Post created successfully',
    'post' => [
        'id' => $postId,
        'user_id' => $userId,
        'content' => $content,
        'images' => $imagePaths
    ]
];
echo json_encode($response);
exit;
?>
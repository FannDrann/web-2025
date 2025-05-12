<?php
function validateFilePath($path) {
  return preg_match('/\.(jpg|png|svg)$/i', $path) && file_exists($path);
}


function validatePostsJson($jsonData) {
  foreach ($jsonData as $item) {
      if (!isset($item['id'], $item['likes'], $item['timestamp'], $item['author'], $item['images']) ||
          !filter_var($item['id'], FILTER_VALIDATE_INT) ||
          !filter_var($item['likes'], FILTER_VALIDATE_INT) ||
          !($item['timestamp'] > 0)) {
          return false;
      }

      $author = $item['author'];
      if (!isset($author['user_id'], $author['name'], $author['logo']) ||
          !filter_var($author['user_id'], FILTER_VALIDATE_INT) ||
          !validateFilePath($author['logo'])) {
          return false;
      }

      foreach ($item['images'] as $image) {
          if (!isset($image['path']) || !validateFilePath($image['path'])) {
              return false;
          }
      }
  }
  
  return true;
}

function validateUserJson($jsonData, $id = null) {
  if ($id !== null && !isset($jsonData[$id])) {
    return false;
  }
  
  foreach ($jsonData as $user) {
    if (!isset($user['id'], $user['name'], $user['logo'], $user['description'], $user['posts']) || 
    !filter_var($user['id'], FILTER_VALIDATE_INT) || 
    !validateFilePath($user['logo'])) {
          return false;
      }

    foreach ($user['posts'] as $post) {
      if (!isset($post['path']) || !validateFilePath($post['path'])) {
        return false;
      }
    }
  }
  return true;
}
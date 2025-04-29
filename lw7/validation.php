<?php
function validateFilePath($path) {
  if (!(ubstr($path, -5) === "/png" || (ubstr($path, -5) === "/jpg")) || !file_exists($path)) {
    return false;
  }
  return $path;
}


function validatePostsJson($jsonData) {
  foreach ($jsonData as $index => $item) {
    if (!isset($item['id'], $item['likes'], $item['timestamp'], $item['author'], $item['images'], $item['text'])) {
      return "Ошибка в элементе $index: отсутствуют обязательные поля";
    }
  }
}
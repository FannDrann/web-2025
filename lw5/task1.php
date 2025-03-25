<?php

function isLeapYear(int $year)
{
    if (($year % 4 === 0 && $year % 100 !== 0) || ($year % 400 === 0)) return "YES";
    return "NO";
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Задания</title>
</head>

<body>
    <div>
        <p>Задание #1. Високосный год</p>
        <form method="post">
            <input type="text" name="input1" placeholder="год">
            <button type="submit" name="submit1">Ввести</button>
        </form>
        <?php
        if (isset($_POST['submit1'])) {
            $result = isLeapYear((int) $_POST['input1']);
            echo "<p>$result</p>";
        }
        ?>
    </div>
</body>
<?php

function Traslator(int $num)
{
    switch ($num)
    {
        case 0:
            return "Ноль";
        case 1:
            return "Один";
        case 2:
            return "Два";
        case 3:
            return "Три";
        case 4:
            return "Четыре";
        case 5:
            return "Пять";
        case 6:
            return "Шесть";
        case 7:
            return "Семь";
        case 8:
            return "Восемь";
        case 9:
            return "Девять";
        default:
            return "Не корректный ввод";
    }
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
        <p>Задание #2. Переводчик</p>
        <form method="post">
            <input type="text" name="input2" placeholder="цифра">
            <button type="submit" name="submit2">Ввести</button>
        </form>
        <?php
        if (isset($_POST['submit2'])) {
            $result = Traslator((int) $_POST['input2']);
            echo "<p>$result</p>";
        }
        ?>
    </div>
</body>
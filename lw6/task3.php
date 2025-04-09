<?php

function Zodiac(int $day, int $month)
{
    if (($month == 3 && $day >= 21) || ($month == 4 && $day <= 19))
    return "Овен";
    if (($month == 4 && $day >= 20) || ($month == 5 && $day <= 20))
        return "Телец";
    if (($month == 5 && $day >= 21) || ($month == 6 && $day <= 20))
        return "Близнецы";
    if (($month == 6 && $day >= 21) || ($month == 7 && $day <= 22))
        return "Рак";
    if (($month == 7 && $day >= 23) || ($month == 8 && $day <= 22))
        return "Лев";
    if (($month == 8 && $day >= 23) || ($month == 9 && $day <= 22))
        return "Дева";
    if (($month == 9 && $day >= 23) || ($month == 10 && $day <= 22))
        return "Весы";
    if (($month == 10 && $day >= 23) || ($month == 11 && $day <= 21))
        return "Скорпион";
    if (($month == 11 && $day >= 22) || ($month == 12 && $day <= 21))
        return "Стрелец";
    if (($month == 12 && $day >= 22) || ($month == 1 && $day <= 19))
        return "Козерог";
    if (($month == 1 && $day >= 20) || ($month == 2 && $day <= 18))
        return "Водолей";
    if (($month == 2 && $day >= 19) || ($month == 3 && $day <= 20))
        return "Рыбы";
    return "Некорректная дата";
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
        <p>Задание #3. Знак зодиака</p>
        <form method="post">
            <input type="text" name="input" placeholder="дата">
            <button type="submit" name="submit">Ввести</button>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $date = explode(".", $_POST['input']);
            $result = Zodiac($date[0], $date[1]);
            echo "<p>$result</p>";
        }
        ?>
    </div>
</body>
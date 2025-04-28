<?php

function Factorial(int $num)
{
    if ($num <= 1) return 1;
    return $num * Factorial($num - 1);
}

function operation(int $num1, int $num2, string $sign)
{
    if ($sign === '*') return $num1 * $num2;
    if ($sign === '+') return $num1 + $num2;
    if ($sign === '-') return $num1 - $num2;
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
        <p>Задание #6. Вычислить факториал числа</p>
        <form method="post">
            <input type="text" name="input" placeholder="цифра">
            <button type="submit" name="submit">Ввести</button>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $result = Factorial($_POST['input']);
            echo "<p>$result</p>";
        }
        ?>
    </div>
</body>
<?php

function operation(int $num1, int $num2, string $sign)
{
    if ($sign === '*') return $num1 * $num2;
    if ($sign === '+') return $num1 + $num2;
    if ($sign === '-') return $num1 - $num2;
}


function PostfixNotation(string $input)
{   
    $nums = [];
    $a = explode(" ", $input);
    for ($i = 0; $i < count($a); $i++) 
    {
        if (('0' <= (string)$a[$i]) && ((string)$a[$i] <= '9'))
        {
            array_push($nums, (int)$a[$i]);
        }
        else
        {
            $num1 = $nums[count($nums)-2];
            $num2 = $nums[count($nums)-1];
            array_splice($nums, count($nums)-2, 2);
            $result = operation($num1, $num2, $a[$i]);
            array_push($nums, $result);
        }
    }
    return $nums[0];
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
        <p>Задание #7. Обратная польская запись </p>
        <form method="post">
            <input type="text" name="input" placeholder="цифра">
            <button type="submit" name="submit">Ввести</button>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $result = PostfixNotation($_POST['input']);
            echo "<p>$result</p>";
        }
        ?>
    </div>
</body>
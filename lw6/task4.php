<?php

function LuckyTicket(int $num)
{
    $num1 = (int)($num / 100000) + (int)($num / 10000) % 10 + (int)($num / 1000) % 10;
    $num2 = $num % 10 + (int)($num / 10) % 10 + (int)($num / 100) % 10;
    if ($num1 === $num2) return TRUE;
    return FALSE;
}


function RangeLuckyTickets(int $num1, int $num2)
{
    $luckydigits = []; 
    for ($i = $num1; $i <= $num2; $i++) 
    {
        if (LuckyTicket($i) === TRUE) array_push($luckydigits, $i);
    }
    return $luckydigits;
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
        <p>Задание #5. Счастливые билеты</p>
        <form method="post">
            <input type="text" name="input1" placeholder="цифра">
            <input type="text" name="input2" placeholder="цифра">
            <button type="submit" name="submit">Ввести</button>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $result = RangeLuckyTickets($_POST['input1'], $_POST['input2']);
            foreach ($result as $i)
            {
                echo "<p>$i \n</p>";
            }
        }
        ?>
    </div>
</body>
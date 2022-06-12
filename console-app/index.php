<!--
Написать на PHP код, который будет выполнять поставленные задачи по входящим параметрам N и K:
1) Сгенерировать список чисел от 1 до N;
2) Найти все простые числа в списке из 1-ого пункта (вывести на экран);
3) Найти все палиндромы в списке из 1-ого пункта (вывести на экран);
4) Сгенерировать случайный пароль из чисел из 2-ого пункта диной от 3 до К символов (вывести на экран).
-->

<?php

    require_once "app/Generator.php";

    use app\Generator;

    $numbers = [];
    if ($argc > 2) {
        $numbers['n'] = (int)$argv[1];
        $numbers['k'] = (int)$argv[2];
        if (isNumbersValid($numbers['n'], $numbers['k'])) {
            (new Generator())->generate($numbers);
        } else {
            $numbers = newInput();
            (new Generator())->generate($numbers);
        }
    } else {
        $numbers = newInput();
        (new Generator())->generate($numbers);
    }

    function isNumbersValid($numN, $numK)
    {
        if ($numN <= 1 || $numK < 3) {
            echo "\nWRONG INPUT.\nMaximal length of an array(N), should be greater than 1.\nMinimal length of password (K) should be minimal 3 symbols.\n";
            return false;
        }
        return true;
    }

    function newInput()
    {
        $n = 0;
        $k = 0;
        $numbers = [];
        $active = true;
        while($active) {
            echo "Please enter maximal number of range from 1 to N: ";
            $n = (int)readline();

            echo "Please enter possible maximal length of password from 3 to K: ";
            $k = (int)readline();

            if(isNumbersValid($n, $k))
                $active = false;
        }
        $numbers['n'] = $n;
        $numbers['k'] = $k;
        return $numbers;
    }

?>


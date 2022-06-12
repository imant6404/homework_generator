<?php

    namespace app\service;

    class PrimeNumberSearcher
    {
        public static function search($list)
        {
            $primeNumbers = [];
            $index = 0;
            for ($i = $list[0]; $i < sizeof($list); $i++) {
                $isPrime = true;
                for ($j = $list[0]; $j < $i; $j++) {
                    if ($list[$i] % $list[$j] == 0) {
                        $isPrime = false;
                        break;
                    }
                }
                if ($isPrime)
                    $primeNumbers[$index++] = $list[$i];
            }
            return $primeNumbers;
        }
    }
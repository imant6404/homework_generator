<?php

    namespace app\service;

    class PalindromeNumberSearcher
    {
        public static function getPalindromeNumbers($list)
        {
            $palindromeList = [];
            $index = 0;
            foreach ($list as $item) {
                if (self::isPal(strval($item))) {
                    $palindromeList[$index++] = $item;
                }
            }
            return $palindromeList;
        }

        private static function isPal($str)
        {
            $str_length = strlen($str);
            if ($str_length > 1) {
                for ($i = 0; $i < $str_length / 2; $i++) {
                    if ($str[$i] != $str[$str_length - 1 - $i]) {
                        return false;
                    }
                }
            }
            return true;
        }
    }
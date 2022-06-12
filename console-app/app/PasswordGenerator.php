<?php

    namespace app\service;

    class PasswordGenerator
    {
        public static function generatePassword($arr, $maxPasswordLength)
        {
            $passwordLength = rand(3, $maxPasswordLength);
            $password = "";
            for ($i = 0; $i <= $passwordLength; $i++) {
                $index = rand(0, sizeof($arr) - 1);
                $password = $password . $arr[$index];
            }
            return $password;
        }
    }
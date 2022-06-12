<?php

    namespace app\service;

    class NumberRangeGenerator
    {
        public static function generate($minNumber, $maxNumber)
        {
            return range($minNumber, $maxNumber);
        }
    }
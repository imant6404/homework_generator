<?php
    namespace app;

    require_once "app/NumberRangeGenerator.php";
    require_once "app/PrimeNumberSearcher.php";
    require_once "app/PalindromeNumberSearcher.php";
    require_once "app/PasswordGenerator.php";

    use app\service\NumberRangeGenerator;
    use app\service\PrimeNumberSearcher;
    use app\service\PalindromeNumberSearcher;
    use app\service\PasswordGenerator;

    class Generator
    {
        public function generate($numbers)
        {
            $rangeNumbers = NumberRangeGenerator::generate(1, $numbers['n']);
            self::printList("Numbers range from $rangeNumbers[0] to " . $rangeNumbers[sizeof($rangeNumbers) - 1] . ": ", $rangeNumbers);

            $primeNumbers = PrimeNumberSearcher::search($rangeNumbers);
            count($primeNumbers) > 0
                ? self::printList("Prime numbers: ", $primeNumbers)
                : print "Prime numbers: Range from 1 to " . $numbers['n'] . " doesn't have prime numbers.\n";

            $palindromeList = PalindromeNumberSearcher::getPalindromeNumbers($rangeNumbers);
            self::printList("Palindrome numbers: ", $palindromeList);

            $password = "";
            if (count($primeNumbers) > 0)
                $password = PasswordGenerator::generatePassword($primeNumbers, $numbers['k']);
            echo $password != ""
                ? "Generated password is: " . $password
                : "Can't generate password, prime number list is empty." . "\n";
        }

        private static function printList($message, $list)
        {
            echo $message;
            foreach ($list as $item) {
                echo $item . ", ";
            }
            echo "\n";
        }
    }

?>


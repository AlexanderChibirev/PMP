<?php
header('Content-type: application/json');

class PasswordStrengthCalculator
{
    private $password;
    private $passwordLength = 0;
    private $capitalsCount = 0;
    private $smallLettersCount = 0;
    private $digitsCount = 0;

    function __construct($password) {
        $this->password = $password;
        $this->passwordLength = strlen($password);
        $this->capitalsCount = $this->getCapitalsCount($password);
        $this->smallLettersCount = $this->getSmallLetersCount($password);
        $this->digitsCount = $this->getDigitsCount($password);
    }

    private function getDigitsCount($string)
    {
        return preg_match_all( "/[0-9]/", $string );
    }

    private function getCapitalsCount($string)
    {
        return preg_match_all( "/[A-Z]/", $string );
    }

    private function getSmallLetersCount($string)
    {
        return preg_match_all( "/[a-z]/", $string );
    }

    private function isOnlyLetters($string)
    {
        return !preg_match('/[A-Za-z]/', $string);
    }

    private function getDuplicatesCount()
    {
        $repeatingCharsCount = 0;
        $charsCount = array_count_values(str_split($this->password));
        foreach($charsCount as $count) {
            if ($count > 1) {
                $repeatingCharsCount += $count;
            }
        }
    
        return $repeatingCharsCount;
    }

    private function getLengthStrength()
    {
        return 4 * $this->passwordLength;
    }

    private function getDigitStrength()
    {
        return 4 * $this->digitsCount;
    }

    private function getCapitalsStrength()
    {
        if ($this->capitalsCount > 0) {
            return 2 * ($this->passwordLength - $this->capitalsCount);
        }
        return 0;
    }

    private function getSmallLettersStrength()
    {
        if ($this->smallLettersCount > 0) {
            return 2 * ($this->passwordLength - $this->smallLettersCount);
        }
        return 0;
    }

    private function getDecreaseBonusForOnlyLetters()
    {
        if ($this->isOnlyLetters($this->password)) {
            return $this->capitalsCount + $this->smallLettersCount;
        }
    }

    private function getDecreaseBonusForOnlyDigits()
    {
        if ($this->digitsCount === $this->passwordLength) {
            return $this->digitsCount;
        }
    }

    public function calculatePasswordStrength()
    {
        return 
            $this->getLengthStrength() +
            $this->getDigitStrength() +
            $this->getCapitalsStrength() +
            $this->getSmallLettersStrength() -
            $this->getDecreaseBonusForOnlyLetters() -
            $this->getDecreaseBonusForOnlyDigits() -
            $this->getDuplicatesCount();
    }
}

if (!isset($_GET['password'])) {
    die();
}

$passwordStrengthCalculator = new PasswordStrengthCalculator($_GET['password']);
echo json_encode(array('strength' => $passwordStrengthCalculator->calculatePasswordStrength()));
<?php
function luhn($cardNumber) {



        // Inverser les chiffres
        $cardNumber = strrev($cardNumber);
        $total = 0;
        for ($i = 0; $i < strlen($cardNumber); $i++) {
            $currentNumber = substr($cardNumber, $i, 1);
            // Multiplier les chiffres impairs par 2
            if ($i % 2 == 1) {
                $currentNumber *= 2;
            }
            // Ajouter les chiffres des deux chiffres de chaque nombre
            if ($currentNumber > 9) {
                $firstNumber = $currentNumber % 10;
                $secondNumber = ($currentNumber - $firstNumber) / 10;
                $currentNumber = $firstNumber + $secondNumber;
            }
            $total += $currentNumber;
        }
        // Si la somme est divisible par 10, c'est un numéro valide
        if ($total % 10 == 0) {
            return true;
        } else {
            return false;
        }
    }
?>

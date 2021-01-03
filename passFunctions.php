<?php

function createPasswordWithoutLength($passwordLength, $lowercase, $uppercase,
        $digits, $specialSymbols, $lowercaseData, $uppercaseData,
        $digitsData, $specialSymbolsData) {

    $resultPasswordOne = [];

    if ($passwordLength == null || ( $lowercase == null && $uppercase == null && $digits == null && $specialSymbols == null)) {
        //echo 'Error in input data!';
        return;
    }

    if ($lowercaseData != null && $lowercase === 'checked') {
        for ($i = 0; $i < 2; $i++) {
            $resultPasswordOne = array_merge($resultPasswordOne, $lowercaseData);
        }
    }

    if ($uppercaseData != null && $uppercase === 'checked') {
        for ($i = 0; $i < 2; $i++) {
            $resultPasswordOne = array_merge($resultPasswordOne, $uppercaseData);
        }
    }

    if ($digitsData != null && $digits === 'checked') {
        for ($i = 0; $i < 2; $i++) {
            $resultPasswordOne = array_merge($resultPasswordOne, $digitsData);
        }
    }

    if ($specialSymbolsData != null && $specialSymbols === 'checked') {
        for ($i = 0; $i < 9; $i++) {
            $resultPasswordOne = array_merge($resultPasswordOne, $specialSymbolsData);
        }
    }

    for ($i = 0; $i < 5; $i++) {
        shuffle($resultPasswordOne);
    }

    return $resultPasswordOne;
}

function getRandomPassword($newPassOne, $passwordLength, $lowercase,
        $uppercase, $digits, $specialSymbols, $lowercaseData, $uppercaseData,
        $digitsData, $specialSymbolsData) {

    if ($newPassOne != null) {

        $finalPassword = array();
        $passwordLength = max(10, intval($passwordLength));

        if ($lowercaseData != null && $lowercase == 'checked') {
            
            $lower = $lowercaseData;
            $finalPassword = array_merge($finalPassword, str_split($lower[array_rand($lower)]));
        }

        if ($uppercaseData != null && $uppercase == 'checked') {
            $upper = $uppercaseData;
            $finalPassword = array_merge($finalPassword, str_split($upper[array_rand($upper)]));
        }

        if ($digitsData != null && $digits == 'checked') {
            $digit = $digitsData;
            $finalPassword = array_merge($finalPassword,  str_split($digit[array_rand($digit)]));
        }

        if ($specialSymbolsData != null && $specialSymbols == 'checked') {
            $special = $specialSymbolsData;
            $finalPassword = array_merge($finalPassword, str_split($special[array_rand($special)]));
        }

        $additionalRotation = $passwordLength - sizeof($finalPassword);
        for ($i = 0; $i < $additionalRotation; $i++) {
            $finalPassword = array_merge($finalPassword, str_split($newPassOne[array_rand($newPassOne)]));
        }

        return implode($finalPassword);
    } else {
        return null;
    }
}

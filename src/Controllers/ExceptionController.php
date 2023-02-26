<?php

declare(strict_types=1);

namespace App\Controllers;

class ExceptionController {
    public function displayIncorrectMonthError(string $message): void{
        require __DIR__.'//..//..//views//electricity//incorrectMonthError.php';
    }
}
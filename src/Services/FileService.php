<?php

declare(strict_types=1);

namespace App\Services;

class FileService 
{
    private string $fileName = __DIR__.'/../../electricity.json';

    public function read():string{
        $content = file_get_contents($this->fileName);
        return $content?$content:'';
    }

    public function write(string $content):bool{
        return (bool)file_put_contents($this->fileName, $content);
    }
}
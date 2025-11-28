<?php

declare(strict_types=1);

namespace App;

error_reporting(E_ALL);
ini_set('display_errors', true);

use Dotenv\Dotenv;

class Env
{
    public static function load(string $basePath): void
    {
        $dotenv = Dotenv::createImmutable($basePath);
        $dotenv->load();
    }
}

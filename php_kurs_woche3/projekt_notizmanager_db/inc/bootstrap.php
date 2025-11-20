<?php 
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload';

use App\Env;

// Projektroot laden (eine Ebene höher)
Env::load(diename(__DIR__));
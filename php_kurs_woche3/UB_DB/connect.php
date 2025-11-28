<?php
declare(strict_types=1);

// echo '<pre>', var_dump( PDO::getAvailableDrivers() ), '</pre>'; 

try {
    $pdo = new PDO('mysql:host=localhost;dbname=hardware;charset=utf8mb4',
     'php_user', '987603', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
     ]);
     
} catch (PDOException $e) {
    echo 'DB-Fehler: ' . htmlspecialchars($e->getMessage()); 
}

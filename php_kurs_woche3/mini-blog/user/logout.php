<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

session_start();

$_SESSION = array();

session_destroy();

header('Location: ../index.php');
exit;

<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors',true);
session_start();
include_once 'u_artikel.inc.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Honig Bestellung</title>
</head>
<body>
<header>
    <h1>Übung: Honigbestellung</h1>
  </header>
    <form action="bestellung.php" method="post">
        <table border="1" cellpadding="5">
            <tr>
                <th>Honig</th>
                <th>Menge</th>
            </tr>
            <tr>
                <td>Akazienhonig</td>
                <td><input type="number" name="akazienhonig" min="0"></td>
            </tr>
            <tr>
                <td>Heidehonig</td>
                <td><input type="number" name="heidehonig" min="0"></td>
            </tr>
            <tr>
                <td>Kleehonig</td>
                <td><input type="number" name="kleehonig" min="0"></td>
            </tr>
            <tr>
                <td>Tannenhonig</td>
                <td><input type="number" name="tannenhonig" min="0"></td>
            </tr>
            <tr>
          <td colspan="4">
            <button style="margin-bottom:0.1rem;" type="submit">Abschiecken</button>
          </td>
        </tr>
        </table>
        <br>
        
    </form>
</body>
</html>
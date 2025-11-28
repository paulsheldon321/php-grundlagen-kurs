<?php 

function getHardware(PDO $pdo):array {
        
    $sql = 'SELECT * FROM fp';  /* Alles von der Tabelle fp anzeigen */
    return $pdo->query($sql)->fetchAll(); 
}

function filterHardware(PDO $pdo, int $gb, float $preis): array {
    $stmt = $pdo->prepare('SELECT * FROM fp WHERE gb > :g AND preis < :p');
    $stmt->execute([
        ':g' => $gb,
        ':p' => $preis
    ]);

    return $stmt->fetchAll(PDO::FETCH_OBJ); // return array of objects
}


function filterMonth(PDO $pdo, int $month): array {
    /* SELECT * FROM fp WHERE : monat <= 6 */
    /* prod = DATE -> Format ist aber 2008-06-13 */
    $stmt = $pdo->prepare('SELECT * FROM fp WHERE MONTH(prod) <=:m ORDER BY MONTH(prod) ASC');
    $stmt->execute([
        ':m' => $month
    ]);

    return $stmt->fetchAll(PDO::FETCH_OBJ); // return array of objects
}


function findHardware(PDO $pdo): array {
    if (!isset($_POST['preis'])) {
        return [];
    }

    $filter = $_POST['preis'];

    // Build base SQL string
    switch ($filter) {

        case 'a': 
            $sql = "SELECT * FROM fp WHERE preis <= 120";
            break;

        case 'b': 
            $sql = "SELECT * FROM fp WHERE preis > 120 AND preis <= 140";
            break;

        case 'c': 
            $sql = "SELECT * FROM fp WHERE preis > 140";
            break;

        default:
            return [];
    }

    // Checkbox: sort by price ascending
    if (isset($_POST['d'])) {
        $sql .= " ORDER BY preis DESC";
    }

    // Prepare + execute
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function addHardware(
    PDO $pdo,
    string $hersteller,
    string $typ,
    int $gb,
    float $preis,
    string $artnummer,
    string $prod  // in 'YYYY-MM-DD' format
): void {
    $stmt = $pdo->prepare(
        'INSERT INTO fp (hersteller, typ, gb, preis, artnummer, prod) 
         VALUES (:hersteller, :typ, :gb, :preis, :artnummer, :prod)'
    );

    $stmt->execute([
        ':hersteller' => $hersteller,
        ':typ'        => $typ,
        ':gb'         => $gb,
        ':preis'      => $preis,
        ':artnummer'  => $artnummer,
        ':prod'       => $prod
    ]);
}


function deleteHardware(PDO $pdo, string $artnr): void {
  $stmt = $pdo->prepare('DELETE FROM fp WHERE artnummer=:artnr');
  $stmt->execute([':artnr'=>$artnr]);
}

function findHardwareByArtnr(PDO $pdo, string $artnr): ?object {
    $stmt = $pdo->prepare('SELECT * FROM fp WHERE artnummer = :artnr');
    $stmt->execute([':artnr' => $artnr]);
    $row = $stmt->fetch(PDO::FETCH_OBJ);
    return $row ?: null;
}


function updateHardware(
    PDO $pdo,
    string $hersteller,
    string $typ,
    int $gb,
    float $preis,
    string $artnummer,
    string $prod,       // in 'YYYY-MM-DD' format
    string $originalArtnr  // the PK to identify which row to update
): void {
    $stmt = $pdo->prepare(
        'UPDATE fp
         SET hersteller = :hersteller,
             typ = :typ,
             gb = :gb,
             preis = :preis,
             artnummer = :artnummer,
             prod = :prod
         WHERE artnummer = :originalArtnr'
    );

    $stmt->execute([
        ':hersteller'     => $hersteller,
        ':typ'            => $typ,
        ':gb'             => $gb,
        ':preis'          => $preis,
        ':artnummer'      => $artnummer,
        ':prod'           => $prod,
        ':originalArtnr'  => $originalArtnr
    ]);
}


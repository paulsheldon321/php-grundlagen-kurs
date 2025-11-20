<?php
declare(strict_types=1);

function getAllNotes(PDO $pdo):array {
    $sql = 'SELECT n.id, n.title, n.content, n.created_at, c.name AS category
    FROM notes n
    LEFT JOIN categories c
        ON c.id = n.category_id
    ORDER BY n.id DESC';
    
    return $pdo->query($sql)->fetchAll();
}

function safe(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function addNote(PDO $pdo, string $title, string $content, ?int $categoryId = null) :void {
    $stmt = $pdo->prerare('INSERT INTO notes(title, content, category_id) VALUES (:t, :c, :cat)');
    $stmt->execute([':t' => $title, ':c' => $content, ':cat' => $categoryId]);
}
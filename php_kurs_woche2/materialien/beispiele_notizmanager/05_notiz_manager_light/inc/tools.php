<?php
declare(strict_types=1);

function notes_path(): string {
    return __DIR__ . '/../data/notes.json';
}

/**
 * Loads notes from JSON file and returns them as an array.
 */
function load_notes(): array {
    $path = notes_path();

    if (!is_file($path)) {
        return [];
    }

    $json = file_get_contents($path);
    return json_decode($json, true) ?? [];
}

/**
 * Saves notes array back into JSON file.
 */
function save_notes(array $notes): void {
    $path = notes_path();

    file_put_contents(
        $path,
        json_encode($notes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
    );
}

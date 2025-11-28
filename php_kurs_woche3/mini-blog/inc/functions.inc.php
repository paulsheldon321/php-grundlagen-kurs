<?php

function safe(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function authenticate(PDO $pdo, string $email, string $password): bool
{
    $stmt = $pdo->prepare('SELECT users_id, users_password FROM users WHERE users_email=:e');
    $stmt->execute([':e' => $email]);
    $row = $stmt->fetch();
    if (!$row) return false;
    return password_verify($password, $row->users_password);
}

function getUserId(PDO $pdo, string $email): ?int
{
    $stmt = $pdo->prepare('SELECT users_id FROM users WHERE users_email = :e');
    $stmt->execute([':e' => $email]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? (int)$row['users_id'] : null;
}

function fetchUser(PDO $pdo, int $id): ?stdClass
{
    $stmt = $pdo->prepare('SELECT * FROM users WHERE users_id = :i');
    $stmt->execute([':i' => $id]);
    $user = $stmt->fetch(PDO::FETCH_OBJ); // fetch as object
    return $user ?: null; // return null if not found
}



function fetchPost(PDO $pdo, int $id): ?stdClass
{
    $stmt = $pdo->prepare('SELECT * FROM posts WHERE posts_id = :i');
    $stmt->execute([':i' => $id]);
    $post = $stmt->fetch(PDO::FETCH_OBJ); // fetch as object
    return $post ?: null; // return null if not found
}

function fetchPostFromUser(PDO $pdo, int $id): array
{
    $stmt = $pdo->prepare('SELECT * FROM posts WHERE posts_users_id_ref = :i ORDER BY posts_created_at DESC');
    $stmt->execute([':i' => $id]);
    return $stmt->fetchAll(PDO::FETCH_OBJ); // return array of objects
}

function fetchPosts(PDO $pdo): array
{
    $sql = 'SELECT * FROM posts';
    return $pdo->query($sql)->fetchAll(PDO::FETCH_OBJ);
}

function addPost(PDO $pdo, int $userId, int $catId, string $header, string $content, string $image,): void
{
    $stmt = $pdo->prepare('INSERT INTO posts(posts_users_id_ref ,posts_categ_id_ref, posts_header, posts_content, posts_image) 
                           VALUES (:u, :cat, :h, :c, :i)');
    $stmt->execute([
        ':u' => $userId,
        ':cat' => $catId,
        ':h' => $header,
        ':c' => $content,
        ':i' => $image
    ]);
}


function addCategory(PDO $pdo, string $name, string $desc)
{
    $stmt = $pdo->prepare('INSERT INTO categories(categ_name, categ_desc) VALUES (:n, :d)');
    $stmt->execute([
        ':n'    => $name,
        ':d'    => $desc
    ]);
}

function fetchCategory(PDO $pdo, int $id): ?stdClass
{
    $stmt = $pdo->prepare('SELECT * FROM categories WHERE categ_id = :i');
    $stmt->execute([':i' => $id]);
    $post = $stmt->fetch(PDO::FETCH_OBJ); // fetch as object
    return $post ?: null; // return null if not found
}


function fetchCategories(PDO $pdo): array
{
    $sql = 'SELECT * FROM categories';
    return $pdo->query($sql)->fetchAll(PDO::FETCH_OBJ);
}


function getImage($img): string
{
    return $url = BASE_URL . 'images/' . $img;
}


function fetchCategoryName(PDO $pdo, int $catId): ?string
{
    $stmt = $pdo->prepare('SELECT categ_name FROM categories WHERE categ_id = :id');
    $stmt->execute([':id' => $catId]);
    $name = $stmt->fetchColumn();
    return $name ?: null;
}

function deleteCat(PDO $pdo, int $id): void
{
    $stmt = $pdo->prepare('DELETE FROM categories WHERE categ_id = :id');
    $stmt->execute([':id' => $id]);
}

function updateCategory(PDO $pdo, int $id, string $name, string $desc): void
{
    $stmt = $pdo->prepare('
        UPDATE categories
        SET categ_name = :n,
            categ_desc = :d
        WHERE categ_id = :id
    ');

    $stmt->execute([
        ':n' => $name,
        ':d'   => $desc,
        ':id'  => $id
    ]);
}

function deletePost(PDO $pdo, int $id): void
{
    $stmt = $pdo->prepare('DELETE FROM posts WHERE posts_id = :id');
    $stmt->execute([':id' => $id]);
}

function updatePost(PDO $pdo, int $id, int $catId, string $header, string $content, ?string $image): void
{
    $stmt = $pdo->prepare('
        UPDATE posts
        SET posts_categ_id_ref = :cat,
            posts_header = :h,
            posts_content = :c,
            posts_image = :i,
            posts_updated_at = NOW()
        WHERE posts_id = :id
    ');

    $stmt->execute([
        ':cat' => $catId,
        ':h'   => $header,
        ':c'   => $content,
        ':i'   => $image,
        ':id'  => $id
    ]);
}

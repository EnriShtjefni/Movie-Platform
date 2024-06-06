<?php

namespace App\Classes;

use PDO;

class Category
{
    private PDO $pdo;
    private int $id;
    private string $name;

    /**
     * @param PDO $pdo
     * @param string $name
     */
    public function __construct(PDO $pdo, string $name)
    {
        $this->pdo = $pdo;
        $this->name = $name;
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    public function setPdo(PDO $pdo): void
    {
        $this->pdo = $pdo;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function create() {
        $stmt = $this->pdo->prepare("INSERT INTO categories (name) VALUES (?)");
        $result = $stmt->execute([$this->name]);
        $this->id = $this->pdo->lastInsertId();
        return $result;
    }

    public function update(int $id) {
        $stmt = $this->pdo->prepare("UPDATE categories SET name = ? WHERE id = ?");
        return $stmt->execute([$this->name, $id]);
    }

    public static function delete(PDO $pdo, int $id) {
        $stmt = $pdo->prepare("DELETE FROM categories WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function getAll(PDO $pdo) {
        $stmt = $pdo->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById(PDO $pdo, int $id) {
        $stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function countAll(PDO $pdo) {
        $stmt = $pdo->query("SELECT COUNT(*) AS total FROM categories");
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public static function search(PDO $pdo, string $keyword) {
        $stmt = $pdo->prepare("SELECT * FROM categories WHERE name LIKE ?");
        $stmt->execute(["%$keyword%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function countSearch(PDO $pdo, string $keyword) {
        $stmt = $pdo->prepare("SELECT COUNT(*) AS total FROM categories WHERE name LIKE ?");
        $stmt->execute(["%$keyword%"]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}

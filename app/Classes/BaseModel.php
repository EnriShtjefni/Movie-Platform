<?php

namespace App\Classes;

use PDO;

abstract class BaseModel
{
    protected PDO $pdo;
    protected int $id;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getId(): int
    {
        return $this->id;
    }

    abstract public function create();

    abstract public function update(int $id);

    public static function delete(PDO $pdo, int $id) {
        $tableName = static::getTableName();
        $stmt = $pdo->prepare("DELETE FROM $tableName WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function getAll(PDO $pdo) {
        $tableName = static::getTableName();
        $stmt = $pdo->query("SELECT * FROM $tableName");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById(PDO $pdo, int $id) {
        $tableName = static::getTableName();
        $stmt = $pdo->prepare("SELECT * FROM $tableName WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function countAll(PDO $pdo) {
        $tableName = static::getTableName();
        $stmt = $pdo->query("SELECT COUNT(*) AS total FROM $tableName");
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public static function search(PDO $pdo, string $keyword) {
        $tableName = static::getTableName();
        $searchedField = static::getSearchedField();
        $stmt = $pdo->prepare("SELECT * FROM $tableName WHERE $searchedField LIKE ?");
        $stmt->execute(["%$keyword%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function countSearch(PDO $pdo, string $keyword) {
        $tableName = static::getTableName();
        $searchedField = static::getSearchedField();
        $stmt = $pdo->prepare("SELECT COUNT(*) AS total FROM $tableName WHERE $searchedField LIKE ?");
        $stmt->execute(["%$keyword%"]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    abstract protected static function getTableName();
    abstract protected static function getSearchedField();
}

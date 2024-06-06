<?php

namespace App\Classes;

use PDO;

class Company
{
    private PDO $pdo;
    private int $id;
    private string $name;
    private int $address_id;

    /**
     * @param PDO $pdo
     * @param string $name
     * @param int $address_id
     */
    public function __construct(PDO $pdo, string $name, int $address_id)
    {
        $this->pdo = $pdo;
        $this->name = $name;
        $this->address_id = $address_id;
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

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function create() {
        $stmt = $this->pdo->prepare("INSERT INTO companies (name, address_id) VALUES (?, ?)");
        $result = $stmt->execute([$this->name, $this->address_id]);
        $this->id = $this->pdo->lastInsertId();
        return $result;
    }

    public function update(int $id) {
        $stmt = $this->pdo->prepare("UPDATE companies SET name = ?, address_id = ? WHERE id = ?");
        return $stmt->execute([$this->name, $this->address_id, $id]);
    }

    public static function delete(PDO $pdo, int $id) {
        $stmt = $pdo->prepare("DELETE FROM companies WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function getAll(PDO $pdo) {
        $stmt = $pdo->query("SELECT * FROM companies");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById(PDO $pdo, int $id) {
        $stmt = $pdo->prepare("SELECT * FROM companies WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function countAll(PDO $pdo) {
        $stmt = $pdo->query("SELECT COUNT(*) AS total FROM companies");
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public static function search(PDO $pdo, string $keyword) {
        $stmt = $pdo->prepare("SELECT * FROM companies WHERE name LIKE ?");
        $stmt->execute(["%$keyword%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function countSearch(PDO $pdo, string $keyword) {
        $stmt = $pdo->prepare("SELECT COUNT(*) AS total FROM companies WHERE name LIKE ?");
        $stmt->execute(["%$keyword%"]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}

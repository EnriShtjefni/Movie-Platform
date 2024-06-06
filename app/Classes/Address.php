<?php

namespace App\Classes;

use PDO;

class Address
{
    private PDO $pdo;
    private int $id;
    private string $name;
    private string $city;
    private string $country;
    private string $phone;

    /**
     * @param PDO $pdo
     * @param string $name
     * @param string $city
     * @param string $country
     * @param string $phone
     */
    public function __construct(PDO $pdo, string $name, string $city, string $country, string $phone)
    {
        $this->pdo = $pdo;
        $this->name = $name;
        $this->city = $city;
        $this->country = $country;
        $this->phone = $phone;
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

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function create() {
        $stmt = $this->pdo->prepare("INSERT INTO addresses (name, city, country, phone) VALUES (?, ?, ?, ?)");
        $result = $stmt->execute([$this->name, $this->city, $this->country, $this->phone]);
        $this->id = $this->pdo->lastInsertId();
        return $result;
    }

    public function update(int $id) {
        $stmt = $this->pdo->prepare("UPDATE addresses SET name = ?, city = ?, country = ?, phone = ? WHERE id = ?");
        return $stmt->execute([$this->name, $this->city, $this->country, $this->phone, $id]);
    }

    public static function delete(PDO $pdo, int $id) {
        $stmt = $pdo->prepare("DELETE FROM addresses WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function getAll(PDO $pdo) {
        $stmt = $pdo->query("SELECT * FROM addresses");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById(PDO $pdo, int $id) {
        $stmt = $pdo->prepare("SELECT * FROM addresses WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function countAll(PDO $pdo) {
        $stmt = $pdo->query("SELECT COUNT(*) AS total FROM addresses");
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public static function search(PDO $pdo, string $keyword) {
        $stmt = $pdo->prepare("SELECT * FROM addresses WHERE name LIKE ?");
        $stmt->execute(["%$keyword%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function countSearch(PDO $pdo, string $keyword) {
        $stmt = $pdo->prepare("SELECT COUNT(*) AS total FROM addresses WHERE name LIKE ?");
        $stmt->execute(["%$keyword%"]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}

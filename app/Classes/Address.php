<?php

namespace App\Classes;

use PDO;

class Address extends BaseModel
{
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
        parent::__construct($pdo);
        $this->name = $name;
        $this->city = $city;
        $this->country = $country;
        $this->phone = $phone;
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
        $data = [
            'name' => $this->name,
            'city' => $this->city,
            'country' => $this->country,
            'phone' => $this->phone
        ];

        $validator = new AddressValidator();
        if (!$validator->validate($data)) {
            return ['success' => false, 'errors' => $validator->getErrors()];
        }

        $stmt = $this->pdo->prepare("INSERT INTO addresses (name, city, country, phone) VALUES (?, ?, ?, ?)");
        $result = $stmt->execute([$this->name, $this->city, $this->country, $this->phone]);
        $this->id = $this->pdo->lastInsertId();
        return ['success' => $result];
    }

    public function update(int $id) {
        $data = [
            'name' => $this->name,
            'city' => $this->city,
            'country' => $this->country,
            'phone' => $this->phone
        ];

        $validator = new AddressValidator();
        if (!$validator->validate($data)) {
            return ['success' => false, 'errors' => $validator->getErrors()];
        }

        $stmt = $this->pdo->prepare("UPDATE addresses SET name = ?, city = ?, country = ?, phone = ? WHERE id = ?");
        $result = $stmt->execute([$this->name, $this->city, $this->country, $this->phone, $id]);
        return ['success' => $result];
    }

    protected static function getTableName() {
        return "addresses";
    }

    protected static function getSearchedField() {
        return "name";
    }
}

<?php

namespace App\Classes;

use PDO;

class Company extends BaseModel
{
    private string $name;
    private int $address_id;

    /**
     * @param PDO $pdo
     * @param string $name
     * @param int $address_id
     */
    public function __construct(PDO $pdo, string $name, int $address_id)
    {
        parent::__construct($pdo);
        $this->name = $name;
        $this->address_id = $address_id;
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
        return $this->address_id;
    }

    public function setAddress(string $address_id): void
    {
        $this->address_id = $address_id;
    }

    public function create() {
        $data = [
            'name' => $this->name,
            'address_id' => $this->address_id
        ];

        $validator = new CompanyValidator();
        if (!$validator->validate($data)) {
            return ['success' => false, 'errors' => $validator->getErrors()];
        }

        $stmt = $this->pdo->prepare("INSERT INTO companies (name, address_id) VALUES (?, ?)");
        $result = $stmt->execute([$this->name, $this->address_id]);
        $this->id = $this->pdo->lastInsertId();
        return ['success' => $result];
    }

    public function update(int $id) {
        $data = [
            'name' => $this->name,
            'address_id' => $this->address_id
        ];

        $validator = new CompanyValidator();
        if (!$validator->validate($data)) {
            return ['success' => false, 'errors' => $validator->getErrors()];
        }

        $stmt = $this->pdo->prepare("UPDATE companies SET name = ?, address_id = ? WHERE id = ?");
        $result = $stmt->execute([$this->name, $this->address_id, $id]);
        return ['success' => $result];
    }

    protected static function getTableName() {
        return "companies";
    }

    protected static function getSearchedField() {
        return "name";
    }
}

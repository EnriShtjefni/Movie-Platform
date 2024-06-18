<?php

namespace App\Classes;

use PDO;

class Category extends BaseModel
{
    private string $name;

    /**
     * @param PDO $pdo
     * @param string $name
     */
    public function __construct(PDO $pdo, string $name)
    {
        parent::__construct($pdo);
        $this->name = $name;
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
        $data = [
            'name' => $this->name
        ];

        $validator = new CategoryValidator();
        if (!$validator->validate($data)) {
            return ['success' => false, 'errors' => $validator->getErrors()];
        }

        $stmt = $this->pdo->prepare("INSERT INTO categories (name) VALUES (?)");
        $result = $stmt->execute([$this->name]);
        $this->id = $this->pdo->lastInsertId();
        return ['success' => $result];
    }

    public function update(int $id) {
        $data = [
            'name' => $this->name
        ];

        $validator = new CategoryValidator();
        if (!$validator->validate($data)) {
            return ['success' => false, 'errors' => $validator->getErrors()];
        }

        $stmt = $this->pdo->prepare("UPDATE categories SET name = ? WHERE id = ?");
        $result = $stmt->execute([$this->name, $id]);
        return ['success' => $result];
    }

    protected static function getTableName() {
        return "categories";
    }

    protected static function getSearchedField() {
        return "name";
    }
}

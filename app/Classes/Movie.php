<?php

namespace App\Classes;

use PDO;

class Movie extends BaseModel
{
    private string $title;
    private string $description;
    private int $year;
    private string $status;
    private int $company_id;
    private array $categories;

    /**
     * @param PDO $pdo
     * @param string $title
     * @param string $description
     * @param int $year
     * @param string $status
     * @param int $company_id
     * @param array $categories
     */
    public function __construct(PDO $pdo, string $title, string $description, int $year, string $status, int $company_id, array $categories)
    {
        parent::__construct($pdo);
        $this->pdo = $pdo;
        $this->title = $title;
        $this->description = $description;
        $this->year = $year;
        $this->status = $status;
        $this->company_id = $company_id;
        $this->categories = $categories;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getCompanyId(): int
    {
        return $this->company_id;
    }

    public function setCompanyId(int $company_id): void
    {
        $this->company_id = $company_id;
    }

    public function getCategories(): array
    {
        return $this->categories;
    }

    public function setCategories(array $categories): void
    {
        $this->categories = $categories;
    }

    public function create() {
        $stmt = $this->pdo->prepare("INSERT INTO movies (title, description, year, status, company_id) VALUES (?, ?, ?, ?, ?)");
        $result = $stmt->execute([$this->title, $this->description, $this->year, $this->status, $this->company_id]);
        $this->id = $this->pdo->lastInsertId();
        $this->insertCategoryMovie();
        return $result;
    }

    public function update(int $id) {
        $stmt = $this->pdo->prepare("UPDATE movies SET title = ?, description = ?, year = ?, status = ?, company_id = ? WHERE id = ?");
        $result = $stmt->execute([$this->title, $this->description, $this->year, $this->status, $this->company_id, $id]);
        $this->deleteCategoryMovie($id);
        $this->insertCategoryMovie($id);
        return $result;
    }

    public function insertCategoryMovie($movieId = null) {
        $movieId = $movieId ?? $this->id;
        $stmt = $this->pdo->prepare("INSERT INTO category_movie (movie_id, category_id) VALUES (?, ?)");

        foreach ($this->categories as $category_id) {
            $stmt->execute([$movieId, $category_id]);
        }
    }

    public function deleteCategoryMovie($movieId) {
        $stmt = $this->pdo->prepare("DELETE FROM category_movie WHERE movie_id = ?");
        $stmt->execute([$movieId]);
    }

    protected static function getTableName() {
        return "movies";
    }

    protected static function getSearchedField() {
        return "title";
    }
}

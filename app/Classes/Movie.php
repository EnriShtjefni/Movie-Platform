<?php

namespace App\Classes;

use PDO;

class Movie
{
    private PDO $pdo;
    private int $id;
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
        $this->pdo = $pdo;
        $this->title = $title;
        $this->description = $description;
        $this->year = $year;
        $this->status = $status;
        $this->company_id = $company_id;
        $this->categories = $categories;
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

    public function insertCategoryMovie($movieId) {
        $movieId = $movieId ?? $this->id;
        $stmt = $this->pdo->prepare("INSERT INTO category_movie (movie_id, category_id) VALUES (?, ?)");

        foreach ($this->categories as $category_id) {
            $stmt->execute([$movieId, $category_id]);
        }
    }

    public function deleteCategoryMovie($movieId)
    {
        $stmt = $this->pdo->prepare("DELETE FROM category_movie WHERE movie_id = ?");
        $stmt->execute([$movieId]);
    }

    public static function delete(PDO $pdo, int $id) {
        $stmt = $pdo->prepare("DELETE FROM movies WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function getAll(PDO $pdo) {
        $stmt = $pdo->query("SELECT * FROM movies");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById(PDO $pdo, int $id) {
        $stmt = $pdo->prepare("SELECT * FROM movies WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function countAll(PDO $pdo) {
        $stmt = $pdo->query("SELECT COUNT(*) AS total FROM movies");
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public static function search(PDO $pdo, string $keyword) {
        $stmt = $pdo->prepare("SELECT * FROM movies WHERE title LIKE ?");
        $stmt->execute(["%$keyword%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function countSearch(PDO $pdo, string $keyword) {
        $stmt = $pdo->prepare("SELECT COUNT(*) AS total FROM movies WHERE title LIKE ?");
        $stmt->execute(["%$keyword%"]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}

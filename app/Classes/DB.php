<?php

namespace App\Classes;

use PDO;
use PDOException;

class DB
{
    protected string $host;
    protected string $database;
    protected string $username;
    protected string $password;
    protected int $port;

    /**
     * @param string $host
     * @param string $database
     * @param string $username
     * @param string $password
     * @param int $port
     */
    public function __construct(string $host, string $database, string $username, string $password, int $port)
    {
        $this->host = $host;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
        $this->port = $port;
    }

    public static function connect(string $host, string $database, string $username, string $password, int $port) {
        try {
            $db = new PDO("mysql:host=$host;dbname=$database;port=$port", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage() . '. ';
            return null;
        }
        return $db;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function setHost(string $host): void
    {
        $this->host = $host;
    }

    public function getDatabase(): string
    {
        return $this->database;
    }

    public function setDatabase(string $database): void
    {
        $this->database = $database;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function setPort(int $port): void
    {
        $this->port = $port;
    }
}

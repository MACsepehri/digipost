<?php

class Database {
    private PDO $connection;

    public function __construct(
        string $host = 'localhost',
        string $dbname = 'digipost',
        string $username = 'digipost_user',
        string $password = 'jzx144'
    ) {
        $this->connection = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
            $username,
            $password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );

        $this->createTables();
    }

    private function createTables(): void {
        $this->connection->exec("
            CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(100) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL
            )
        ");

        $this->connection->exec("
            CREATE TABLE IF NOT EXISTS posts (
                id INT AUTO_INCREMENT PRIMARY KEY,
                description TEXT NOT NULL,
                likes INT UNSIGNED NOT NULL DEFAULT 0,
                author_id INT NOT NULL,
                image_url TEXT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE CASCADE
            )
        ");
    }

    public function users(): User {
        return new User($this->connection);
    }

    public function posts(): Post {
        return new Post($this->connection);
    }
}

class User {
    private PDO $connection;

    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    public function create(string $username, string $password): bool {
        $query = $this->connection->prepare(
            "INSERT INTO users (username, password) VALUES (?, ?)"
        );

        return $query->execute([
            $username,
            password_hash($password, PASSWORD_DEFAULT)
        ]);
    }

    public function login(string $username, string $password): array|false {
        $query = $this->connection->prepare(
            "SELECT * FROM users WHERE username = ?"
        );

        $query->execute([$username]);
        $user = $query->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    public function get(int $id): array|false {
        $query = $this->connection->prepare(
            "SELECT id, username FROM users WHERE id = ?"
        );

        $query->execute([$id]);

        return $query->fetch();
    }

    public function getAll(): array {
        return $this->connection
            ->query("SELECT id, username FROM users ORDER BY id DESC")
            ->fetchAll();
    }

    public function delete(int $id): bool {
        $query = $this->connection->prepare(
            "DELETE FROM users WHERE id = ?"
        );

        return $query->execute([$id]);
    }

    public function getByUsername(string $username): array|false {
        $query = $this->connection->prepare(
            "SELECT id, username FROM users WHERE username = ?"
        );

        $query->execute([$username]);

        return $query->fetch();
    }
}

class Post {
    private PDO $connection;

    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    public function create(
        string $description,
        int $authorId,
        ?string $imageUrl = null
    ): bool {
        $query = $this->connection->prepare(
            "INSERT INTO posts (description, author_id, image_url)
             VALUES (?, ?, ?)"
        );

        return $query->execute([
            $description,
            $authorId,
            $imageUrl
        ]);
    }

    public function get(int $id): array|false {
        $query = $this->connection->prepare(
            "SELECT posts.*, users.username AS author
             FROM posts
             JOIN users ON posts.author_id = users.id
             WHERE posts.id = ?"
        );

        $query->execute([$id]);

        return $query->fetch();
    }

    public function getAll(): array {
        return $this->connection->query(
            "SELECT posts.*, users.username AS author
             FROM posts
             JOIN users ON posts.author_id = users.id
             ORDER BY posts.created_at DESC"
        )->fetchAll();
    }

    public function like(int $id): bool {
        $query = $this->connection->prepare(
            "UPDATE posts SET likes = likes + 1 WHERE id = ?"
        );

        return $query->execute([$id]);
    }

    public function delete(int $id): bool {
        $query = $this->connection->prepare(
            "DELETE FROM posts WHERE id = ?"
        );

        return $query->execute([$id]);
    }

    public function getByUsername(string $username): array|false {
        $query = $this->connection->prepare(
            "SELECT id, username FROM users WHERE username = ?"
        );

        $query->execute([$username]);

        return $query->fetch();
    }
}
?>
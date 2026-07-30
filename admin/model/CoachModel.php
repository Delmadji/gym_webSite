<?php

namespace Model;

require_once __DIR__ . '/Database.php';

use PDO;
use ClassApp\Coach;
use Model\Database;

/**
 * CoachModel
 *
 * Data model for Coach entity.
 * Handles CRUD operations for coaches in the database.
 *
 * @package Model
 * @version 1.0
 */
class CoachModel
{
    /**
     * @var PDO Database connection instance
     */
    private PDO $pdo;

    /**
     * CoachModel constructor
     *
     * Initializes the model with a database connection.
     */
    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    /**
     * Get all coaches
     *
     * Retrieves all coaches from the database, ordered by ID.
     *
     * @return array<Coach> Array of Coach objects
     */
    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM coach ORDER BY id");
        $coachs = [];

        while ($row = $stmt->fetch()) {
            $coachs[] = new Coach(
                $row['id'],
                $row['nom'],
                $row['specialite'],
                $row['description'],
                $row['image']
            );
        }

        return $coachs;
    }

    /**
     * Get coach by ID
     *
     * @param int $id The coach ID
     * @return Coach|null The Coach object or null if not found
     */
    public function getById(int $id): ?Coach
    {
        $stmt = $this->pdo->prepare("SELECT * FROM coach WHERE id = :id");
        $stmt->execute([':id' => $id]);

        $row = $stmt->fetch();

        if (!$row) {
            return null;
        }

        return new Coach(
            $row['id'],
            $row['nom'],
            $row['specialite'],
            $row['description'],
            $row['image']
        );
    }

    /**
     * Insert a new coach
     *
     * @param Coach $coach The Coach object to insert
     * @return bool True if insertion was successful, false otherwise
     */
    public function insert(Coach $coach): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO coach (nom, specialite, description, image)
            VALUES (:nom, :specialite, :description, :image)
        ");

        return $stmt->execute([
            ':nom' => $coach->getNom(),
            ':specialite' => $coach->getSpecialite(),
            ':description' => $coach->getDescription(),
            ':image' => $coach->getImage()
        ]);
    }

    /**
     * Update an existing coach
     *
     * @param Coach $coach The Coach object with updated data
     * @return bool True if update was successful, false otherwise
     */
    public function update(Coach $coach): bool
    {
        $stmt = $this->pdo->prepare("
            UPDATE coach
            SET nom = :nom,
                specialite = :specialite,
                description = :description,
                image = :image
            WHERE id = :id
        ");

        return $stmt->execute([
            ':id' => $coach->getId(),
            ':nom' => $coach->getNom(),
            ':specialite' => $coach->getSpecialite(),
            ':description' => $coach->getDescription(),
            ':image' => $coach->getImage()
        ]);
    }

    /**
     * Delete a coach
     *
     * @param int $id The ID of the coach to delete
     * @return bool True if deletion was successful, false otherwise
     */
    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM coach WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
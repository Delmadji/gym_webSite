<?php

namespace Model;

use PDO;
use ClassApp\Activite;

/**
 * ActiviteModel
 *
 * Data model for Activite (Activity) entity.
 * Handles CRUD operations for activities in the database.
 *
 * @package Model
 * @version 1.0
 */
class ActiviteModel
{
    /**
     * @var PDO Database connection instance
     */
    private PDO $pdo;

    /**
     * ActiviteModel constructor
     *
     * Initializes the model with a database connection.
     */
    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    /**
     * Get all activities
     *
     * Retrieves all activities from the database, ordered by ID.
     *
     * @return array<Activite> Array of Activite objects
     */
    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM activites ORDER BY id");
        $activites = [];

        while ($row = $stmt->fetch()) {
            $activites[] = new Activite(
                $row['id'],
                $row['nom'],
                $row['description'],
                $row['jour'],
                $row['heure'],
                $row['coach_id']
            );
        }

        return $activites;
    }

    /**
     * Get activity by ID
     *
     * @param int $id The activity ID
     * @return Activite|null The Activite object or null if not found
     */
    public function getById(int $id): ?Activite
{
    $stmt = $this->pdo->prepare("SELECT * FROM activites WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        return null;
    }

    return new Activite(
        (int) $row['id'],
        $row['nom'],
        $row['description'],
        $row['jour'],
        $row['heure'],
        $row['coach_id']
    );
}

    public function insert(Activite $a): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO activites (nom, description, jour, heure, coach_id)
            VALUES (:nom, :description, :jour, :heure, :coach_id)
        ");

        return $stmt->execute([
            ':nom' => $a->getNom(),
            ':description' => $a->getDescription(),
            ':jour' => $a->getJour(),
            ':heure' => $a->getHeure(),
            ':coach_id' => $a->getCoachId()
        ]);
    }

    /**
     * Update an existing activity
     *
     * @param Activite $a The Activite object with updated data
     * @return bool True if update was successful, false otherwise
     */
    public function update(Activite $a): bool
    {
        $stmt = $this->pdo->prepare("
            UPDATE activites
            SET nom = :nom,
                description = :description,
                jour = :jour,
                heure = :heure,
                coach_id = :coach_id
            WHERE id = :id
        ");

        return $stmt->execute([
            ':id' => $a->getId(),
            ':nom' => $a->getNom(),
            ':description' => $a->getDescription(),
            ':jour' => $a->getJour(),
            ':heure' => $a->getHeure(),
            ':coach_id' => $a->getCoachId()
        ]);
    }

    /**
     * Delete an activity
     *
     * @param int $id The ID of the activity to delete
     * @return bool True if deletion was successful, false otherwise
     */
    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM activites WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
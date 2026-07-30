<?php

namespace Model;

require_once __DIR__ . '/Database.php';

use PDO;
use ClassApp\Abonnement;
use Model\Database;

/**
 * AbonnementModel
 *
 * Data model for Abonnement (Subscription) entity.
 * Handles CRUD operations for subscriptions in the database.
 *
 * @package Model
 * @version 1.0
 */
class AbonnementModel
{
    /**
     * @var PDO Database connection instance
     */
    private PDO $pdo;

    /**
     * AbonnementModel constructor
     *
     * Initializes the model with a database connection.
     */
    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    /**
     * Get all subscriptions
     *
     * Retrieves all subscriptions from the database, ordered by ID.
     *
     * @return array<Abonnement> Array of Abonnement objects
     */
    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM abonnements ORDER BY id");
        $abonnements = [];

        while ($row = $stmt->fetch()) {
            $abonnements[] = new Abonnement(
                $row['id'],
                $row['nom'],
                $row['prix'],
                $row['duree'],
                $row['services']
            );
        }

        return $abonnements;
    }

    /**
     * Get subscription by ID
     *
     * @param int $id The subscription ID
     * @return Abonnement|null The Abonnement object or null if not found
     */
    public function getById(int $id): ?Abonnement
    {
        $stmt = $this->pdo->prepare("SELECT * FROM abonnements WHERE id = :id");
        $stmt->execute([':id' => $id]);

        $row = $stmt->fetch();

        if (!$row) {
            return null;
        }

        return new Abonnement(
            $row['id'],
            $row['nom'],
            $row['prix'],
            $row['duree'],
            $row['services']
        );
    }

    /**
     * Insert a new subscription
     *
     * @param Abonnement $a The Abonnement object to insert
     * @return bool True if insertion was successful, false otherwise
     */
    public function insert(Abonnement $a): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO abonnements (nom, prix, duree, services)
            VALUES (:nom, :prix, :duree, :services)
        ");

        return $stmt->execute([
            ':nom' => $a->getNom(),
            ':prix' => $a->getPrix(),
            ':duree' => $a->getDuree(),
            ':services' => $a->getServices()
        ]);
    }

    /**
     * Update an existing subscription
     *
     * @param Abonnement $a The Abonnement object with updated data
     * @return bool True if update was successful, false otherwise
     */
    public function update(Abonnement $a): bool
    {
        $stmt = $this->pdo->prepare("
            UPDATE abonnements
            SET nom = :nom,
                prix = :prix,
                duree = :duree,
                services = :services
            WHERE id = :id
        ");

        return $stmt->execute([
            ':id' => $a->getId(),
            ':nom' => $a->getNom(),
            ':prix' => $a->getPrix(),
            ':duree' => $a->getDuree(),
            ':services' => $a->getServices()
        ]);
    }

    /**
     * Delete a subscription
     *
     * @param int $id The ID of the subscription to delete
     * @return bool True if deletion was successful, false otherwise
     */
    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM abonnements WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
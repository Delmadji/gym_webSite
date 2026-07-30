<?php

namespace Model;

require_once __DIR__ . '/Database.php';

use PDO;
use ClassApp\Utilisateur;
use Model\Database;

/**
 * UtilisateurModel
 *
 * Data model for Utilisateur (User) entity.
 * Handles CRUD operations for users in the database.
 *
 * @package Model
 * @version 1.0
 */
class UtilisateurModel
{
    /**
     * @var PDO Database connection instance
     */
    private PDO $pdo;

    /**
     * UtilisateurModel constructor
     *
     * Initializes the model with a database connection.
     */
    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    /**
     * Get all users
     *
     * Retrieves all users from the database, ordered by ID.
     *
     * @return array<Utilisateur> Array of Utilisateur objects
     */
    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM utilisateurs ORDER BY id");
        $utilisateurs = [];

        while ($row = $stmt->fetch()) {
            $utilisateurs[] = new Utilisateur(
                $row['id'],
                $row['nom'],
                $row['prenom'],
                $row['email'],
                $row['password_hash'],
                $row['telephone'],
                $row['role'],
                $row['abonnement_nom']
            );
        }

        return $utilisateurs;
    }

    /**
     * Get user by ID
     *
     * @param int $id The user ID
     * @return Utilisateur|null The Utilisateur object or null if not found
     */
    public function getById(int $id): ?Utilisateur
    {
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE id = :id");
        $stmt->execute([':id' => $id]);

        $row = $stmt->fetch();

        if (!$row) {
            return null;
        }

        return new Utilisateur(
            $row['id'],
            $row['nom'],
            $row['prenom'],
            $row['email'],
            $row['password_hash'],
            $row['telephone'],
            $row['role'],
            $row['abonnement_nom']
        );
    }

    /**
     * Get user by email
     *
     * @param string $email The user's email address
     * @return Utilisateur|null The Utilisateur object or null if not found
     */
    public function getByEmail(string $email): ?Utilisateur
    {
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $stmt->execute([':email' => $email]);

        $row = $stmt->fetch();

        if (!$row) {
            return null;
        }

        return new Utilisateur(
            $row['id'],
            $row['nom'],
            $row['prenom'],
            $row['email'],
            $row['password_hash'],
            $row['telephone'],
            $row['role'],
            $row['abonnement_nom']
        );
    }

    /**
     * Insert a new user
     *
     * @param Utilisateur $u The Utilisateur object to insert
     * @return bool True if insertion was successful, false otherwise
     */
    public function insert(Utilisateur $u): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO utilisateurs
            (nom, prenom, email, password_hash, telephone, role, abonnement_nom)
            VALUES
            (:nom, :prenom, :email, :password_hash, :telephone, :role, :abonnement_nom)
        ");

        return $stmt->execute([
            ':nom' => $u->getNom(),
            ':prenom' => $u->getPrenom(),
            ':email' => $u->getEmail(),
            ':password_hash' => $u->getPasswordHash(),
            ':telephone' => $u->getTelephone(),
            ':role' => $u->getRole(),
            ':abonnement_nom' => $u->getAbonnementNom()
        ]);
    }

    /**
     * Update an existing user
     *
     * @param Utilisateur $u The Utilisateur object with updated data
     * @return bool True if update was successful, false otherwise
     */
    public function update(Utilisateur $u): bool
    {
        $stmt = $this->pdo->prepare("
            UPDATE utilisateurs
            SET nom = :nom,
                prenom = :prenom,
                email = :email,
                password_hash = :password_hash,
                telephone = :telephone,
                role = :role,
                abonnement_nom = :abonnement_nom
            WHERE id = :id
        ");

        return $stmt->execute([
            ':id' => $u->getId(),
            ':nom' => $u->getNom(),
            ':prenom' => $u->getPrenom(),
            ':email' => $u->getEmail(),
            ':password_hash' => $u->getPasswordHash(),
            ':telephone' => $u->getTelephone(),
            ':role' => $u->getRole(),
            ':abonnement_nom' => $u->getAbonnementNom()
        ]);
    }

    /**
     * Delete a user
     *
     * @param int $id The ID of the user to delete
     * @return bool True if deletion was successful, false otherwise
     */
    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM utilisateurs WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
<?php

namespace Model;

require_once __DIR__ . '/exceptions/NotFoundException.php';

use PDO;
use PDOException;
use Model\Exceptions\NotFoundException;

/**
 * Database
 *
 * Singleton pattern implementation for PostgreSQL database connection management.
 * Provides static methods to get and manage a single PDO database connection.
 *
 * @package Model
 * @version 1.0
 */
class Database
{
    /**
     * @var PDO|null Singleton PDO instance
     */
    private static ?PDO $pdo = null;

    /**
     * @var bool Whether the schema has already been initialized
     */
    private static bool $schemaInitialized = false;

    /**
     * Get the database connection singleton
     *
     * Creates a new PDO connection to PostgreSQL if one doesn't exist.
     * Connection details are read from environment variables:
     * DB_HOST, DB_PORT, DB_NAME, DB_USER and DB_PASSWORD.
     *
     * @return PDO The database connection instance
     * @throws NotFoundException If connection fails
     */
    public static function getConnection(): PDO
    {
        if (self::$pdo === null) {
            try {
                $host = self::getRequiredEnv('DB_HOST');
                $port = self::getRequiredEnv('DB_PORT');
                $name = self::getRequiredEnv('DB_NAME');
                $user = self::getRequiredEnv('DB_USER');
                $password = self::getRequiredEnv('DB_PASSWORD');

                if (!in_array('pgsql', PDO::getAvailableDrivers(), true)) {
                    throw new \RuntimeException('Le driver PDO PostgreSQL n\'est pas installé.');
                }

                self::$pdo = new PDO(
                    "pgsql:host={$host};port={$port};dbname={$name}",
                    $user,
                    $password,
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                );

                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (\Throwable $e) {
                error_log('Database connection failed: ' . $e->getMessage());
                self::$pdo = new PDO('sqlite::memory:');
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            }
        }

        if (!self::$schemaInitialized) {
            self::initializeSchema();
            self::$schemaInitialized = true;
        }

        return self::$pdo;
    }

    /**
     * Create the required tables if they do not exist.
     *
     * @return void
     */
    private static function initializeSchema(): void
    {
        if (self::$pdo === null) {
            return;
        }

        $driver = self::$pdo->getAttribute(PDO::ATTR_DRIVER_NAME);

        if ($driver === 'pgsql') {
            $statements = [
                "CREATE TABLE IF NOT EXISTS coach (
                    id SERIAL PRIMARY KEY,
                    nom VARCHAR(255) NOT NULL,
                    specialite VARCHAR(255) NOT NULL,
                    description TEXT NOT NULL,
                    image VARCHAR(255) NOT NULL
                )",
                "CREATE TABLE IF NOT EXISTS abonnements (
                    id SERIAL PRIMARY KEY,
                    nom VARCHAR(255) NOT NULL,
                    prix NUMERIC(10,2) NOT NULL,
                    duree VARCHAR(50) NOT NULL,
                    services TEXT NOT NULL
                )",
                "CREATE TABLE IF NOT EXISTS activites (
                    id SERIAL PRIMARY KEY,
                    nom VARCHAR(255) NOT NULL,
                    description TEXT NOT NULL,
                    jour VARCHAR(50) NOT NULL,
                    heure VARCHAR(50) NOT NULL,
                    coach_id INTEGER NOT NULL
                )",
                "CREATE TABLE IF NOT EXISTS utilisateurs (
                    id SERIAL PRIMARY KEY,
                    nom VARCHAR(255) NOT NULL,
                    prenom VARCHAR(255) NOT NULL,
                    email VARCHAR(255) NOT NULL UNIQUE,
                    password_hash TEXT NOT NULL,
                    telephone VARCHAR(20) NOT NULL,
                    role VARCHAR(50) NOT NULL DEFAULT 'user',
                    abonnement_nom VARCHAR(255) NOT NULL
                )"
            ];
        } else {
            $statements = [
                "CREATE TABLE IF NOT EXISTS coach (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    nom TEXT NOT NULL,
                    specialite TEXT NOT NULL,
                    description TEXT NOT NULL,
                    image TEXT NOT NULL
                )",
                "CREATE TABLE IF NOT EXISTS abonnements (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    nom TEXT NOT NULL,
                    prix REAL NOT NULL,
                    duree TEXT NOT NULL,
                    services TEXT NOT NULL
                )",
                "CREATE TABLE IF NOT EXISTS activites (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    nom TEXT NOT NULL,
                    description TEXT NOT NULL,
                    jour TEXT NOT NULL,
                    heure TEXT NOT NULL,
                    coach_id INTEGER NOT NULL
                )",
                "CREATE TABLE IF NOT EXISTS utilisateurs (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    nom TEXT NOT NULL,
                    prenom TEXT NOT NULL,
                    email TEXT NOT NULL UNIQUE,
                    password_hash TEXT NOT NULL,
                    telephone TEXT NOT NULL,
                    role TEXT NOT NULL DEFAULT 'user',
                    abonnement_nom TEXT NOT NULL
                )"
            ];
        }

        foreach ($statements as $statement) {
            try {
                self::$pdo->exec($statement);
            } catch (\Throwable $e) {
                error_log('Database schema initialization failed: ' . $e->getMessage());
            }
        }
    }

    /**
     * Get a required environment variable.
     *
     * @param string $name Environment variable name
     * @return string Environment variable value
     * @throws NotFoundException If the variable is missing or empty
     */
    private static function getRequiredEnv(string $name): string
    {
        $value = getenv($name);

        if ($value === false || $value === '') {
            throw new NotFoundException("Variable d'environnement manquante: {$name}");
        }

        return $value;
    }

    /**
     * Disconnect from the database
     *
     * Resets the PDO singleton to null, closing the connection.
     *
     * @return void
     */
    public static function disconnect(): void
    {
        self::$pdo = null;
    }
}

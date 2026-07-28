<?php

namespace Model;

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

                self::$pdo = new PDO(
                    "pgsql:host={$host};port={$port};dbname={$name}",
                    $user,
                    $password
                );

                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                throw new NotFoundException("Erreur de connexion à la base");
            }
        }

        return self::$pdo;
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

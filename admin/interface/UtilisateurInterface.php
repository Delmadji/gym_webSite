<?php

namespace InterfaceApp;

/**
 * UtilisateurInterface
 *
 * Interface for the Utilisateur (User) entity.
 * Defines the contract for user object methods including getters and setters
 * for all user properties.
 *
 * @package InterfaceApp
 * @version 1.0
 */
interface UtilisateurInterface
{
    /**
     * Get the user's ID
     *
     * @return int|null The user ID
     */
    public function getId(): ?int;

    /**
     * Get the user's last name
     *
     * @return string The last name
     */
    public function getNom(): string;

    /**
     * Get the user's first name
     *
     * @return string The first name
     */
    public function getPrenom(): string;

    /**
     * Get the user's email address
     *
     * @return string The email address
     */
    public function getEmail(): string;

    /**
     * Get the user's password hash
     *
     * @return string The password hash
     */
    public function getPasswordHash(): string;

    /**
     * Get the user's telephone number
     *
     * @return string The telephone number
     */
    public function getTelephone(): string;

    /**
     * Get the user's role
     *
     * @return string The role
     */
    public function getRole(): string;

    /**
     * Get the user's subscription plan name
     *
     * @return string|null The subscription name
     */
    public function getAbonnementNom(): ?string;

    /**
     * Set the user's last name
     *
     * @param string $nom The last name
     * @return void
     */
    public function setNom(string $nom): void;

    /**
     * Set the user's first name
     *
     * @param string $prenom The first name
     * @return void
     */
    public function setPrenom(string $prenom): void;

    /**
     * Set the user's email address
     *
     * @param string $email The email address
     * @return void
     */
    public function setEmail(string $email): void;

    /**
     * Set the user's password hash
     *
     * @param string $passwordHash The password hash
     * @return void
     */
    public function setPasswordHash(string $passwordHash): void;

    /**
     * Set the user's telephone number
     *
     * @param string $telephone The telephone number
     * @return void
     */
    public function setTelephone(string $telephone): void;

    /**
     * Set the user's role
     *
     * @param string $role The role
     * @return void
     */
    public function setRole(string $role): void;

    /**
     * Set the user's subscription plan name
     *
     * @param string|null $abonnementNom The subscription name
     * @return void
     */
    public function setAbonnementNom(?string $abonnementNom): void;
}
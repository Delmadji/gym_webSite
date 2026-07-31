<?php

namespace ClassApp;

require_once __DIR__ . '/../interface/UtilisateurInterface.php';

/**
 * Utilisateur
 *
 * Represents a user/member in the system.
 * Implements the UtilisateurInterface and manages user data including
 * personal information, email, password, and subscription details.
 *
 * @package ClassApp
 * @version 1.0
 */
class Utilisateur implements \InterfaceApp\UtilisateurInterface
{
    /**
     * @var int|null The unique user ID
     */
    private ?int $id;

    /**
     * @var string The user's last name
     */
    private string $nom;

    /**
     * @var string The user's first name
     */
    private string $prenom;

    /**
     * @var string The user's email address
     */
    private string $email;

    /**
     * @var string The hashed password
     */
    private string $passwordHash;

    /**
     * @var string The user's telephone number
     */
    private string $telephone;

    /**
     * @var string The user's role (e.g., 'admin', 'user')
     */
    private string $role;

    /**
     * @var string|null The name of the user's subscription plan
     */
    private ?string $abonnementNom;

    /**
     * Utilisateur constructor
     *
     * @param int|null $id The user ID
     * @param string $nom The user's last name
     * @param string $prenom The user's first name
     * @param string $email The user's email address
     * @param string $passwordHash The hashed password
     * @param string $telephone The user's telephone number
     * @param string $role The user's role
     * @param string|null $abonnementNom The subscription plan name
     */
    public function __construct(
        ?int $id = null,
        string $nom = '',
        string $prenom = '',
        string $email = '',
        string $passwordHash = '',
        string $telephone = '',
        string $role = '',
        ?string $abonnementNom = null
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        $this->telephone = $telephone;
        $this->role = $role;
        $this->abonnementNom = $abonnementNom;
    }

    /**
     * Get the user's ID
     *
     * @return int|null The user ID or null if not set
     */
    public function getId(): ?int { return $this->id; }

    /**
     * Get the user's last name
     *
     * @return string The last name
     */
    public function getNom(): string { return $this->nom; }

    /**
     * Get the user's first name
     *
     * @return string The first name
     */
    public function getPrenom(): string { return $this->prenom; }

    /**
     * Get the user's email address
     *
     * @return string The email address
     */
    public function getEmail(): string { return $this->email; }

    /**
     * Get the hashed password
     *
     * @return string The password hash
     */
    public function getPasswordHash(): string { return $this->passwordHash; }

    /**
     * Get the user's telephone number
     *
     * @return string The telephone number
     */
    public function getTelephone(): string { return $this->telephone; }

    /**
     * Get the user's role
     *
     * @return string The role
     */
    public function getRole(): string { return $this->role; }

    /**
     * Get the user's subscription plan name
     *
     * @return string|null The subscription name or null if not subscribed
     */
    public function getAbonnementNom(): ?string { return $this->abonnementNom; }

    /**
     * Set the user's last name
     *
     * @param string $nom The last name
     * @return void
     */
    public function setNom(string $nom): void { $this->nom = $nom; }

    /**
     * Set the user's first name
     *
     * @param string $prenom The first name
     * @return void
     */
    public function setPrenom(string $prenom): void { $this->prenom = $prenom; }

    /**
     * Set the user's email address
     *
     * @param string $email The email address
     * @return void
     */
    public function setEmail(string $email): void { $this->email = $email; }

    /**
     * Set the hashed password
     *
     * @param string $passwordHash The password hash
     * @return void
     */
    public function setPasswordHash(string $passwordHash): void { $this->passwordHash = $passwordHash; }

    /**
     * Set the user's telephone number
     *
     * @param string $telephone The telephone number
     * @return void
     */
    public function setTelephone(string $telephone): void { $this->telephone = $telephone; }

    /**
     * Set the user's role
     *
     * @param string $role The role
     * @return void
     */
    public function setRole(string $role): void { $this->role = $role; }

    /**
     * Set the user's subscription plan name
     *
     * @param string|null $abonnementNom The subscription name or null
     * @return void
     */
    public function setAbonnementNom(?string $abonnementNom): void { $this->abonnementNom = $abonnementNom; }
}
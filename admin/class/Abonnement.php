<?php

namespace ClassApp;

require_once __DIR__ . '/../interface/AbonnementInterface.php';

/**
 * Abonnement
 *
 * Represents a subscription plan in the system.
 * Implements the AbonnementInterface and manages subscription details including
 * name, price, duration, and included services.
 *
 * @package ClassApp
 * @version 1.0
 */
class Abonnement implements \InterfaceApp\AbonnementInterface
{
    /**
     * @var int|null The unique subscription ID
     */
    private ?int $id;

    /**
     * @var string The subscription plan name
     */
    private string $nom;

    /**
     * @var string The subscription price
     */
    private string $prix;

    /**
     * @var string The subscription duration (e.g., 'monthly', '1 month')
     */
    private string $duree;

    /**
     * @var string A description of services included in the subscription
     */
    private string $services;

    /**
     * Abonnement constructor
     *
     * @param int|null $id The subscription ID
     * @param string $nom The subscription plan name
     * @param string $prix The subscription price
     * @param string $duree The subscription duration
     * @param string $services The included services
     */
    public function __construct(
        ?int $id = null,
        string $nom = '',
        string $prix = '',
        string $duree = '',
        string $services = ''
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->duree = $duree;
        $this->services = $services;
    }

    /**
     * Get string representation of the subscription
     *
     * @return string Subscription name and price separated by hyphen
     */
    public function __toString(): string
    {
        return $this->nom . ' - ' . $this->prix;
    }

    /**
     * Get the subscription ID
     *
     * @return int|null The subscription ID or null if not set
     */
    public function getId(): ?int { return $this->id; }

    /**
     * Get the subscription plan name
     *
     * @return string The plan name
     */
    public function getNom(): string { return $this->nom; }

    /**
     * Get the subscription price
     *
     * @return string The price
     */
    public function getPrix(): string { return $this->prix; }

    /**
     * Get the subscription duration
     *
     * @return string The duration
     */
    public function getDuree(): string { return $this->duree; }

    /**
     * Get the included services
     *
     * @return string The services description
     */
    public function getServices(): string { return $this->services; }

    /**
     * Set the subscription plan name
     *
     * @param string $nom The plan name
     * @return void
     */
    public function setNom(string $nom): void { $this->nom = $nom; }

    /**
     * Set the subscription price
     *
     * @param string $prix The price
     * @return void
     */
    public function setPrix(string $prix): void { $this->prix = $prix; }

    /**
     * Set the subscription duration
     *
     * @param string $duree The duration
     * @return void
     */
    public function setDuree(string $duree): void { $this->duree = $duree; }

    /**
     * Set the included services
     *
     * @param string $services The services description
     * @return void
     */
    public function setServices(string $services): void { $this->services = $services; }
}
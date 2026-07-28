<?php

namespace InterfaceApp;

/**
 * AbonnementInterface
 *
 * Interface for the Abonnement (Subscription) entity.
 * Defines the contract for subscription object methods including getters and setters
 * for all subscription properties.
 *
 * @package InterfaceApp
 * @version 1.0
 */
interface AbonnementInterface
{
    /**
     * Get the subscription ID
     *
     * @return int|null The subscription ID
     */
    public function getId(): ?int;

    /**
     * Get the subscription plan name
     *
     * @return string The plan name
     */
    public function getNom(): string;

    /**
     * Get the subscription price
     *
     * @return string The price
     */
    public function getPrix(): string;

    /**
     * Get the subscription duration
     *
     * @return string The duration
     */
    public function getDuree(): string;

    /**
     * Get the included services
     *
     * @return string The services description
     */
    public function getServices(): string;

    /**
     * Set the subscription plan name
     *
     * @param string $nom The plan name
     * @return void
     */
    public function setNom(string $nom): void;

    /**
     * Set the subscription price
     *
     * @param string $prix The price
     * @return void
     */
    public function setPrix(string $prix): void;

    /**
     * Set the subscription duration
     *
     * @param string $duree The duration
     * @return void
     */
    public function setDuree(string $duree): void;

    /**
     * Set the included services
     *
     * @param string $services The services description
     * @return void
     */
    public function setServices(string $services): void;
}
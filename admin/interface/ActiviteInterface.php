<?php

namespace InterfaceApp;

/**
 * ActiviteInterface
 *
 * Interface for the Activite (Activity) entity.
 * Defines the contract for activity object methods including getters and setters
 * for all activity properties.
 *
 * @package InterfaceApp
 * @version 1.0
 */
interface ActiviteInterface
{
    /**
     * Get the activity ID
     *
     * @return int|null The activity ID
     */
    public function getId(): ?int;

    /**
     * Get the activity name
     *
     * @return string The name
     */
    public function getNom(): string;

    /**
     * Get the activity description
     *
     * @return string The description
     */
    public function getDescription(): string;

    /**
     * Get the day of the activity
     *
     * @return string The day
     */
    public function getJour(): string;

    /**
     * Get the time of the activity
     *
     * @return string The time
     */
    public function getHeure(): string;

    /**
     * Get the coach ID
     *
     * @return int The coach ID
     */
    public function getCoachId(): int;

    /**
     * Set the activity name
     *
     * @param string $nom The name
     * @return void
     */
    public function setNom(string $nom): void;

    /**
     * Set the activity description
     *
     * @param string $description The description
     * @return void
     */
    public function setDescription(string $description): void;

    /**
     * Set the day of the activity
     *
     * @param string $jour The day
     * @return void
     */
    public function setJour(string $jour): void;

    /**
     * Set the time of the activity
     *
     * @param string $heure The time
     * @return void
     */
    public function setHeure(string $heure): void;

    /**
     * Set the coach ID
     *
     * @param int $coach_id The coach ID
     * @return void
     */
    public function setCoachId(int $coach_id): void;
}
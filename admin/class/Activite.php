<?php

namespace ClassApp;

use InterfaceApp\ActiviteInterface;

/**
 * Activite
 *
 * Represents a fitness activity or class in the system.
 * Implements the ActiviteInterface and manages activity information including
 * name, description, schedule (day and time), and associated coach.
 *
 * @package ClassApp
 * @version 1.0
 */
class Activite implements ActiviteInterface
{
    /**
     * @var int|null The unique activity ID
     */
    private ?int $id;

    /**
     * @var string The activity name
     */
    private string $nom;

    /**
     * @var string A description of the activity
     */
    private string $description;

    /**
     * @var string The day when the activity takes place
     */
    private string $jour;

    /**
     * @var string The time when the activity takes place
     */
    private string $heure;

    /**
     * @var int The ID of the coach leading the activity
     */
    private int $coach_id;

    /**
     * Activite constructor
     *
     * @param int|null $id The activity ID
     * @param string $nom The activity name
     * @param string $description A description of the activity
     * @param string $jour The day of the activity
     * @param string $heure The time of the activity
     * @param int $coach_id The ID of the coach
     */
    public function __construct(
        ?int $id = null,
        string $nom = '',
        string $description = '',
        string $jour = '',
        string $heure = '',
        int $coach_id = 0
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->jour = $jour;
        $this->heure = $heure;
        $this->coach_id = $coach_id;
    }

    /**
     * Get string representation of the activity
     *
     * @return string Activity name, day, and time
     */
    public function __toString(): string
    {
        return $this->nom . ' - ' . $this->jour . ' ' . $this->heure;
    }

    /**
     * Get the activity ID
     *
     * @return int|null The activity ID or null if not set
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the activity name
     *
     * @return string The name
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Get the activity description
     *
     * @return string The description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Get the day of the activity
     *
     * @return string The day
     */
    public function getJour(): string
    {
        return $this->jour;
    }

    /**
     * Get the time of the activity
     *
     * @return string The time
     */
    public function getHeure(): string
    {
        return $this->heure;
    }

    /**
     * Get the coach ID
     *
     * @return int The coach ID
     */
    public function getCoachId(): int
    {
        return $this->coach_id;
    }

    /**
     * Set the activity name
     *
     * @param string $nom The name
     * @return void
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * Set the activity description
     *
     * @param string $description The description
     * @return void
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Set the day of the activity
     *
     * @param string $jour The day
     * @return void
     */
    public function setJour(string $jour): void
    {
        $this->jour = $jour;
    }

    /**
     * Set the time of the activity
     *
     * @param string $heure The time
     * @return void
     */
    public function setHeure(string $heure): void
    {
        $this->heure = $heure;
    }

    /**
     * Set the coach ID
     *
     * @param int $coach_id The coach ID
     * @return void
     */
    public function setCoachId(int $coach_id): void
    {
        $this->coach_id = $coach_id;
    }
}
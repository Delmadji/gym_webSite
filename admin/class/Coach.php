<?php

namespace ClassApp;

require_once __DIR__ . '/../interface/CoachInterface.php';

/**
 * Coach
 *
 * Represents a fitness coach or trainer in the system.
 * Implements the CoachInterface and manages coach information including
 * name, specialty, description, and profile image.
 *
 * @package ClassApp
 * @version 1.0
 */
class Coach implements \InterfaceApp\CoachInterface
{
    /**
     * @var int|null The unique coach ID
     */
    private ?int $id;

    /**
     * @var string The coach's name
     */
    private string $nom;

    /**
     * @var string The coach's specialty or expertise area
     */
    private string $specialite;

    /**
     * @var string A description of the coach
     */
    private string $description;

    /**
     * @var string The path to the coach's image file
     */
    private string $image;

    /**
     * Coach constructor
     *
     * @param int|null $id The coach ID
     * @param string $nom The coach's name
     * @param string $specialite The coach's specialty
     * @param string $description A description of the coach
     * @param string $image The path to the coach's image
     */
    public function __construct(
        ?int $id = null,
        string $nom = '',
        string $specialite = '',
        string $description = '',
        string $image = ''
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->specialite = $specialite;
        $this->description = $description;
        $this->image = $image;
    }

    /**
     * Get string representation of the coach
     *
     * @return string Coach name and specialty separated by hyphen
     */
    public function __toString(): string
    {
        return $this->nom . ' - ' . $this->specialite;
    }

    /**
     * Get the coach's ID
     *
     * @return int|null The coach ID or null if not set
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the coach's name
     *
     * @return string The name
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Get the coach's specialty
     *
     * @return string The specialty
     */
    public function getSpecialite(): string
    {
        return $this->specialite;
    }

    /**
     * Get the coach's description
     *
     * @return string The description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Get the coach's image path
     *
     * @return string The image path
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Set the coach's name
     *
     * @param string $nom The name
     * @return void
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * Set the coach's specialty
     *
     * @param string $specialite The specialty
     * @return void
     */
    public function setSpecialite(string $specialite): void
    {
        $this->specialite = $specialite;
    }

    /**
     * Set the coach's description
     *
     * @param string $description The description
     * @return void
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Set the coach's image path
     *
     * @param string $image The image path
     * @return void
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }
}

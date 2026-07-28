<?php

namespace InterfaceApp;

/**
 * CoachInterface
 *
 * Interface for the Coach entity.
 * Defines the contract for coach object methods including getters and setters
 * for all coach properties.
 *
 * @package InterfaceApp
 * @version 1.0
 */
interface CoachInterface
{
    /**
     * Get the coach's ID
     *
     * @return int|null The coach ID
     */
    public function getId(): ?int;

    /**
     * Get the coach's name
     *
     * @return string The name
     */
    public function getNom(): string;

    /**
     * Get the coach's specialty
     *
     * @return string The specialty
     */
    public function getSpecialite(): string;

    /**
     * Get the coach's description
     *
     * @return string The description
     */
    public function getDescription(): string;

    /**
     * Get the coach's image path
     *
     * @return string The image path
     */
    public function getImage(): string;

    /**
     * Set the coach's name
     *
     * @param string $nom The name
     * @return void
     */
    public function setNom(string $nom): void;

    /**
     * Set the coach's specialty
     *
     * @param string $specialite The specialty
     * @return void
     */
    public function setSpecialite(string $specialite): void;

    /**
     * Set the coach's description
     *
     * @param string $description The description
     * @return void
     */
    public function setDescription(string $description): void;

    /**
     * Set the coach's image path
     *
     * @param string $image The image path
     * @return void
     */
    public function setImage(string $image): void;
}
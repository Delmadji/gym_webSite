<?php
namespace Model;

require_once __DIR__ . '/../admin/model/Csrf.php';

/**
 * CookieManager
 *
 * Manages user cookie consent preferences and choices.
 *
 * @package Model
 * @version 1.0
 */
class CookieManager
{
    /**
     * Handle user cookie consent choice
     *
     * Processes POST request with cookie_choice parameter and sets it as a cookie.
     * Valid choices are: 'all', 'necessary', 'refuse'.
     * Cookie expires in 30 days.
     *
     * @return void
     */
    public static function handleConsent(): void
    {
        if (isset($_POST['cookie_choice'])) {
            if (!Csrf::verifyToken($_POST['csrf_token'] ?? null)) {
                die("Erreur CSRF : formulaire invalide.");
            }

            $choice = $_POST['cookie_choice'];

            if (in_array($choice, ['all', 'necessary', 'refuse'])) {
                setcookie('cookie_choice', $choice, time() + 60 * 60 * 24 * 30, '/');
                $_COOKIE['cookie_choice'] = $choice;
            }
        }
    }

    /**
     * Check if user has made a cookie choice
     *
     * @return bool True if cookie_choice is set, false otherwise
     */
    public static function hasChoice(): bool
    {
        return isset($_COOKIE['cookie_choice']);
    }

    /**
     * Get the user's cookie choice
     *
     * @return string|null The cookie choice value or null if not set
     */
    public static function getChoice(): ?string
    {
        return $_COOKIE['cookie_choice'] ?? null;
    }
}

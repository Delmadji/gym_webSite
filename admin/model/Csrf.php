<?php

namespace Model;

/**
 * Csrf
 *
 * CSRF (Cross-Site Request Forgery) protection token management.
 * Generates and verifies secure tokens stored in the session.
 *
 * @package Model
 * @version 1.0
 */
class Csrf
{
    /**
     * Generate a CSRF token
     *
     * Creates a new CSRF token if one doesn't exist in the session,
     * or returns the existing token. Token is a 64-character hex string
     * generated from 32 random bytes.
     *
     * @return string The CSRF token
     */
    public static function generateToken(): string
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        return $_SESSION['csrf_token'];
    }

    /**
     * Verify a CSRF token
     *
     * Checks if the provided token matches the one stored in the session.
     * Uses constant-time comparison to prevent timing attacks.
     *
     * @param string|null $token The token to verify
     * @return bool True if token is valid, false otherwise
     */
    public static function verifyToken(?string $token): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token ?? '');
    }
}
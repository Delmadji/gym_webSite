<?php
/**
 * Admin Login Controller
 *
 * Handles admin authentication.
 * On POST request, verifies email and password against the database.
 * Only admin role users can log in to the admin panel.
 * Sets session variables for authenticated admins and redirects to dashboard.
 *
 * @package Admin\Control
 * @version 1.0
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../interface/UtilisateurInterface.php';
require_once __DIR__ . '/../class/Utilisateur.php';
require_once __DIR__ . '/../model/Database.php';
require_once __DIR__ . '/../model/UtilisateurModel.php';
require_once __DIR__ . '/../model/Csrf.php';
require_once __DIR__ . '/../model/exceptions/NotFoundException.php';

use Model\Csrf;
use Model\UtilisateurModel;
use Model\Exceptions\NotFoundException;

$erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Csrf::verifyToken($_POST['csrf_token'] ?? null)) {
        die("Erreur CSRF : formulaire invalide.");
    }

    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $model = new UtilisateurModel();

    try {
        $user = $model->getByEmail($email);

        if (password_verify($password, $user->getPasswordHash()) && $user->getRole() === 'admin') {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['role'] = $user->getRole();

           header('Location: /admin/dashboard');
            exit;
        } else {
            $erreur = "Email ou mot de passe incorrect.";
        }

    } catch (NotFoundException $e) {
        $erreur = "Email ou mot de passe incorrect.";
    }
}

require __DIR__ . '/../view/login.php';


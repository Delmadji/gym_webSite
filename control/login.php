<?php
/**
 * Login Controller
 *
 * Handles user authentication for both regular users and admin.
 * On POST request, verifies email and password against the database.
 * Redirects to admin dashboard for admin users or to profile page for regular users.
 *
 * @package Control
 * @version 1.0
 */

require_once __DIR__ . '/../admin/interface/UtilisateurInterface.php';
require_once __DIR__ . '/../admin/class/Utilisateur.php';
require_once __DIR__ . '/../admin/model/Database.php';
require_once __DIR__ . '/../admin/model/UtilisateurModel.php';
require_once __DIR__ . '/../admin/model/Csrf.php';

use Model\Csrf;
use Model\UtilisateurModel;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Csrf::verifyToken($_POST['csrf_token'] ?? null)) {
        die("Erreur CSRF : formulaire invalide.");
    }

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $model = new UtilisateurModel();
    $utilisateur = $model->getByEmail($email);

    if ($utilisateur && password_verify($password, $utilisateur->getPasswordHash())) {
        session_regenerate_id(true);
        $_SESSION['user_id'] = $utilisateur->getId();
        $_SESSION['role'] = $utilisateur->getRole();

        if ($utilisateur->getRole() === 'admin') {
            header('Location: /~uapv2600350/admin/dashboard');
            exit;
        }

        header('Location: /~uapv2600350/profil');
        exit;

    } else {
        $erreur = "Email ou mot de passe incorrect.";
    }
}

require __DIR__ . '/../view/login.php';

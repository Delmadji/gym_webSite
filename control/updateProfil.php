<?php
/**
 * Update Profile Controller
 *
 * Handles updating of user profile information.
 * On POST request, updates user data (name, email, phone) in the database.
 * Preserves password and role without modification.
 * Dies with an error if user is not found.
 * Redirects to profile page after successful update.
 *
 * @package Control
 * @version 1.0
 */

require_once __DIR__ . '/../admin/interface/UtilisateurInterface.php';
require_once __DIR__ . '/../admin/class/Utilisateur.php';
require_once __DIR__ . '/../admin/model/Database.php';
require_once __DIR__ . '/../admin/model/UtilisateurModel.php';
require_once __DIR__ . '/../admin/model/Csrf.php';

use ClassApp\Utilisateur;
use Model\Csrf;
use Model\UtilisateurModel;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Csrf::verifyToken($_POST['csrf_token'] ?? null)) {
        die("Erreur CSRF : formulaire invalide.");
    }

    $id = (int) $_SESSION['user_id'];
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $email = $_POST['email'] ?? '';
    $telephone = $_POST['telephone'] ?? '';

    $model = new UtilisateurModel();
    $ancien = $model->getById($id);

    if (!$ancien) {
        die("Utilisateur introuvable.");
    }

    $utilisateur = new Utilisateur(
        $id,
        $nom,
        $prenom,
        $email,
        $ancien->getPasswordHash(),    // on garde le mot de passe actuel
        $telephone,
        $ancien->getRole(),            // on garde le rÃ´le
        $ancien->getAbonnementNom()    // on garde le nom de lâ€™abonnement
    );

    $model->update($utilisateur);

    header('Location: /profil');
    exit;
}


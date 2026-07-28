<?php
/**
 * User Profile Controller
 *
 * Displays the profile page for a logged-in user.
 * Retrieves user information from the database by ID and displays it.
 * Dies with an error message if user is not found.
 *
 * @package Control
 * @version 1.0
 */

require_once __DIR__ . '/../admin/interface/UtilisateurInterface.php';
require_once __DIR__ . '/../admin/class/Utilisateur.php';
require_once __DIR__ . '/../admin/model/Database.php';
require_once __DIR__ . '/../admin/model/UtilisateurModel.php';

use Model\UtilisateurModel;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: /~uapv2600350/login');
    exit;
}

$id = (int) $_SESSION['user_id'];

$model = new UtilisateurModel();
$utilisateur = $model->getById($id);

if (!$utilisateur) {
    die("Utilisateur introuvable.");
}

require __DIR__ . '/../view/profil.php';

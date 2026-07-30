<?php
/**
 * Delete User Controller
 *
 * Handles the deletion of a user.
 * On POST request, deletes the user from the database.
 * On GET request, displays the user deletion confirmation page.
 *
 * @package Admin\Control
 * @version 1.0
 */

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /admin/login');
    exit;
}

require_once __DIR__ . '/../interface/UtilisateurInterface.php';
require_once __DIR__ . '/../class/Utilisateur.php';
require_once __DIR__ . '/../model/Database.php';
require_once __DIR__ . '/../model/UtilisateurModel.php';
require_once __DIR__ . '/../model/Csrf.php';

use Model\Csrf;
use Model\UtilisateurModel;

$model = new UtilisateurModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Csrf::verifyToken($_POST['csrf_token'] ?? null)) {
        die("Erreur CSRF : formulaire invalide.");
    }

    $id = (int) $_POST['id'];
    $model->delete($id);

    header('Location: /admin/utilisateurs');
    exit;
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$utilisateur = $model->getById($id);

require __DIR__ . '/../view/deleteUtilisateur.php';


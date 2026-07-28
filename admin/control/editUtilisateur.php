<?php
/**
 * Edit User Controller
 *
 * Handles the editing of an existing user.
 * On POST request, validates CSRF token and updates the user in the database.
 * Password is only updated if a new password is provided.
 * On GET request, retrieves and displays the user edit form.
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

require_once __DIR__ . "/../model/Csrf.php";
use Model\Csrf;


use ClassApp\Utilisateur;
use Model\UtilisateurModel;

$model = new UtilisateurModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if (!Csrf::verifyToken($_POST['csrf_token'] ?? null)) {
    die("Erreur CSRF : formulaire invalide.");
}

$id = (int) $_POST['id'];
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $email = $_POST['email'] ?? '';
    $telephone = $_POST['telephone'] ?? '';
    $role = $_POST['role'] ?? '';

    $abonnementNom = null;
    if ($role !== 'admin' && !empty($_POST['abonnement_nom'])) {
        $abonnementNom = $_POST['abonnement_nom'];
    }

    $ancien = $model->getById($id);
    $hash = $ancien ? $ancien->getPasswordHash() : '';

    if (!empty($_POST['password'])) {
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }

    $u = new Utilisateur(
        $id,
        $nom,
        $prenom,
        $email,
        $hash,
        $telephone,
        $role,
        $abonnementNom
    );

    $model->update($u);

    header('Location: /admin/utilisateurs');
    exit;
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$utilisateur = $model->getById($id);

require __DIR__ . '/../view/editUtilisateur.php';

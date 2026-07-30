<?php
/**
 * Add User Controller
 *
 * Handles the creation of new users (admin users).
 * On POST request, validates CSRF token, hashes password, and inserts a new user into the database.
 * On GET request, displays the user creation form.
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

use ClassApp\Utilisateur;
use Model\UtilisateurModel;

require_once __DIR__ . "/../model/Csrf.php";
use Model\Csrf;



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if (!Csrf::verifyToken($_POST['csrf_token'] ?? null)) {
    die("Erreur CSRF : formulaire invalide.");
}

    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $telephone = $_POST['telephone'] ?? '';
    $role = $_POST['role'] ?? '';

    $abonnementNom = null;

    if ($role !== 'admin' && !empty($_POST['abonnement_nom'])) {
        $abonnementNom = $_POST['abonnement_nom'];
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $u = new Utilisateur(
        null,
        $nom,
        $prenom,
        $email,
        $hash,
        $telephone,
        $role,
        $abonnementNom
    );

    $model = new UtilisateurModel();
    $model->insert($u);

    header('Location: /admin/utilisateurs');
    exit;
}

require __DIR__ . '/../view/addUtilisateur.php';

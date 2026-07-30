<?php
/**
 * Add Subscription Controller
 *
 * Handles the creation of new subscriptions.
 * On POST request, validates CSRF token and inserts a new subscription into the database.
 * On GET request, displays the subscription creation form.
 *
 * @package Admin\Control
 * @version 1.0
 */

require_once __DIR__ . '/../model/Csrf.php';

use Model\Csrf;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /admin/login');
    exit;
}

require_once __DIR__ . '/../interface/AbonnementInterface.php';
require_once __DIR__. '/../class/Abonnement.php';
require_once __DIR__ . '/../model/Database.php';
require_once __DIR__ . '/../model/AbonnementModel.php';

use ClassApp\Abonnement;
use Model\AbonnementModel;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!Csrf::verifyToken($_POST['csrf_token'] ?? null)) {
        die("Erreur CSRF : formulaire invalide.");
    }

    $nom = $_POST['nom'] ?? '';
    $prix = $_POST['prix'] ?? '';
    $duree = $_POST['duree'] ?? '';
    $services = $_POST['services'] ?? '';

    $abonnement = new Abonnement(null, $nom, $prix, $duree, $services);

    $model = new AbonnementModel();
    $model->insert($abonnement);

    header('Location: /admin/abonnements');
    exit;
}

require __DIR__ . '/../view/addAbonnement.php';

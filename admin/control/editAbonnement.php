<?php
/**
 * Edit Subscription Controller
 *
 * Handles the editing of an existing subscription.
 * On POST request, validates CSRF token and updates the subscription in the database.
 * On GET request, retrieves and displays the subscription edit form.
 *
 * @package Admin\Control
 * @version 1.0
 */

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /~uapv2600350/admin/login');
    exit;
}

require_once __DIR__ . '/../interface/AbonnementInterface.php';
require_once __DIR__ . '/../class/Abonnement.php';
require_once __DIR__ . '/../model/Database.php';
require_once __DIR__ . '/../model/AbonnementModel.php';
require_once __DIR__ . "/../model/Csrf.php";
use Model\Csrf;

use ClassApp\Abonnement;
use Model\AbonnementModel;

$model = new AbonnementModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if (!Csrf::verifyToken($_POST['csrf_token'] ?? null)) {
    die("Erreur CSRF : formulaire invalide.");
}

$id = (int) $_POST['id'];
    $nom = $_POST['nom'] ?? '';
    $prix = $_POST['prix'] ?? '';
    $duree = $_POST['duree'] ?? '';
    $services = $_POST['services'] ?? '';

    $abonnement = new Abonnement($id, $nom, $prix, $duree, $services);
    $model->update($abonnement);

    header('Location: /~uapv2600350/admin/abonnements');
    exit;
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$abonnement = $model->getById($id);

require __DIR__ . '/../view/editAbonnement.php';
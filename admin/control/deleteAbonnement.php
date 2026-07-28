<?php
/**
 * Delete Subscription Controller
 *
 * Handles the deletion of a subscription.
 * On POST request, deletes the subscription from the database.
 * On GET request, displays the subscription deletion confirmation page.
 *
 * @package Admin\Control
 * @version 1.0
 */

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /admin/login');
    exit;
}

require_once __DIR__ . '/../interface/AbonnementInterface.php';



require_once __DIR__ . '/../class/Abonnement.php';
require_once __DIR__ . '/../model/Database.php';
require_once __DIR__ . '/../model/AbonnementModel.php';
require_once __DIR__ . '/../model/Csrf.php';

use Model\AbonnementModel;
use Model\Csrf;

$model = new AbonnementModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Csrf::verifyToken($_POST['csrf_token'] ?? null)) {
        die("Erreur CSRF : formulaire invalide.");
    }

    $id = (int) $_POST['id'];
    $model->delete($id);

    header('Location: /admin/abonnements');
    exit;
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$abonnement = $model->getById($id);

require __DIR__ . '/../view/deleteAbonnement.php';


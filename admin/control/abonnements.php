<?php
/**
 * Subscriptions Controller
 *
 * Displays a list of all subscriptions (abonnements) in the admin panel.
 * Requires admin role authentication.
 * Retrieves all subscriptions from the database and renders the subscriptions view.
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

use Model\AbonnementModel;

$model = new AbonnementModel();
$abonnements = $model->getAll();

require __DIR__ . "/../view/abonnements.php";

<?php
/**
 * Users Controller
 *
 * Displays a list of all users in the admin panel.
 * Requires admin role authentication.
 * Retrieves all users from the database and renders the users view.
 *
 * @package Admin\Control
 * @version 1.0
 */

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /~uapv2600350/admin/login');
    exit;
}

require_once __DIR__ . '/../interface/UtilisateurInterface.php';
require_once __DIR__ . '/../class/Utilisateur.php';
require_once __DIR__ . '/../model/Database.php';
require_once __DIR__ . '/../model/UtilisateurModel.php';

use Model\UtilisateurModel;

$model = new UtilisateurModel();
$utilisateurs = $model->getAll();

require __DIR__ . '/../view/utilisateurs.php';
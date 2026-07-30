<?php
/**
 * Activites Controller
 *
 * Displays a list of all activities (activites) in the admin panel.
 * Requires admin role authentication.
 * Retrieves all activities from the database and renders the activities view.
 *
 * @package Admin\Control
 * @version 1.0
 */

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /admin/login');
    exit;
}
require_once __DIR__ . '/../interface/ActiviteInterface.php';
require_once __DIR__ . '/../class/Activite.php';
require_once __DIR__ . '/../model/Database.php';
require_once __DIR__ . '/../model/ActiviteModel.php';

use Model\ActiviteModel;

$model = new ActiviteModel();
$activites = $model->getAll();

require __DIR__ . '/../view/activites.php';

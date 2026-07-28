<?php
/**
 * Coaches Controller
 *
 * Displays a list of all coaches in the admin panel.
 * Requires admin role authentication.
 * Retrieves all coaches from the database and renders the coaches view.
 *
 * @package Admin\Control
 * @version 1.0
 */

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /admin/login');
    exit;
}

require_once __DIR__ . '/../interface/CoachInterface.php';
require_once __DIR__ . '/../class/Coach.php';
require_once __DIR__ . '/../model/Database.php';
require_once __DIR__ . '/../model/CoachModel.php';

use Model\CoachModel;

$coachModel = new CoachModel();
$coachs = $coachModel->getAll();

require __DIR__ . '/../view/coachs.php';

<?php
/**
 * Delete Coach Controller
 *
 * Handles the deletion of a coach.
 * On POST request, deletes the coach from the database.
 * On GET request, displays the coach deletion confirmation page.
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
require_once __DIR__ . '/../model/Csrf.php';

use Model\Csrf;
use Model\CoachModel;

$coachModel = new CoachModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Csrf::verifyToken($_POST['csrf_token'] ?? null)) {
        die("Erreur CSRF : formulaire invalide.");
    }

    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
    $coachModel->delete($id);

    header('Location: /admin/coachs');
    exit;
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$coach = $coachModel->getById($id);

require __DIR__ . '/../view/deleteCoach.php';


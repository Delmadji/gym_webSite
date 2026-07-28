<?php
/**
 * Edit Coach Controller
 *
 * Handles the editing of an existing coach.
 * On POST request, validates CSRF token and updates the coach in the database.
 * On GET request, retrieves and displays the coach edit form.
 *
 * @package Admin\Control
 * @version 1.0
 */

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /admin/login');
    exit;
}
require_once __DIR__ . "/../model/Csrf.php";
use Model\Csrf;
require_once __DIR__ . '/../interface/CoachInterface.php';
require_once __DIR__ . '/../class/Coach.php';
require_once __DIR__ . '/../model/Database.php';
require_once __DIR__ . '/../model/CoachModel.php';

use ClassApp\Coach;
use Model\CoachModel;

$coachModel = new CoachModel();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!Csrf::verifyToken($_POST['csrf_token'] ?? null)) {
        die("Erreur CSRF : formulaire invalide.");
    }

}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
    $nom = $_POST['nom'] ?? '';
    $specialite = $_POST['specialite'] ?? '';
    $description = $_POST['description'] ?? '';
    $image = $_POST['image'] ?? '';

    $coach = new Coach($id, $nom, $specialite, $description, $image);
    $coachModel->update($coach);

    header('Location: /admin/coachs');
    exit;
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$coach = $coachModel->getById($id);

require __DIR__ . '/../view/editCoach.php';

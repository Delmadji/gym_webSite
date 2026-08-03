<?php
/**
 * Add Coach Controller
 *
 * Handles the creation of new coaches.
 * On POST request, validates CSRF token and inserts a new coach into the database.
 * On GET request, displays the coach creation form.
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

use ClassApp\Coach;
use Model\CoachModel;
use Model\Csrf;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Csrf::verifyToken($_POST['csrf_token'] ?? null)) {
        die("Erreur CSRF : formulaire invalide.");
    }
    $nom = $_POST['nom'] ?? '';
    $specialite = $_POST['specialite'] ?? '';
    $description = $_POST['description'] ?? '';
    $image = $_POST['image'] ?? '';

    $coach = new Coach(
        null,
        $nom,
        $specialite,
        $description,
        $image
    );

    $coachModel = new CoachModel();
    $coachModel->insert($coach);

    header('Location: /admin/coachs');
    exit;
}

require __DIR__ . '/../view/addCoach.php';

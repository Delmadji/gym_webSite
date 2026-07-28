<?php
/**
 * Add Activity Controller
 *
 * Handles the creation of new activities.
 * On POST request, validates CSRF token and inserts a new activity into the database.
 * On GET request, displays the activity creation form.
 *
 * @package Admin\Control
 * @version 1.0
 */

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /~uapv2600350/admin/login');
    exit;
}

require_once __DIR__ . '/../interface/ActiviteInterface.php';
require_once __DIR__ . '/../class/Activite.php';
require_once __DIR__ . '/../model/Database.php';
require_once __DIR__ . '/../model/ActiviteModel.php';
require_once __DIR__ . "/../model/Csrf.php";
use Model\Csrf; 


use ClassApp\Activite;
use Model\ActiviteModel;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Csrf::verifyToken($_POST['csrf_token'] ?? null)) {
    die("Erreur CSRF : formulaire invalide.");
}

    $nom = $_POST['nom'] ?? '';
    $description = $_POST['description'] ?? '';
    $jour = $_POST['jour'] ?? '';
    $heure = $_POST['heure'] ?? '';
    $coach_id = isset($_POST['coach_id']) ? (int) $_POST['coach_id'] : 0;

    $activite = new Activite(
        null,
        $nom,
        $description,
        $jour,
        $heure,
        $coach_id
    );

    $model = new ActiviteModel();
    $model->insert($activite);

    header('Location: /~uapv2600350/admin/activites');
    exit;
}

require __DIR__ . '/../view/addActivite.php';
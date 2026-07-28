<?php
/**
 * Edit Activity Controller
 *
 * Handles the editing of an existing activity.
 * On POST request, validates CSRF token and updates the activity in the database.
 * On GET request, retrieves and displays the activity edit form.
 *
 * @package Admin\Control
 * @version 1.0
 */

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /~uapv2600350/admin/login');
    exit;
}
require_once __DIR__ . "/../model/Csrf.php";
use Model\Csrf;


require_once __DIR__ . '/../interface/ActiviteInterface.php';
require_once __DIR__ . '/../class/Activite.php';
require_once __DIR__ . '/../model/Database.php';
require_once __DIR__ . '/../model/ActiviteModel.php';

use ClassApp\Activite;
use Model\ActiviteModel;

$model = new ActiviteModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if (!Csrf::verifyToken($_POST['csrf_token'] ?? null)) {
   die("Erreur CSRF : formulaire invalide.");
}

    $id = (int) $_POST['id'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $jour = $_POST['jour'];
    $heure = $_POST['heure'];
    $coach_id = (int) $_POST['coach_id'];

    $activite = new Activite($id, $nom, $description, $jour, $heure, $coach_id);

    $model->update($activite);

    header('Location: /~uapv2600350/admin/activites');
    exit;
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$activite = $model->getById($id);

require __DIR__ . '/../view/editActivite.php';
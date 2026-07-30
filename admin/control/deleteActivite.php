<?php
/**
 * Delete Activity Controller
 *
 * Handles the deletion of an activity.
 * On POST request, deletes the activity from the database.
 * On GET request, displays the activity deletion confirmation page.
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
require_once __DIR__ . '/../model/Csrf.php';

use Model\ActiviteModel;
use Model\Csrf;

$model = new ActiviteModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Csrf::verifyToken($_POST['csrf_token'] ?? null)) {
        die("Erreur CSRF : formulaire invalide.");
    }

    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
    $model->delete($id);

    header('Location: /admin/activites');
    exit;
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

echo "ID reÃ§u = " . $id; // test temporaire
$activite = $model->getById($id);

require __DIR__ . '/../view/deleteActivite.php';


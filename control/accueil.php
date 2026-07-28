<?php
/**
 * Home Controller
 *
 * Displays the home page with a list of all coaches.
 * Retrieves all coaches from the database and passes them to the home view.
 * This is the public-facing home page for users.
 *
 * @package Control
 * @version 1.0
 */

require_once __DIR__ . '/../admin/interface/CoachInterface.php';
require_once __DIR__ . '/../admin/class/Coach.php';
require_once __DIR__ . '/../admin/model/Database.php';
require_once __DIR__ . '/../admin/model/CoachModel.php';

use Model\CoachModel;

$model = new CoachModel();
$coachs = $model->getAll();

require __DIR__ . '/../view/accueil.php';
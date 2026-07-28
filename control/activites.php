<?php
/**
 * Activities Controller
 *
 * Displays a list of all available activities for users.
 * Retrieves all activities from the database and renders the activities view.
 * This is the public-facing activities page.
 *
 * @package Control
 * @version 1.0
 */

require_once __DIR__ . '/../admin/interface/ActiviteInterface.php';
require_once __DIR__ . '/../admin/class/Activite.php';
require_once __DIR__ . '/../admin/model/Database.php';
require_once __DIR__ . '/../admin/model/ActiviteModel.php';

use Model\ActiviteModel;

$model = new ActiviteModel();
$activites = $model->getAll();

require __DIR__ . '/../view/activites.php';
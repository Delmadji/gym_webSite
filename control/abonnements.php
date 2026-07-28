<?php
/**
 * Subscriptions Controller
 *
 * Displays a list of all available subscriptions for users.
 * Retrieves all subscriptions from the database and renders the subscriptions view.
 * This is the public-facing subscriptions page.
 *
 * @package Control
 * @version 1.0
 */

require_once __DIR__ . '/../admin/interface/AbonnementInterface.php';
require_once __DIR__ . '/../admin/class/Abonnement.php';
require_once __DIR__. '/../admin/model/Database.php';
require_once __DIR__ . '/../admin/model/AbonnementModel.php';

use Model\AbonnementModel;

$model = new AbonnementModel();
$abonnements = $model->getAll();

require __DIR__ . '/../view/abonnements.php';
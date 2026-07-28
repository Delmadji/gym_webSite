<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /~uapv2600350/admin/login');
    exit;
}

require_once __DIR__ . '/../model/Database.php';

use Model\Database;

$pdo = Database::getConnection();

$stats = [
    'coachs' => 0,
    'activites' => 0,
    'abonnements' => 0,
    'utilisateurs' => 0
];

$stats['coachs'] = (int) $pdo->query("SELECT COUNT(*) FROM coach")->fetchColumn();
$stats['activites'] = (int) $pdo->query("SELECT COUNT(*) FROM activites")->fetchColumn();
$stats['abonnements'] = (int) $pdo->query("SELECT COUNT(*) FROM abonnements")->fetchColumn();
$stats['utilisateurs'] = (int) $pdo->query("SELECT COUNT(*) FROM utilisateurs")->fetchColumn();

require __DIR__ . '/../view/dashboard.php';
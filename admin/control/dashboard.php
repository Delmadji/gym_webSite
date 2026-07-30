<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /admin/login');
    exit;
}

require_once __DIR__ . '/../model/Database.php';

use Model\Database;
use Model\Exceptions\NotFoundException;

$stats = [
    'coachs' => 0,
    'activites' => 0,
    'abonnements' => 0,
    'utilisateurs' => 0
];

try {
    $pdo = Database::getConnection();
    $stats['coachs'] = (int) $pdo->query("SELECT COUNT(*) FROM coach")->fetchColumn();
    $stats['activites'] = (int) $pdo->query("SELECT COUNT(*) FROM activites")->fetchColumn();
    $stats['abonnements'] = (int) $pdo->query("SELECT COUNT(*) FROM abonnements")->fetchColumn();
    $stats['utilisateurs'] = (int) $pdo->query("SELECT COUNT(*) FROM utilisateurs")->fetchColumn();
} catch (NotFoundException $e) {
    $stats = [
        'coachs' => 0,
        'activites' => 0,
        'abonnements' => 0,
        'utilisateurs' => 0
    ];
} catch (Throwable $e) {
    $stats = [
        'coachs' => 0,
        'activites' => 0,
        'abonnements' => 0,
        'utilisateurs' => 0
    ];
}

require __DIR__ . '/../view/dashboard.php';

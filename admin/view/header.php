<?php
require_once __DIR__ . "/../../model/CookieManager.php";
require_once __DIR__ . "/../interface/UtilisateurInterface.php";
require_once __DIR__ . "/../class/Utilisateur.php";
require_once __DIR__ . "/../model/Database.php";
require_once __DIR__ . "/../model/UtilisateurModel.php";

use Model\CookieManager;
use Model\UtilisateurModel;

CookieManager::handleConsent();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$adminUtilisateur = null;

if (isset($_SESSION['user_id'], $_SESSION['role']) && $_SESSION['role'] === 'admin') {
    $utilisateurModel = new UtilisateurModel();
    $adminUtilisateur = $utilisateurModel->getById((int) $_SESSION['user_id']);

    if (!$adminUtilisateur || $adminUtilisateur->getRole() !== 'admin') {
        unset($_SESSION['user_id'], $_SESSION['role']);
        $adminUtilisateur = null;
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Admin - PowerGym</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../../view/style.css">
</head>
<body class="bg-black text-white">
<nav class="fixed top-0 left-0 right-0 z-50 bg-black/80 backdrop-blur border-b border-white/10">
  <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
    <a href="/admin/dashboard" class="font-extrabold uppercase tracking-wider">
  Admin PowerGym
</a>
    <div class="flex gap-4 text-sm uppercase items-center">
<a href="/admin/dashboard" class="text-white/70 hover:text-lime-400">Dashboard</a>
<a href="/admin/coachs" class="text-white/70 hover:text-lime-400">Coachs</a>
<a href="/admin/activites" class="text-white/70 hover:text-lime-400">Activités</a>
<a href="/admin/abonnements" class="text-white/70 hover:text-lime-400">Abonnements</a>
<a href="/admin/utilisateurs" class="text-white/70 hover:text-lime-400">Utilisateurs</a>
<a href="/accueil" class="px-3 py-2 rounded-full bg-lime-500 text-black font-bold">Site</a>
<?php if ($adminUtilisateur): ?>
<span class="px-3 py-2 rounded-full border border-lime-500 text-lime-400 font-bold">
  <?= htmlspecialchars($adminUtilisateur->getNom()) ?>
</span>
<a href="/admin/deconnexion" class="px-3 py-2 rounded-full border border-white/20 text-white/80 hover:border-red-400 hover:text-red-400 font-bold">Déconnexion</a>
<?php endif; ?>
    </div>
  </div>
</nav>


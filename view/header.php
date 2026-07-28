<?php
require_once __DIR__ . "/../model/CookieManager.php";
require_once __DIR__ . "/../admin/interface/UtilisateurInterface.php";
require_once __DIR__ . "/../admin/class/Utilisateur.php";
require_once __DIR__ . "/../admin/model/Database.php";
require_once __DIR__ . "/../admin/model/UtilisateurModel.php";

use Model\CookieManager;
use Model\UtilisateurModel;

CookieManager::handleConsent();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($utilisateur) && isset($_SESSION['user_id'])) {
    $utilisateurModel = new UtilisateurModel();
    $utilisateur = $utilisateurModel->getById((int) $_SESSION['user_id']);

    if (!$utilisateur) {
        unset($_SESSION['user_id'], $_SESSION['role']);
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdn.tailwindcss.com"></script>
<title>PowerGym</title>
</head>

<body class="bg-black text-white">

<nav class="fixed top-0 left-0 right-0 z-50 bg-black/90 backdrop-blur border-b border-white/10">

  <div class="max-w-7xl mx-auto px-6">

    <div class="flex flex-col md:flex-row items-center justify-between py-4 gap-4">

      <!-- Logo -->
      <a href="/accueil"
         class="flex items-center gap-2 font-extrabold text-xl tracking-wider">

        <span class="bg-lime-500 text-black px-2 py-1 rounded">
          PG
        </span>

        <span>PowerGym</span>

      </a>

      <!-- Menu -->
      <div class="flex flex-col md:flex-row items-center gap-4 md:gap-8 text-sm uppercase tracking-wider">

        <a href="/accueil"
           class="text-white/80 hover:text-lime-500 transition">
           Accueil
        </a>

        <a href="/activites"
           class="text-white/80 hover:text-lime-500 transition">
           ActivitÃ©s
        </a>

        <a href="/abonnements"
           class="text-white/80 hover:text-lime-500 transition">
           Abonnements
        </a>

        <a href="/faq"
           class="text-white/80 hover:text-lime-500 transition">
           FAQ
        </a>

        <a href="/contact"
           class="text-white/80 hover:text-lime-500 transition">
           Contact
        </a>

        <?php if (isset($utilisateur)): ?>

          <a href="/profil"
             class="px-4 py-2 border border-lime-500 text-lime-400 rounded-full hover:bg-lime-500 hover:text-black transition font-bold">
            <?= htmlspecialchars($utilisateur->getNom()) ?>
          </a>

          <a href="/deconnexion"
             class="px-4 py-2 border border-white/20 text-white/80 rounded-full hover:border-red-400 hover:text-red-400 transition font-bold">
            DÃ©connexion
          </a>

        <?php else: ?>

          <a href="/login"
             class="px-5 py-2 bg-lime-500 text-black rounded-full font-bold hover:bg-lime-400 transition">
             Se connecter
          </a>

        <?php endif; ?>

      </div>

    </div>

  </div>

</nav>

<div class="h-20"></div>


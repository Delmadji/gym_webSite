<?php require __DIR__ . "/header.php"; ?>

<?php
require_once __DIR__ . "/../model/Csrf.php";
use Model\Csrf;
?>

<main class="pt-24">
  <div class="max-w-3xl mx-auto px-6">
    <h1 class="text-3xl font-extrabold uppercase mb-6">Supprimer un utilisateur</h1>

    <div class="bg-gray-900 border border-white/10 rounded-xl p-6">
      
      <p class="text-white/80 mb-6">
        Voulez-vous vraiment supprimer 
        <span class="font-bold text-red-400">
          <?= htmlspecialchars($utilisateur->getNom()) ?>
        </span> ?
      </p>


      <form action="/admin/deleteUtilisateur" method="post" class="flex gap-4">

        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(Csrf::generateToken()) ?>">
        <input type="hidden" name="id" value="<?= htmlspecialchars($utilisateur->getId()) ?>">

        
        <button type="submit"
          class="px-6 py-3 bg-red-600 text-white font-bold uppercase rounded-full hover:bg-red-500 transition">
          Supprimer
        </button>

        
        <a href="/admin/utilisateurs"
           class="px-6 py-3 bg-gray-700 text-white font-bold uppercase rounded-full hover:bg-gray-600 transition">
          Annuler
        </a>

      </form>

    </div>
  </div>
</main>

<?php require __DIR__ . "/footer.php"; ?>

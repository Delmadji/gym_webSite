<?php require __DIR__ . "/header.php"; ?>

<?php
require_once __DIR__ . "/../model/Csrf.php";
use Model\Csrf;
?>

<main class="pt-24">
  <div class="max-w-3xl mx-auto px-6">
    <h1 class="text-3xl font-extrabold uppercase mb-6">Supprimer un coach</h1>

    <div class="bg-gray-900 border border-white/10 rounded-xl p-6">
      <p class="text-white/80 mb-6">
        Voulez-vous vraiment supprimer le coach
        <span class="font-bold text-red-400"><?= htmlspecialchars($coach->getNom()) ?></span> ?
      </p>

      <form action="/~uapv2600350/admin/deleteCoach" method="post" class="flex gap-4">

        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(Csrf::generateToken()) ?>">

        <input type="hidden" name="id" value="<?= htmlspecialchars($coach->getId()) ?>">

        <button type="submit"
                class="px-6 py-3 bg-red-500 text-black font-bold uppercase rounded-full hover:bg-red-400 transition">
          Supprimer
        </button>

        <a href="/~uapv2600350/admin/coachs"
           class="px-6 py-3 border border-white/20 rounded-full uppercase hover:border-lime-400 transition">
          Annuler
        </a>
      </form>
    </div>
  </div>
</main>

<?php require __DIR__ . "/footer.php"; ?>
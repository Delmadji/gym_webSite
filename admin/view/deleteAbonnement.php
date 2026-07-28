<?php require __DIR__ . "/header.php"; ?>
<?php
require_once __DIR__ . "/../model/Csrf.php";
use Model\Csrf;
?>

<main class="pt-24">
  <div class="max-w-3xl mx-auto px-6">
    <h1 class="text-3xl font-extrabold uppercase mb-6">Supprimer un abonnement</h1>

    <div class="bg-gray-900 border border-white/10 rounded-xl p-6">
      <?php if ($abonnement): ?>
        <p class="text-white/80 mb-6">
          Voulez-vous vraiment supprimer lâ€™abonnement
          <span class="font-bold text-red-400">
            <?= htmlspecialchars($abonnement->getNom()) ?>
          </span> ?
        </p>

        <form action="/admin/deleteAbonnement" method="post" class="flex gap-4">
          <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(Csrf::generateToken()) ?>">
          <input type="hidden" name="id" value="<?= htmlspecialchars($abonnement->getId()) ?>">

          <button type="submit"
                  class="px-6 py-3 bg-red-500 text-black font-bold uppercase rounded-full hover:bg-red-400 transition">
            Supprimer
          </button>

          <a href="/admin/abonnements"
             class="px-6 py-3 border border-white/20 rounded-full uppercase hover:border-lime-400 transition">
            Annuler
          </a>
        </form>
      <?php else: ?>
        <p class="text-red-400">Abonnement introuvable.</p>

        <a href="/admin/abonnements"
           class="inline-block mt-4 px-6 py-3 border border-white/20 rounded-full uppercase hover:border-lime-400 transition">
          Retour
        </a>
      <?php endif; ?>
    </div>
  </div>
</main>

<?php require __DIR__ . "/footer.php"; ?>


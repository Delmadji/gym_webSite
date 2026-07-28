<?php 
require __DIR__ . "/header.php";

require_once __DIR__ . "/../model/Csrf.php";
use Model\Csrf;
?>

<main class="pt-24">
  <div class="max-w-4xl mx-auto px-6">
    <h1 class="text-3xl font-extrabold uppercase mb-6">Modifier un abonnement</h1>

    <?php if ($abonnement): ?>
      <form action="/~uapv2600350/admin/editAbonnement" method="post"
            class="bg-gray-900 border border-white/10 rounded-xl p-6 space-y-4">

        <!-- 🔥 CSRF TOKEN (MANQUANT AVANT) -->
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(Csrf::generateToken()) ?>">

        <input type="hidden" name="id" value="<?= htmlspecialchars($abonnement->getId()) ?>">

        <div>
          <label class="block text-sm text-white/70 mb-1">Nom</label>
          <input type="text" name="nom"
                 value="<?= htmlspecialchars($abonnement->getNom()) ?>"
                 class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10" required>
        </div>

        <div>
          <label class="block text-sm text-white/70 mb-1">Prix</label>
          <input type="number" step="0.01" name="prix"
                 value="<?= htmlspecialchars($abonnement->getPrix()) ?>"
                 class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10" required>
        </div>

        <div>
          <label class="block text-sm text-white/70 mb-1">Durée</label>
          <input type="text" name="duree"
                 value="<?= htmlspecialchars($abonnement->getDuree()) ?>"
                 class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10" required>
        </div>

        <div>
          <label class="block text-sm text-white/70 mb-1">Services</label>
          <textarea name="services"
                    class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10"
                    required><?= htmlspecialchars($abonnement->getServices()) ?></textarea>
        </div>

        <button type="submit"
                class="px-6 py-3 bg-lime-500 text-black font-bold uppercase rounded-full hover:bg-lime-300 transition">
          Modifier
        </button>

      </form>
    <?php else: ?>
      <p class="text-red-400">Abonnement introuvable.</p>
    <?php endif; ?>
  </div>
</main>

<?php require __DIR__ . "/footer.php"; ?>
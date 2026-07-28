<?php require __DIR__ . "/header.php"; ?>

<main class="pt-24">
  <div class="max-w-6xl mx-auto px-6">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
      <div>
        <h1 class="text-3xl font-extrabold uppercase">Gestion des abonnements</h1>
        <p class="text-white/70 text-sm mt-1"></p>
      </div>

      <a href="/admin/addAbonnement"
         class="inline-block px-5 py-3 rounded-full bg-lime-500 text-black font-bold uppercase hover:bg-lime-300 transition">
        + Ajouter un abonnement
      </a>
    </div>

    <div class="bg-gray-900 border border-white/10 rounded-xl overflow-hidden">
      <div class="overflow-x-auto">
        <table class="w-full text-sm">
          <thead class="bg-black/40 text-white/70">
            <tr>
              <th class="text-left p-4">ID</th>
              <th class="text-left p-4">Nom</th>
              <th class="text-left p-4">Prix</th>
              <th class="text-left p-4">DurÃ©e</th>
              <th class="text-left p-4">Services</th>
              <th class="text-left p-4">Actions</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($abonnements as $a): ?>
              <tr class="border-t border-white/10">
                <td class="p-4"><?= htmlspecialchars($a->getId()) ?></td>

                <td class="p-4 font-bold">
                  <?= htmlspecialchars($a->getNom()) ?>
                </td>

                <td class="p-4 text-lime-400 font-extrabold">
                  <?= htmlspecialchars($a->getPrix()) ?> â‚¬ / mois
                </td>

                <td class="p-4 text-white/70">
                  <?= htmlspecialchars($a->getDuree()) ?>
                </td>

                <td class="p-4 text-white/70">
                  <?= htmlspecialchars($a->getServices()) ?>
                </td>

                <td class="p-4">
                  <div class="flex gap-2 flex-wrap">
                    <a href="/admin/editAbonnement?id=<?= urlencode($a->getId()) ?>"
                       class="px-3 py-2 rounded-lg border border-white/20 hover:border-lime-400 transition uppercase text-xs">
                      Modifier
                    </a>

                    <a href="/admin/deleteAbonnement?id=<?= urlencode($a->getId()) ?>"
                       class="px-3 py-2 rounded-lg border border-red-400/40 hover:border-red-400 transition uppercase text-xs">
                      Supprimer
                    </a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>

        </table>
      </div>
    </div>

  </div>
</main>

<?php require __DIR__ . "/footer.php"; ?>

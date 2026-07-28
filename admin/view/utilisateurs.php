<?php require __DIR__ . "/header.php"; ?>

<main class="pt-24">
  <div class="max-w-6xl mx-auto px-6">

    <div class="flex justify-between items-center mb-8">
      <h1 class="text-3xl font-extrabold uppercase">Gestion des utilisateurs</h1>

      <a href="/~uapv2600350/admin/addUtilisateur"
         class="px-5 py-3 rounded-full bg-lime-500 text-black font-bold uppercase hover:bg-lime-300 transition">
        + Ajouter
      </a>
    </div>

    <div class="bg-gray-900 border border-white/10 rounded-xl overflow-hidden">
      <div class="overflow-x-auto">
        <table class="w-full text-sm">
          <thead class="bg-black/40 text-white/70">
            <tr>
              <th class="text-left p-4">ID</th>
              <th class="text-left p-4">Nom</th>
              <th class="text-left p-4">Prénom</th>
              <th class="text-left p-4">Email</th>
              <th class="text-left p-4">Téléphone</th>
              <th class="text-left p-4">Rôle</th>
              <th class="text-left p-4">Nom abonnement</th>
              <th class="text-left p-4">Actions</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($utilisateurs as $u): ?>
              <tr class="border-t border-white/10">
                <td class="p-4"><?= htmlspecialchars($u->getId()) ?></td>
                <td class="p-4 font-bold"><?= htmlspecialchars($u->getNom()) ?></td>
                <td class="p-4"><?= htmlspecialchars($u->getPrenom()) ?></td>
                <td class="p-4 text-white/70"><?= htmlspecialchars($u->getEmail()) ?></td>
                <td class="p-4"><?= htmlspecialchars($u->getTelephone()) ?></td>
                <td class="p-4"><?= htmlspecialchars($u->getRole()) ?></td>
                <td class="p-4"><?= htmlspecialchars((string) $u->getAbonnementNom()) ?></td>
                <td class="p-4">
                  <div class="flex gap-2 flex-wrap">
                    <a href="/~uapv2600350/admin/editUtilisateur?id=<?= urlencode($u->getId()) ?>"
                       class="px-3 py-2 rounded-lg border border-white/20 hover:border-lime-400 transition uppercase text-xs">
                      Modifier
                    </a>

                    <a href="/~uapv2600350/admin/deleteUtilisateur?id=<?= urlencode($u->getId()) ?>"
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
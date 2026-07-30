<?php require __DIR__ . "/header.php"; ?>

<main class="pt-24">
  <div class="max-w-6xl mx-auto px-6">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
      <div>
        <h1 class="text-3xl font-extrabold uppercase">Gestion des coachs</h1>
      </div>

      <a href="/admin/addCoach"
         class="inline-block px-5 py-3 rounded-full bg-lime-500 text-black font-bold uppercase hover:bg-lime-300 transition">
        + Ajouter un coach
      </a>
    </div>

    <div class="bg-gray-900 border border-white/10 rounded-xl overflow-hidden">
      <div class="overflow-x-auto">
        <table class="w-full text-sm">
          <thead class="bg-black/40 text-white/70">
            <tr>
              <th class="text-left p-4">ID</th>
              
              <th class="text-left p-4">Nom</th>
              <th class="text-left p-4">SpÃ©cialitÃ©</th>
              <th class="text-left p-4">Description</th>
              <th class="text-left p-4">Actions</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($coachs as $c): ?>
              <tr class="border-t border-white/10">
                <td class="p-4"><?= htmlspecialchars($c->getId()) ?></td>

               

                <td class="p-4 font-bold">
                  <?= htmlspecialchars($c->getNom()) ?>
                </td>

                <td class="p-4">
                  <span class="inline-block px-3 py-1 text-xs font-bold uppercase bg-lime-400 text-black rounded-full">
                    <?= htmlspecialchars($c->getSpecialite()) ?>
                  </span>
                </td>

                <td class="p-4 text-white/70">
                  <?= htmlspecialchars($c->getDescription()) ?>
                </td>

                <td class="p-4">
                  <div class="flex gap-2 flex-wrap">

                    <a href="/admin/editCoach?id=<?= urlencode($c->getId()) ?>"
                       class="px-3 py-2 rounded-lg border border-white/20 hover:border-lime-400 transition uppercase text-xs">
                      Modifier
                    </a>

                    <a href="/admin/deleteCoach?id=<?= urlencode($c->getId()) ?>"
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

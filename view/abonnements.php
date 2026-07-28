<?php require __DIR__ . "/header.php"; ?>

<main class="pt-24 mb-16">
  <div class="max-w-6xl mx-auto px-6">

    <h1 class="text-3xl font-extrabold uppercase mb-8">
      Abonnements
    </h1>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

      <?php foreach ($abonnements as $a): ?>
        <div class="bg-gray-900 border border-white/10 rounded-xl p-6">

          <h2 class="text-xl font-bold mb-2">
            <?= htmlspecialchars($a->getNom()) ?>
          </h2>

          <p class="text-lime-400 font-bold mb-4">
            <?= htmlspecialchars($a->getPrix()) ?> € / mois
          </p>

          <p class="text-sm">
            <span class="text-white/50">Durée :</span>
            <?= htmlspecialchars($a->getDuree()) ?>
          </p>

          <p class="text-sm mt-2">
            <span class="text-white/50">Services :</span>
            <?= htmlspecialchars($a->getServices()) ?>
          </p>

        </div>
      <?php endforeach; ?>

    </div>

  </div>
</main>

<?php require __DIR__ . "/footer.php"; ?>
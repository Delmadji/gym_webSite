<?php require __DIR__ . "/header.php"; ?>

<main class="pt-24 mb-16">
  <div class="max-w-6xl mx-auto px-6">

    <h1 class="text-3xl font-extrabold uppercase mb-8">
      Activités
    </h1>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

      <?php foreach ($activites as $a): ?>
        <div class="bg-gray-900 border border-white/10 rounded-xl p-6">

          <h2 class="text-xl font-bold mb-2">
            <?= htmlspecialchars($a->getNom()) ?>
          </h2>

          <p class="text-white/70 mb-4">
            <?= htmlspecialchars($a->getDescription()) ?>
          </p>

          <p class="text-sm">
            <span class="text-white/50">Jour :</span>
            <?= htmlspecialchars($a->getJour()) ?>
          </p>

          <p class="text-sm">
            <span class="text-white/50">Heure :</span>
            <?= htmlspecialchars($a->getHeure()) ?>
          </p>

          <p class="text-sm">
            <span class="text-white/50">Coach ID :</span>
            <?= htmlspecialchars((string)$a->getCoachId()) ?>
          </p>

        </div>
      <?php endforeach; ?>

    </div>

  </div>
</main>

<?php require __DIR__ . "/footer.php"; ?>
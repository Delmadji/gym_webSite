<?php require __DIR__ . "/header.php"; ?>

<main class="pt-24 bg-black text-white min-h-screen">
  <div class="max-w-6xl mx-auto px-6">
    <h1 class="text-3xl md:text-4xl font-extrabold uppercase mb-4">FAQ</h1>
    <p class="text-white/70 mb-10">Réponses aux questions les plus fréquentes.</p>

    <div class="space-y-4">
      <?php foreach ($faqs as $f): ?>
        <details class="bg-gray-900 border border-white/10 rounded-xl p-5">
          <summary class="cursor-pointer font-bold">
            <?= htmlspecialchars($f["q"]) ?>
          </summary>
          <p class="mt-3 text-white/70">
            <?= htmlspecialchars($f["a"]) ?>
          </p>
        </details>
      <?php endforeach; ?>
    </div>
  </div>
</main>

<?php require __DIR__ . "/footer.php"; ?>
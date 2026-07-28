<?php require __DIR__ . "/header.php"; ?>

<main class="pt-24">
  <div class="max-w-6xl mx-auto px-6">
    <h1 class="text-3xl font-extrabold uppercase mb-8">Tableau de bord</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
      <div class="bg-gray-900 border border-white/10 rounded-xl p-6">
        <div class="text-white/70 text-sm">Coachs</div>
        <div class="text-3xl font-extrabold text-lime-400"><?= $stats["coachs"] ?></div>
      </div>
      <div class="bg-gray-900 border border-white/10 rounded-xl p-6">
        <div class="text-white/70 text-sm">Activités</div>
        <div class="text-3xl font-extrabold text-lime-400"><?= $stats["activites"] ?></div>
      </div>
      <div class="bg-gray-900 border border-white/10 rounded-xl p-6">
        <div class="text-white/70 text-sm">Abonnements</div>
        <div class="text-3xl font-extrabold text-lime-400"><?= $stats["abonnements"] ?></div>
      </div>
      <div class="bg-gray-900 border border-white/10 rounded-xl p-6">
        <div class="text-white/70 text-sm">Utilisateurs</div>
        <div class="text-3xl font-extrabold text-lime-400"><?= $stats["utilisateurs"] ?></div>
      </div>
    </div>
  </div>
</main>

<?php require __DIR__ . "/footer.php"; ?>
<?php require __DIR__ . "/header.php"; ?>

<?php
require_once __DIR__ . "/../model/Csrf.php";
use Model\Csrf;
?>

<main class="pt-24">
  <div class="max-w-4xl mx-auto px-6">

    <h1 class="text-3xl font-extrabold uppercase mb-6">
      Modifier une activitÃ©
    </h1>

    <form action="/admin/editActivite" method="post"
          class="bg-gray-900 border border-white/10 rounded-xl p-6 space-y-4">

      <!-- CSRF -->
      <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(Csrf::generateToken()) ?>">

      <!-- ID -->
      <input type="hidden" name="id" value="<?= htmlspecialchars($activite->getId()) ?>">

      <!-- NOM -->
      <div>
        <label class="block text-sm text-white/70 mb-1">Nom</label>
        <input type="text" name="nom"
               value="<?= htmlspecialchars($activite->getNom()) ?>"
               class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10 text-white"
               required>
      </div>

      <!-- DESCRIPTION -->
      <div>
        <label class="block text-sm text-white/70 mb-1">Description</label>
        <input type="text" name="description"
               value="<?= htmlspecialchars($activite->getDescription()) ?>"
               class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10 text-white"
               required>
      </div>

      <!-- JOUR -->
      <div>
        <label class="block text-sm text-white/70 mb-1">Jour</label>
        <input type="text" name="jour"
               value="<?= htmlspecialchars($activite->getJour()) ?>"
               class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10 text-white"
               required>
      </div>

      <!-- HEURE -->
      <div>
        <label class="block text-sm text-white/70 mb-1">Heure</label>
        <input type="text" name="heure"
               value="<?= htmlspecialchars($activite->getHeure()) ?>"
               class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10 text-white"
               required>
      </div>

      <!-- COACH -->
      <div>
        <label class="block text-sm text-white/70 mb-1">Coach ID</label>
        <input type="number" name="coach_id"
               value="<?= htmlspecialchars((string)$activite->getCoachId()) ?>"
               class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10 text-white"
               required>
      </div>

      <!-- BOUTON -->
      <button type="submit"
              class="w-full px-5 py-3 bg-lime-500 text-black font-bold uppercase rounded-full hover:bg-lime-300 transition">
        Modifier
      </button>

    </form>

  </div>
</main>

<?php require __DIR__ . "/footer.php"; ?>

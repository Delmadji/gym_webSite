<?php require __DIR__ . "/header.php"; ?>
<?php require_once __DIR__ . "/../model/Csrf.php";
use Model\Csrf; ?>

<main class="pt-24">
  <div class="max-w-4xl mx-auto px-6">
    <h1 class="text-3xl font-extrabold uppercase mb-6">Ajouter un coach</h1>

    <form action="/admin/addCoach" method="post"
          class="bg-gray-900 border border-white/10 rounded-xl p-6 space-y-4">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(Csrf::generateToken()) ?>">
      <div>
        <label class="block text-sm text-white/70 mb-1">Nom</label>
        <input type="text" name="nom"
               class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10" required>
      </div>

      <div>
        <label class="block text-sm text-white/70 mb-1">SpÃ©cialitÃ©</label>
        <input type="text" name="specialite"
               class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10" required>
      </div>

      <div>
        <label class="block text-sm text-white/70 mb-1">Description</label>
        <textarea name="description"
                  class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10" required></textarea>
      </div>

      <div>
        <label class="block text-sm text-white/70 mb-1">Image</label>
        <input type="text" name="image"
               placeholder="ex: coach1.jpg"
               class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10">
      </div>

      <button type="submit"
              class="px-6 py-3 bg-lime-500 text-black font-bold uppercase rounded-full hover:bg-lime-300 transition">
        Enregistrer
      </button>
    </form>
  </div>
</main>

<?php require __DIR__ . "/footer.php"; ?>

<?php require __DIR__ . "/header.php"; ?>

<main class="pt-24">
  <div class="max-w-4xl mx-auto px-6">
    <h1 class="text-3xl font-extrabold uppercase mb-6">Mon profil</h1>

    <form action="/updateProfil" method="post"
          class="bg-gray-900 border border-white/10 rounded-xl p-6 space-y-4">

      <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(\Model\Csrf::generateToken()) ?>">
      <input type="hidden" name="id" value="<?= htmlspecialchars($utilisateur->getId()) ?>">

      <div>
        <label class="block text-sm text-white/70 mb-1">Nom</label>
        <input type="text" name="nom"
               value="<?= htmlspecialchars($utilisateur->getNom()) ?>"
               class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10" required>
      </div>

      <div>
        <label class="block text-sm text-white/70 mb-1">Prénom</label>
        <input type="text" name="prenom"
               value="<?= htmlspecialchars($utilisateur->getPrenom()) ?>"
               class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10" required>
      </div>

      <div>
        <label class="block text-sm text-white/70 mb-1">Email</label>
        <input type="email" name="email"
               value="<?= htmlspecialchars($utilisateur->getEmail()) ?>"
               class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10" required>
      </div>

      <div>
        <label class="block text-sm text-white/70 mb-1">Téléphone</label>
        <input type="text" name="telephone"
               value="<?= htmlspecialchars($utilisateur->getTelephone()) ?>"
               class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10" required>
      </div>

      <button type="submit"
              class="px-6 py-3 bg-lime-500 text-black font-bold uppercase rounded-full hover:bg-lime-300 transition">
        Mettre à jour
      </button>
    </form>
  </div>
</main>

<?php require __DIR__ . "/footer.php"; ?>


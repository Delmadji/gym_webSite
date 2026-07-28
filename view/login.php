<?php require __DIR__ . "/header.php"; ?>

<main class="pt-24">
  <div class="max-w-md mx-auto px-6">
    <h1 class="text-3xl font-extrabold uppercase mb-6">Connexion</h1>

    <form action="/~uapv2600350/login" method="post"
          class="bg-gray-900 border border-white/10 rounded-xl p-6 space-y-4">

      <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(\Model\Csrf::generateToken()) ?>">

      <input type="email" name="email" placeholder="Email"
             class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10" required>

      <input type="password" name="password" placeholder="Mot de passe"
             class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10" required>

      <?php if (!empty($erreur)): ?>
        <p class="text-red-400"><?= htmlspecialchars($erreur) ?></p>
      <?php endif; ?>

      <button type="submit"
              class="w-full px-6 py-3 bg-lime-500 text-black font-bold uppercase rounded-full hover:bg-lime-300 transition">
        Se connecter
      </button>
    </form>
  </div>
</main>

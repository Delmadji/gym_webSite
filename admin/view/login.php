<?php require __DIR__ . "/header.php"; ?>

<main class="pt-24 min-h-screen flex items-center justify-center">
  <div class="w-full max-w-md px-6">

    <div class="bg-gray-900 border border-white/10 rounded-xl p-8">
      <h1 class="text-3xl font-extrabold uppercase mb-6 text-center">
        Connexion
      </h1>

      <form method="post" action="/admin/login" class="space-y-4">

        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(\Model\Csrf::generateToken()) ?>">

        <input type="email" name="email" placeholder="Email"
               class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10"
               required>

        <input type="password" name="password" placeholder="Mot de passe"
               class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10"
               required>

        <?php if (!empty($erreur)): ?>
          <p class="text-red-400 font-bold text-center">
            <?= htmlspecialchars($erreur) ?>
          </p>
        <?php endif; ?>

        <button type="submit"
                class="w-full px-5 py-3 bg-lime-500 text-black font-bold uppercase rounded-full hover:bg-lime-300 transition">
          Se connecter
        </button>

      </form>

    </div>

  </div>
</main>

<?php require __DIR__ . "/footer.php"; ?>


<footer class="border-t border-white/10 mt-10">
  <div class="max-w-6xl mx-auto px-6 py-6 text-sm text-white/60 text-center">
    © <?= date("Y") ?> PowerGym — Admin
  </div>
</footer>
</body>
</html>
<?php if (!\Model\CookieManager::hasChoice()): ?>
  <div class="fixed bottom-0 left-0 w-full bg-gray-900 border-t border-white/10 text-white p-4 z-50">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
      <p class="text-sm text-white/80">
        Nous utilisons des cookies pour améliorer votre expérience. Vous pouvez choisir vos préférences.
      </p>

      <form method="post" class="flex gap-2 flex-wrap">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(\Model\Csrf::generateToken()) ?>">

        <button type="submit" name="cookie_choice" value="all"
                class="px-4 py-2 bg-lime-500 text-black font-bold rounded-full">
          Accepter
        </button>

        <button type="submit" name="cookie_choice" value="necessary"
                class="px-4 py-2 border border-white/20 rounded-full">
          Nécessaires
        </button>

        <button type="submit" name="cookie_choice" value="refuse"
                class="px-4 py-2 border border-red-400/40 rounded-full">
          Refuser
        </button>
      </form>
    </div>
  </div>
<?php endif; ?>

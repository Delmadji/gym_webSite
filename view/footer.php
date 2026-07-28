<footer class="bg-black border-t border-white/10 mt-16">
  <div class="max-w-6xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-3 gap-8">

    <div>
      <h3 class="text-xl font-extrabold uppercase mb-3 text-lime-500">PowerGym</h3>
      <p class="text-white/70 text-sm">
        Salle de sport dédiée à la musculation, au fitness et au bien-être.
        Entraînez-vous avec des professionnels.
      </p>
    </div>

    <div>
      <h4 class="font-bold uppercase mb-3">Navigation</h4>
      <ul class="space-y-2 text-sm text-white/70">
        <li><a href="/~uapv2600350/accueil" class="hover:text-lime-400">Accueil</a></li>
        <li><a href="/~uapv2600350/activites" class="hover:text-lime-400">Activités</a></li>
        <li><a href="/~uapv2600350/abonnements" class="hover:text-lime-400">Abonnements</a></li>
        <li><a href="/~uapv2600350/login" class="hover:text-lime-400">Se connecter</a></li>
        <li><a href="/~uapv2600350/mentions" class="hover:text-lime-400">Mentions légales</a></li>
        <li><a href="/~uapv2600350/cgv" class="hover:text-lime-400">CGV</a></li>
        <li><a href="/~uapv2600350/sitemap" class="hover:text-lime-400">Plan du site</a></li>
      </ul>
    </div>

    <div>
      <h4 class="font-bold uppercase mb-3">Contact</h4>
      <ul class="space-y-2 text-sm text-white/70">
        <li>Avignon, France</li>
        <li>+33 6 12 34 56 78</li>
        <li>contact@powergym.fr</li>
      </ul>
    </div>

  </div>

  <div class="border-t border-white/10 py-4 text-center text-sm text-white/60">
    © <?= date("Y") ?> PowerGym — Tous droits réservés
  </div>
</footer>

<?php if (!\Model\CookieManager::hasChoice()): ?>
  <div class="fixed bottom-0 left-0 w-full bg-gray-900 border-t border-white/10 text-white p-4 z-50">
    <div class="max-w-6xl mx-auto flex flex-col gap-4">

      <p class="text-sm text-white/80">
        Nous utilisons des cookies pour améliorer votre expérience.
      </p>

      <p class="text-xs text-white/50">
        Cookies nécessaires : indispensables au fonctionnement du site, par exemple la session de connexion et la sécurité CSRF.
      </p>

      <p class="text-xs text-white/50">
        Cookies optionnels : préférences utilisateur ou statistiques.
      </p>

      <form method="post" class="flex gap-2 flex-wrap">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(\Model\Csrf::generateToken()) ?>">

        <button type="submit" name="cookie_choice" value="all"
                class="px-4 py-2 bg-lime-500 text-black font-bold rounded-full">
          Accepter tous
        </button>

        <button type="submit" name="cookie_choice" value="necessary"
                class="px-4 py-2 border border-white/20 rounded-full">
          Nécessaires seulement
        </button>

        <button type="submit" name="cookie_choice" value="refuse"
                class="px-4 py-2 border border-red-400/40 rounded-full">
          Refuser
        </button>
      </form>

    </div>
  </div>
<?php endif; ?>

</body>
</html>

<?php require __DIR__ . "/header.php"; ?>

<?php
require_once __DIR__ . "/../model/Csrf.php";
use Model\Csrf;
?>

<main class="pt-24">
  <div class="max-w-4xl mx-auto px-6">
    <h1 class="text-3xl font-extrabold uppercase mb-6">Ajouter un utilisateur</h1>

    <form action="/admin/addUtilisateur" method="post"
          class="bg-gray-900 border border-white/10 rounded-xl p-6 space-y-4">

      <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(Csrf::generateToken()) ?>">

      <input type="text" name="nom" placeholder="Nom"
             class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10 text-white" required>

      <input type="text" name="prenom" placeholder="PrÃƒÂ©nom"
             class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10 text-white" required>

      <input type="email" name="email" placeholder="Email"
             class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10 text-white" required>

      <input type="password" name="password" placeholder="Mot de passe"
             class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10 text-white" required>

      <input type="text" name="telephone" placeholder="TÃƒÂ©lÃƒÂ©phone"
             class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10 text-white" required>

      <div>
        <label class="block text-sm text-white/70 mb-1">RÃƒÂ´le</label>
        <select name="role"
                class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10 text-white" required>
          <option value="">Choisir un rÃƒÂ´le</option>
          <option value="admin">Admin</option>
          <option value="utilisateur">Utilisateur</option>
        </select>
      </div>

      <div>
        <label class="block text-sm text-white/70 mb-1">Nom de lÃ¢â‚¬â„¢abonnement</label>
        <input type="text" name="abonnement_nom"
               class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10 text-white">
      </div>

      <button type="submit"
              class="px-6 py-3 bg-lime-500 text-black font-bold uppercase rounded-full hover:bg-lime-300 transition">
        Enregistrer
      </button>

    </form>
  </div>
</main>

<?php require __DIR__ . "/footer.php"; ?>


<?php
require __DIR__ . "/header.php";
require_once __DIR__ . "/../model/Csrf.php";
use Model\Csrf;

$utilisateur = $utilisateur ?? null;
?>

<main class="pt-24">
  <div class="max-w-4xl mx-auto px-6">
    <h1 class="text-3xl font-extrabold uppercase mb-6">Modifier un utilisateur</h1>

    <?php if ($utilisateur): ?>
      <form action="/admin/editUtilisateur" method="post"
            class="bg-gray-900 border border-white/10 rounded-xl p-6 space-y-4">
          <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(Csrf::generateToken()) ?>">
        <input type="hidden" name="id" value="<?= htmlspecialchars($utilisateur->getId()) ?>">

        <input type="text" name="nom" value="<?= htmlspecialchars($utilisateur->getNom()) ?>"
               class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10" required>

        <input type="text" name="prenom" value="<?= htmlspecialchars($utilisateur->getPrenom()) ?>"
               class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10" required>

        <input type="email" name="email" value="<?= htmlspecialchars($utilisateur->getEmail()) ?>"
               class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10" required>

        <input type="password" name="password" placeholder="Nouveau mot de passe (laisser vide si inchangé)"
               class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10">

        <input type="text" name="telephone" value="<?= htmlspecialchars($utilisateur->getTelephone()) ?>"
               class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10" required>

        <div>
          <label class="block text-sm text-white/70 mb-1">Rôle</label>
          <select name="role" id="role"
                  class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10" required>
            <option value="admin" <?= $utilisateur->getRole() === 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="utilisateur" <?= $utilisateur->getRole() === 'utilisateur' ? 'selected' : '' ?>>Utilisateur</option>
          </select>
        </div>

        <div id="abonnementBlock">
          <label class="block text-sm text-white/70 mb-1">Nom de l’abonnement</label>
          <input type="text" name="abonnement_nom" id="abonnement_nom"
                 value="<?= htmlspecialchars((string)$utilisateur->getAbonnementNom()) ?>"
                 class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10">
        </div>

        <button type="submit"
                class="px-6 py-3 bg-lime-500 text-black font-bold uppercase rounded-full hover:bg-lime-300 transition">
          Modifier
        </button>
      </form>
    <?php else: ?>
      <p class="text-red-400">Utilisateur introuvable.</p>
    <?php endif; ?>
  </div>
</main>

<script>
  const role = document.getElementById("role");
  const abonnementBlock = document.getElementById("abonnementBlock");
  const abonnementInput = document.getElementById("abonnement_nom");

  function toggleAbonnement() {
    if (role.value === "admin") {
      abonnementBlock.style.display = "none";
      abonnementInput.value = "";
    } else {
      abonnementBlock.style.display = "block";
    }
  }

  role.addEventListener("change", toggleAbonnement);
  toggleAbonnement();
</script>
<?php require __DIR__ . "/footer.php"; ?>

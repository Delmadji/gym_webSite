<?php require __DIR__ . "/header.php"; ?>

<main class="pt-24 mb-16">
  <div class="max-w-6xl mx-auto px-6">

    <h1 class="text-3xl font-extrabold uppercase mb-8">
      Contact
    </h1>

    <p class="text-white/70 mb-8">
      Une question ? Envoyez-nous un message.
    </p>

    <div class="bg-gray-900 border border-white/10 rounded-xl p-8">

      <h2 class="text-xl font-bold mb-6 uppercase">
        Nos coordonnées
      </h2>

      <div class="space-y-3 text-white/80 mb-8">
        <p>📍 Avignon, France</p>
        <p>📞 +33 6 12 34 56 78</p>
        <p>✉ hafsiyouyou3@gmail.com</p>
        <p>🕒 Lun - Dim : 06h — 23h</p>
      </div>

      <form action="https://mail.google.com/mail/"
            method="get"
            target="_blank"
            class="space-y-4">
        <input type="hidden" name="view" value="cm">
        <input type="hidden" name="to" value="hafsiyouyou3@gmail.com">

        <input type="text" name="su" value="Contact PowerGym"
               class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10"
               required>

        <textarea name="body" placeholder="Votre message" rows="8"
                  class="w-full px-4 py-3 rounded-lg bg-black/40 border border-white/10"
                  required></textarea>

        <button type="submit"
                class="w-full px-6 py-3 bg-lime-500 text-black font-bold uppercase rounded-full hover:bg-lime-300 transition">
          Envoyer
        </button>
      </form>

    </div>

  </div>
</main>

<?php require __DIR__ . "/footer.php"; ?>

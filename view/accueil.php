<?php require __DIR__ . "/header.php"; ?>

<section class="min-h-screen bg-cover bg-center relative"
         style="background-image: url('/images/hero.jpg')">
  <div class="absolute inset-0 bg-black/60"></div>

  <div class="relative z-10 min-h-screen flex flex-col items-center justify-center text-center px-6">
    <h1 class="text-4xl text-white  md:text-6xl font-extrabold uppercase tracking-wider">
      Repoussez vos limites
    </h1>

    <p class="mt-6 max-w-xl text-white/75">
      Musculation, coaching et cours collectifs avec une ÃƒÂ©quipe experte.
    </p>

    <div class="mt-8 flex gap-4 flex-wrap justify-center">
      <a href="/abonnements"
         class="px-6 py-3 rounded-full bg-lime-500 hover:bg-lime-300 text-black font-bold uppercase">
        Commencer
      </a>

      <a href="/activites"
         class="text-white hover:text-black px-6 py-3 rounded-full border border-white/40 uppercase">
        En savoir plus
      </a>
    </div>
  </div>
</section>



<section class="bg-lime-500 py-16">
  <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10 text-center text-white">

   
    <div>
      <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-white/20">
        Ã°Å¸Ââ€¹Ã¯Â¸Â
      </div>
      <div class="text-3xl text-black font-extrabold">50+</div>
      <div class="text-sm text-black opacity-90">Ãƒâ€°quipements modernes</div>
    </div>

    <div>
      <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-white/20">
        Ã°Å¸â€˜Â¥
      </div>
      <div class="text-3xl font-extrabold text-black">2,000+</div>
      <div class="text-sm opacity-90 text-black">Membres Power</div>
    </div>

   
    <div>
      <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-white/20">
        Ã°Å¸Ââ€ 
      </div>
      <div class="text-3xl font-extrabold text-black">10+</div>
      <div class="text-black text-sm opacity-90">AnnÃƒÂ©es dÃ¢â‚¬â„¢expÃƒÂ©rience</div>
    </div>

    
    <div>
      <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-white/20">
        Ã¢Â­Â
      </div>
      <div class="text-black text-3xl font-extrabold">4.9/5</div>
      <div class="text-black text-sm opacity-90">Satisfaction client</div>
    </div>

  </div>
</section>

<section class="bg-black py-20">
  <div class="max-w-6xl mx-auto px-6">

    <h2 class="text-center text-3xl md:text-4xl font-extrabold text-lime-500 uppercase mb-12">
      Pourquoi nous choisir
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

     
      <div class="bg-lime-500 text-black p-6 rounded-xl">
        <div class="text-3xl mb-4">Ã°Å¸Ââ€¹Ã¯Â¸Â</div>
        <h3 class="font-bold uppercase mb-2">Construction musculaire</h3>
        <p class="text-sm mb-4">
          Programmes adaptÃƒÂ©s pour dÃƒÂ©velopper force et masse musculaire.
        </p>
       
      </div>

      
      <div class="bg-lime-500 border  border-white/10 p-6 rounded-xl text-black">
        <div class="text-3xl mb-4">Ã°Å¸â€Â¥</div>
        <h3 class="font-bold  uppercase mb-2">EntraÃƒÂ®nement intensif</h3>
        <p class="text-sm  mb-4">
          SÃƒÂ©ances HIIT et cardio pour brÃƒÂ»ler un maximum de calories.
        </p>
        
      </div>


      <div class="bg-lime-500  border border-white/10 p-6  rounded-xl text-black">
        <div class="text-3xl mb-4">Ã°Å¸â€™Âª</div>
        <h3 class="font-bold uppercase mb-2">Coachs professionnels</h3>
        <p class="text-sm  mb-4">
          Un accompagnement personnalisÃƒÂ© par des experts certifiÃƒÂ©s.
        </p>
        
      </div>

    </div>
  </div>
</section>



<section class="bg-black py-20">
  <div class="max-w-6xl mx-auto px-6">

    <div class="flex items-center justify-between mb-10">
      <h2 class="text-3xl font-extrabold uppercase">Nos coachs</h2>

     
      
    </div>

    
    <div id="coachSlider" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

     <?php $coachs = $coachs ?? []; ?>
     <?php foreach ($coachs as $c): ?>
    <div class="bg-gray-900 border border-white/10 rounded-xl p-6">

      

      <h2 class="text-xl font-bold mb-2">
        <?= htmlspecialchars($c->getNom()) ?>
      </h2>

      <p class="text-lime-400 text-sm font-bold mb-2">
        <?= htmlspecialchars($c->getSpecialite()) ?>
      </p>

      <p class="text-white/70">
        <?= htmlspecialchars($c->getDescription()) ?>
      </p>

    </div>
  <?php endforeach; ?>
    </div>
  </div>
</section>

<?php require __DIR__ . "/footer.php"; ?>



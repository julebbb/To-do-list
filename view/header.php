  <header class="mb-4 row">
    <?php if (isset($return) AND isset($home)): ?>
      <a href="<?php echo $return?>">Retour</a>
    <?php endif; ?>

    <h1 class="m-3">To do list</h1>

    <?php if (isset($return) AND isset($home)): ?>
    <a href="<?php echo $home?>">Accueil</a>
  <?php endif; ?>

  </header>

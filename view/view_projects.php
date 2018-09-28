<?php
function headHTML($title, $descript) {
  ob_start(); ?>
  <!doctype html>
  <html class="no-js" lang="fr">

    <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title><?php echo $title; ?></title>
      <meta name="description" content="<?php echo $descript; ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
      <link rel="manifest" href="site.webmanifest">
      <link rel="apple-touch-icon" href="icon.png">
      <!-- Place favicon.ico in the root directory -->
      <!--32x32 le favicon -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
      <link rel="stylesheet" href="public/css/normalize.css">
      <link rel="stylesheet" href="public/css/main.css">
    </head>

    <body class="container">

    <?php
    $content = ob_get_clean();
    return $content;
}


function viewProjects($data)  {
  ob_start(); ?>

  <section class="row">
    <?php
    while ($result = $data->fetch()) {
      echo displayhtml($result);
    }
    ?>

  </section>

  <?php
  $content = ob_get_clean();
  return $content;

}


function displayhtml($result) {
  ob_start(); ?>

  <div class="col-12 col-lg-3">
      <h2><?php echo $result['name']; ?></h2>
      <p>Date limite : <?php echo $result["deadline"]; ?></p>
      <a href="index.php?delete=<?php echo $result['id']; ?>">&#10060;</a>
  </div>

  <?php
   $content = ob_get_clean();
   return $content;
}

function addButtonProject() {
    ob_start(); ?>
      <a href="index.php?open=true" class="addproject">
        <p>Ajouter un projet</p>
        <i class="fas fa-plus"></i>
      </a>

    <?php
    $content = ob_get_clean();
    return $content;
}

function formProjects() {
  ob_start(); ?>

  <section>
    <div class="">
      <a href="index.php?open=false">Annuler</a>
     <form class="" action="index.php" method="post">
       <input type="text" name="name" value="">
       <textarea name="description" rows="8" cols="80"></textarea>
       <input type="date" name="deadline" value="">
       <input type="submit" name="envoie" value="Envoyer">
     </form>
    </div>

  </section>

  <?php
  $content = ob_get_clean();
  return $content;
}

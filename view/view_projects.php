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

    <body >
      <main class="container">
        <h1 class="text-center" >Tous les projets</h1>

    <?php
    $content = ob_get_clean();
    return $content;
}


function viewProjects($data)  {
  ob_start(); ?>

  <section class="container">
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

  <div class="row project">
    <a href="controller/control_list.php?index=<?php echo $result['id']; ?>" class="col-12 col-lg-3">
      <h2><?php echo $result['name']; ?></h2>
      <p>Date limite : <?php echo $result["deadline"]; ?></p>
    </a>
    <a href="index.php?delete=<?php echo $result['id']; ?>" title="Supprimer ce projet" class="delete">&#10060;</a>

  </div>

  <?php
   $content = ob_get_clean();
   return $content;
}

function addButtonProject() {
    ob_start(); ?>
      <a href="index.php?open=true" title="Ajouter un projet" class="addproject">
        <p>Ajouter un projet</p>
        <i class="fas fa-plus"></i>
      </a>

    <?php
    $content = ob_get_clean();
    return $content;
}

function formProjects($send) {
  ob_start(); ?>

  <section class="addform">
    <div class="">
      <h3>Ajouter un projet :</h3>
      <a href="index.php?open=false"><i class="fas fa-times-circle"></i></a>
      <?php if (!empty($send)) {
         echo "<p>" .  $send . "</p>";
      } ?>

     <form class="m-auto" action="index.php?open=true" method="post">
       <label for="name">Nom du projet :</label>
       <input type="text" name="name" class="form-control">

       <label for="description">Description :</label>
       <textarea name="description" class="form-control"></textarea>

       <label for="deadline">Date limite :</label>
       <input type="date" name="deadline" class="form-control">
       <input type="submit" name="envoie" class="btn btn-primary  d-block" value="Ajouter">
     </form>

    </div>

  </section>

  <?php
  $content = ob_get_clean();
  return $content;
}

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
      <link rel="stylesheet" href="../public/css/normalize.css">
      <link rel="stylesheet" href="../public/css/main.css">
    </head>

    <body >
      <main class="container">


    <?php
    $content = ob_get_clean();
    return $content;
}

function viewProjects($data, $verif)  {
  ob_start(); ?>
  <section class="container taskTable">
    <h2 class="text-center" ><?php echo $verif['name'] ?></h2>

    <table class="table table-striped">
      <tr>
        <th></th>
        <th scope="col">Nom de la tâche</th>
        <th scope="col">Date limite</th>
        <th scope="col">Fait ou non</th>
      </tr>
      <?php
        echo displayhtml($data);
      ?>
    </table>


  </section>

  <?php
  $content = ob_get_clean();
  return $content;

}

function displayhtml($data) {
  ob_start();
  foreach ($data as $result) {
  ?>
  <tr>
    <td><a href="control_task.php?index=<?php echo $result['l_id']; ?>&delete=<?php echo $result['t_id']; ?>" title="Supprimer cette tâche" class="delete">&#10060;</a></td>
    <td><?php echo $result['t_name']; ?></td>
    <td><?php echo $result['deadline']; ?></td>
    <td><?php
      if ($result['done'] == 1) {echo
        '<a href="control_task.php?index=' . $result['l_id'] . '&done=0&id_task='.$result['t_id'].'" title="Valider la tâche" >
        <i class="fas fa-check-circle"></i>
        </a>';}
      else {echo
        '<a href="control_task.php?index=' . $result['l_id'] . '&done=1&id_task='.$result['t_id'].'" title="Valider la tâche" >
        <i class="fas fa-clock"></i>
        </a>';}
        ?>
      </td>
  </tr>

  <?php
}
   $content = ob_get_clean();
   return $content;
}

function addButtonProject($id) {
    ob_start(); ?>
      <a href="control_task.php?index=<?php echo $id ?>&open=true" title="Ajouter une tâche" class="addproject">
        <p>Ajouter une tâche </p>
        <i class="fas fa-plus"></i>
      </a>

    <?php
    $content = ob_get_clean();
    return $content;
}

function formProjects($send, $id) {
  ob_start(); ?>

  <section class="addform">
    <div class="">
      <h3>Ajouter une tâche :</h3>
      <a href="control_task.php?index=<?php echo $id ?>&open=false"><i class="fas fa-times-circle"></i></a>
      <?php if (!empty($send)) {
         echo "<p>" .  $send . "</p>";
      } ?>

     <form class="m-auto" action="control_task.php?index=<?php echo $id ?>&open=true" method="post">
       <label for="name">Nom de la tâche :</label>
       <input type="text" name="name" class="form-control">

       <label for="deadline">Date limite :</label>
       <input type="date" name="deadline" class="form-control">

       <input type="hidden" name="done" value="0">
       <input type="submit" name="envoie" class="btn btn-primary  d-block" value="Ajouter">
     </form>

    </div>

  </section>

  <?php
  $content = ob_get_clean();
  return $content;
}

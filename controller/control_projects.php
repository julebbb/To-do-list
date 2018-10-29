<?php
$title = "Accueil | To do List";
$descript = "Acceuil du site";

$send = "";

require('model/model_projects.php');
require('view/view_projects.php');

//begin a session if GET have open=true else he destroy session if false
if (isset($_GET['open']) AND ! empty($_GET['open'])) {
  if ($_GET['open'] == 'true') {
    session_start();
    $_SESSION['open'] = $_GET['open'];
  }

   if ($_GET['open'] == 'false') {

    session_start();
    session_destroy();
    $_SESSION['open'] = "";
  }
}

//post for add project in database
if (isset($_POST['name']) AND isset($_POST['description']) AND isset($_POST['deadline'])) {
  $name = strip_tags($_POST['name']);
  $descript = strip_tags($_POST['description']);
  $deadline = strip_tags($_POST['deadline']);

  if (strlen($name) > 255) {
    $send = "Le nom du projet est trop grand ! Rappel: Limité à 255 caractères";
  } else {
    if (preg_match("#[a-z]?[0-9]?#", $name)) {

      if (preg_match("#^20[1-9][0-9][-. ]?0[1-9]|1[0-2][-. ]?[0-2][0-9]|3[0-1]$#", $deadline) == true) {
        if (preg_match("#[a-z]|[0-9]#", $descript)) {
          addProject($name, $descript, $deadline);
          header("Location: index.php");
        } else {
          $send = "Il faut mettre une description !";
        }
      } else {
        $send = "La date n'est pas bonne !";
      }
    } else {
      $send = "Il faut un nom pour le projet !";
    }

  }

}

if (isset($_GET['delete']) AND ! empty($_GET['delete'])) {
  $get_delete = (int) $_GET['delete'];
  deleteProject($get_delete);
}

//display head with title
echo headHTML($title, $descript);
//display all projects
echo viewProjects($data);

//if session open true display formulaire else display button add form
if (isset($_SESSION['open'])) {

  if ($_SESSION['open'] == 'true') {

    //display form for add project
    echo formProjects($send);

   } else {

     //display button for display form
      echo addButtonProject();

   }

 } else {

   //display button for display form
    echo addButtonProject();

 }

require('view/footer.php');

 ?>

<?php
$send = "";

require('../model/model_task.php');
require('../view/view_task.php');

if (isset($_GET['index']) AND !empty($_GET['index'])) {

  $data = verifList($_GET['index']);
  $verif = $data->fetch();

  if (empty($verif)) {
    header('Location: ../index.php');
  } else {
    $id = $_GET['index'];
    $element = displayTask($id);
  }

} else {
  header('Location: ../index.php');
}

echo "<pre>";
print_r($element);
echo "</pre>";

$title = $verif['name'] . " | To do List";
$descript = "Liste du projet : " . $verif['name'];

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

//post for add list in database
if (isset($_POST['name']) AND isset($_POST['done']) AND $_POST['done'] == 0 AND isset($_POST['deadline'])) {
  $name = strip_tags($_POST['name']);
  $deadline = strip_tags($_POST['deadline']);
  $done = (int) $_POST['done'];

  if (strlen($name) > 255) {
    $send = "Le nom du projet est trop grand ! Rappel: Limité à 255 caractères";
  } else {

    if (preg_match("#[a-z]?[0-9]?#", $name)) {

      if (preg_match("#^20[1-9][0-9][-. ]?0[1-9]|1[0-2][-. ]?[0-2][0-9]|3[0-1]$#", $deadline) == true) {
          addTask($name, $deadline, $done, $id);

          header("Location: control_task.php?index=" . $id);

      } else {
        $send = "La date n'est pas bonne !";
      }
    } else {
      $send = "Il faut un nom pour le projet !";
    }

  }

}

if (isset($_GET['done']) AND isset($_GET['id_task']) AND ! empty($_GET['id_task'])) {

  $done = $_GET['done'];
  $id_task = (int) $_GET['id_task'];
  statusTask($done, $id_task);
  header("Location: control_task.php?index=" . $id);
}

if (isset($_GET['delete']) AND ! empty($_GET['delete'])) {
  $get_delete = (int) $_GET['delete'];
  deleteTask($get_delete, $id);
}

echo headHTML($title, $descript);

echo viewProjects($element, $verif);

//if session open true display formulaire else display button add form
if (isset($_SESSION['open'])) {

  if ($_SESSION['open'] == 'true') {

    //display form for add project
    echo formProjects($send, $id);

   } else {

     //display button for display form
      echo addButtonProject($id);

   }

 } else {

   //display button for display form
    echo addButtonProject($id);

}

<?php
$send = "";

require('../model/model_list.php');
require('../view/view_list.php');

if (isset($_GET['index']) AND !empty($_GET['index'])) {

  $data = verifProject($_GET['index']);
  $verif = $data->fetch();

  if (empty($verif)) {
    header('Location: ../index.php');
  } else {
    $id = $_GET['index'];
    $element = displayList($id);
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
if (isset($_POST['name'])) {
  $name = strip_tags($_POST['name']);

  if (strlen($name) > 255) {
    $send = "Le nom de la liste est trop grand ! Rappel: Limité à 255 caractères";
  } else {
    if (preg_match("#[a-z]?[0-9]?#", $name)) {
      addProject($name);
      header("Location: control_list.php?index=" . $_GET['index']);
    } else {
      $send = "Il faut un nom pour la liste !";
    }

  }

}

if (isset($_GET['delete']) AND ! empty($_GET['delete'])) {
  $get_delete = (int) $_GET['delete'];
  deleteProject($get_delete, $id);
}

echo headHTML($title, $descript);

echo viewProjects($element);

//if session open true display formulaire else display button add form
if (isset($_SESSION['open'])) {

  if ($_SESSION['open'] == 'true') {

    //display form for add project
    echo formProjects($send);

   } else {

     //display button for display form
      echo addButtonProject($id);

   }

 } else {

   //display button for display form
    echo addButtonProject($id);

}


 ?>

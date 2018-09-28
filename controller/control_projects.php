<?php
$title = "Accueil | To do List";
$descript = "Acceuil du site";

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

//display head with title
echo headHTML($title, $descript);
//display all projects
echo viewProjects($data);

if (isset($_SESSION['open'])) {

  if ($_SESSION['open'] == 'true') {

    //display form for add project
    echo formProjects();

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

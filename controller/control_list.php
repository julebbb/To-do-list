<?php


require('../model/model_list.php');
require('../view/view_list.php');

if (isset($_GET['index']) AND !empty($_GET['index'])) {

  $data = verifProject()->fetchAll();

  foreach ($data as $id) {
    if ($id['id'] == $_GET['index']) {
      echo "MIAU";
      $id = $_GET['index'];
      $element = displayList($id);
    }
  }
} else {
  header('Location: ../index.php');
}
echo "<pre>";
print_r($element);
echo "</pre>";

foreach ($element as $name) {
  echo $name['l_name'];
}



// $title = $data[0]['p_name'] + " | To do List";
$descript = "Acceuil du site";

 ?>

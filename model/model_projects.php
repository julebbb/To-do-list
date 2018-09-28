<?php

  require('connect.php');
  //display projects elements
  $data = $db->query('SELECT id, name, description, DATE_FORMAT(deadline, "%d/%m/%Y") AS deadline FROM projects');



  function deleteProject($deleteID) {
    require('connect.php');

    $delete = $db->prepare('DELETE FROM projects WHERE id=:id');
    $delete->execute(array(
      'id' => $deleteID
    ));
  }

 ?>

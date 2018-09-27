<?php

  require('connect.php');
  //display projects elements
  $data = $db->query('SELECT name, description, DATE_FORMAT(deadline, "%d/%m/%Y") AS deadline FROM projects');
  $result = $data->fetch()


  function deleteProject($deleteID)  {
    require('connect.php');
    
    $delete = $db->prepare('DELETE FROM projects WHERE id=:id');
    $delete->execute(array(
      'id' => $deleteID
    ));
  }

 ?>

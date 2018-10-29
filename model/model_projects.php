<?php

  require('connect.php');
  //display projects elements
  $data = indexConnect()->query('SELECT id, name, descript, DATE_FORMAT(deadline, "%d/%m/%Y") AS deadline FROM projects');



  function deleteProject($deleteID) {

    $delete = indexConnect()->prepare('DELETE FROM projects WHERE id=:id');
    $delete->execute(array(
      'id' => $deleteID
    ));
    return header('Location: index.php');
  }

  function addProject($name, $descript, $deadline) {

    $req = indexConnect()->prepare('INSERT INTO projects(name, descript, deadline) VALUES(:name, :descript, :deadline)');
    $req->execute(array(

      'name' => $name,
      'descript' => $descript,
      'deadline' => $deadline
    ));
  }
 ?>

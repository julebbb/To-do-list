<?php

  require('connect.php');
  //display projects elements
  $data = indexConnect()->query('SELECT id, name, description, DATE_FORMAT(deadline, "%d/%m/%Y") AS deadline FROM projects');



  function deleteProject($deleteID) {
    require('connect.php');

    $delete = indexConnect()->prepare('DELETE FROM projects WHERE id=:id');
    $delete->execute(array(
      'id' => $deleteID
    ));
    return header('Location: index.php');
  }

  function addProject($name, $descript, $deadline) {
    require('connect.php');

    $req = indexConnect()->prepare('INSERT INTO projects(name, description, deadline) VALUES(:name, :description, :deadline)');
    $req->execute(array(

      'name' => $name,
      'description' => $descript,
      'deadline' => $deadline
    ));
  }
 ?>

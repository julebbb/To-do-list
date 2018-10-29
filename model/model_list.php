<?php

function verifProject($id) {
  require('connect.php');

  $request = controlConnect()->query('SELECT * FROM projects WHERE id = '.$id.'');

  return $request;
}


function displayList($id) {

  //display projects elements with list depend
  $request = controlConnect()->prepare('SELECT
    projects.id AS p_id,
    projects.name AS p_name,
    projects.descript,
    list.id_project,
    list.id AS l_id,
    list.name AS l_name
    FROM projects
    INNER JOIN list ON projects.id = list.id_project
    WHERE projects.id = :id');

    $request->execute(array(
      'id' => $id
    ));

  $data = $request->fetchAll();

  return $data;
}

function displayTask($id) {
  $request = controlConnect()->prepare('SELECT
    list.id AS l_id,
    list.name AS l_name,
    task.id AS t_id,
    task.id_list,
    task.name AS t_name,
    task.done
    FROM list
    INNER JOIN list ON projects.id = list.id_project
    INNER JOIN task ON list.id = task.id_list
    WHERE list.id = :id');

    $request->execute(array(
      'id' => $id
    ));

  $data = $request->fetchAll();

  return $data;
}

function deleteProject($deleteID, $idProject) {

  $delete = controlConnect()->prepare('DELETE FROM list WHERE id=:id');
  $delete->execute(array(
    'id' => $deleteID
  ));
  return header('Location: control_list.php?index=' . $idProject);
}

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

function deleteProject($deleteID, $idProject) {

  $delete = controlConnect()->prepare('DELETE FROM list WHERE id=:id');
  $delete->execute(array(
    'id' => $deleteID
  ));
  return header('Location: control_list.php?index=' . $idProject);
}

function addProject($name, $id_project) {

  $req = controlConnect()->prepare('INSERT INTO list(name, id_project) VALUES(:name, :id_project)');
  $req->execute(array(
    'name' => $name,
    'id_project' => $id_project
  ));

}

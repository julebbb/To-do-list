<?php

function verifProject() {
  require('connect.php');

  $request = controlConnect()->query('SELECT * FROM projects');
  return $request;
}


function displayList($id) {

  //display projects elements with list depend
  $request = controlConnect()->prepare('SELECT
    projects.id AS p_id,
    projects.name AS p_name,
    list.id_project,
    list.id AS l_id,
    list.name AS l_name
    FROM list
    INNER JOIN projects
    ON projects.id = list.id_project WHERE projects.id = :id');

    $request->execute(array(
      'id' => $id
    ));

  $data = $request->fetchAll();

  return $data;
}



// while ($data = $req->fetch()) {
//   if ($_GET['index'] == $data['id']) {
//     echo "MIAKOU";
//   }
//
// }




 ?>

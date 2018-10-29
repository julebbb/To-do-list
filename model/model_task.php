<?php

function verifList($id) {
  require('connect.php');

  $request = controlConnect()->query('SELECT * FROM list WHERE id = '.$id.'');

  return $request;
}


function displayTask($id) {

  //display projects elements with list depend
  $request = controlConnect()->prepare('SELECT
    list.id AS l_id,
    list.name AS l_name,
    task.id_list,
    task.id AS t_id,
    task.name AS t_name,
    task.deadline,
    task.done
    FROM list
    INNER JOIN task ON list.id = task.id_list
    WHERE list.id = :id');

    $request->execute(array(
      'id' => $id
    ));

  $data = $request->fetchAll();

  return $data;
}

 ?>

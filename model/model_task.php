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

function addTask($name, $deadline, $done, $id_list) {

  $req = controlConnect()->prepare('INSERT INTO task(name, deadline, done, id_list) VALUES(:name, :deadline, :done, :id_list)');
  $req->execute(array(

    'name' => $name,
    'deadline' => $deadline,
    'done' => $done,
    'id_list' => $id_list
  ));
}

function deleteTask($deleteID, $idList) {

  $delete = controlConnect()->prepare('DELETE FROM task WHERE id=:id');
  $delete->execute(array(
    'id' => $deleteID
  ));
  return header('Location: control_task.php?index=' . $idList);
}

function statusTask($done, $id_task) {
  $request = controlConnect()->prepare('UPDATE task SET done = :done WHERE id = :id');
  $request-> execute(array (
    'done' => $done,
    'id' => $id_task
  ));
}
 ?>

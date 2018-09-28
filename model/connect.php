<?php
  include("../mdp/mdp.php");

    try
    {
            $db = new PDO('mysql:host=localhost;dbname=eval_justine_lebbrecht;charset=utf8', 'root', $mdp);
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
 ?>

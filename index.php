<?php
   require_once './connection.php';
   $connection = new Connection();

   $notes = $connection->getNotes();
   echo '<pre>';
    echo var_dump($notes);
   echo '</pre>';
   echo 'connect?';
?>

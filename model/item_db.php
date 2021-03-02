<?php
   function fetch_all($query, $db)
   {
       $statement = $db->prepare($query); 
       $statement->execute();
       $result = $statement->fetchAll(); 
       $statement->closeCursor();
       return $result;
   }
   function fetch_one($query, $db)
   {
       $statement = $db->prepare($query); 
       $statement->execute();
       $result = $statement->fetch(); 
       $statement->closeCursor();
       return $result;
   }
   function delete_item($item_num)
   {
      global $db;
      $query = "DELETE FROM todoitems WHERE ItemNum = $item_num";
      fetch_all($query, $db);
   }
   function add_item($category_id, $title, $description)
   {
      global $db;
      $query = "INSERT INTO todoitems (categoryID, Title, Description) VALUES ($category_id, " . "'" . addslashes($title) . "'," . "'" . addslashes($description) . "')";
      fetch_one($query, $db);
   }
?>
<?php
    include("view/header.php");

    echo "<h2 class = 'butn'>Category List</h2>
          <table>
                <tr>
                    <th colspan = '2'>Name</th>
                </tr>";
                $query = "SELECT * FROM categories ORDER BY categoryID ASC";
                $categories = fetch_all($query, $db);
                $counter = 1;
                foreach ($categories as $category) :
                    echo "<form action = 'index.php' method = 'POST'>
                          <input type = 'number' name = 'del' value = " . $category["categoryID"] . " style = 'visibility: hidden;' />
                          <tr>
                                <td>" . $category["categoryName"] . "</td>
                                <td><input type = 'submit' name = 'delete_category' value = 'Remove' /></td>
                          </tr>
                          </form>";
                          $counter++;
                endforeach;
                $query = "ALTER TABLE categories AUTO_INCREMENT = $counter";
                fetch_one($query, $db);
    echo  "</table>
           <h2 class = 'butn'>Add Category</h2>
           <form class = 'butn' action = 'index.php' method = 'POST'>
                <label>Name:</label>
                <input type = 'text' name = 'category_name' required />
                <input type = 'submit' name = 'add_category' value = 'Add Category' />
           </form>";
    echo "<p class = 'butn'><a href = 'index.php'>View To Do List</a></p>";
    include("view/footer.php");
?>
<?php
    $query = "SELECT * FROM categories ORDER BY categoryID";
    $categories = fetch_all($query, $db);
    require("view/header.php");

    echo "<h2 class = 'butn'>Add Item</h2>
          <form class = 'butn' action = 'index.php' method = 'POST'>
            <label>Category:</label>
            <select name = 'category_id'>";
            foreach ($categories as $category) :
                echo "<option value = " . $category['categoryID'] . ">";
                echo $category["categoryName"];
                echo "</option>";
            endforeach;
    echo    "</select><br><br>
             <label>Title:</label>
             <input type = 'text' name = 'title' required /><br><br>
             <label>Description</label>
             <input type = 'text' name = 'description' required /><br><br>
             <label>&nbsp</label>
             <input type = 'submit' name = 'item_added' value = 'Add Item' />
             </form>
             <p class = 'butn'><a href = 'index.php'>View To Do List</a></p>";
    require("view/footer.php");
?>
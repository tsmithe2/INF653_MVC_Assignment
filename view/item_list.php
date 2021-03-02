<?php
    require("view/header.php");

    echo "<form class = 'butn' id = 'cat_select' action = 'index.php' method = 'POST'>
    <label>Category:</label>
            <select name = 'select_category'>
            <option value = 'all'>View All Categories</option>";
            $query = "SELECT * FROM categories ORDER BY categoryID ASC";
            $categories = fetch_all($query, $db);
            foreach ($categories as $category) :
                echo "<option value = " . $category['categoryID'] . ">";
                echo $category["categoryName"];
                echo "</option>";
            endforeach;
    echo  "</select>
    <input type = 'submit' name = 'change_selection'>
    </form>";
    echo "<table>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th colspan = '2'>Category</th>
    </tr>";

    $query = "SELECT ItemNum, Title, Description, categoryID FROM todoitems ORDER BY ItemNum ASC";
    if (isset($_POST["select_category"]))
    {
        if ($_POST["select_category"] != "all")
        {
            $value = $_POST["select_category"];
            $query = "SELECT ItemNum, Title, Description, categoryID FROM todoitems WHERE categoryID = $value ORDER BY ItemNum ASC";
        }
    }
    $results = fetch_all($query, $db);        
    $counter = 1;
    foreach ($results as $result) :
        $category_id = $result["categoryID"];
        echo "<form action = 'index.php' method = 'POST'>
                    <input type = 'number' name = 'del' value = " . $result["ItemNum"] . " style = 'visibility: hidden;' />
                    <tr>
                        <td>"
                            . htmlspecialchars($result["Title"]) .
                        "</td>
                        <td>" .
                            htmlspecialchars($result["Description"]) . 
                        "</td>
                        <td>";
                        $query1 = "SELECT categoryName FROM Categories WHERE categoryID = $category_id";
                        $result1 = fetch_one($query1, $db);
        echo                htmlspecialchars($result1["categoryName"]) .
                        "</td>
                        <td>
                            <input type = 'submit' name = 'delete_item' value = 'Remove' />
                        </td>
                    </tr>
                </form>";
        $counter++;
    endforeach;

    $query = "ALTER TABLE todoitems AUTO_INCREMENT = $counter";
    fetch_one($query, $db);

    echo "</table>
    <form class = 'butn' action = 'index.php' method = 'POST'>
        <input type = 'submit' name = 'add_item' value = 'Add new item'>
    </form>
    <form class = 'butn' action = 'index.php' method = 'POST'>
        <input type = 'submit' name = 'view_edit_categories' value = 'View/Edit Categories'>
    </form>";

    require("view/footer.php");
?>
<?php
    function add_category($category_name)
    {
        global $db;
        $query = "INSERT INTO categories (categoryName) VALUES ('" . addslashes($category_name) . "')";
        fetch_one($query, $db);
    }
    function delete_category($category_id)
    {
        global $db;
        $query = "DELETE FROM categories WHERE categoryID = $category_id";
        fetch_all($query, $db);
    }
?>
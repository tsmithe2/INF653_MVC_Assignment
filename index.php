<?php
    require('model/database.php'); 
    require('model/item_db.php'); 
    require('model/category_db.php');

    if (isset($_POST["add_item"]))
    {
        include('view/add_item_form.php');
    }
    if (isset($_POST["item_added"]))
    {
        add_item($_POST["category_id"], $_POST["title"], $_POST["description"]);
    }
    if (isset($_POST["delete_item"]))
    {
        delete_item($_POST["del"]);
    }
    if (isset($_POST["view_edit_categories"]))
    {
        include("view/category_list.php");
    }
    if (isset($_POST["delete_category"]))
    {
        delete_category($_POST["del"]);
    }
    if (isset($_POST["add_category"]))
    {
        add_category($_POST["category_name"]);
    }
    if (!isset($_POST["add_item"]) && !isset($_POST["view_edit_categories"]))
    {
        include("view/item_list.php");
    }
?>
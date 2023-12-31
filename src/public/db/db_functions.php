<?php
require_once __DIR__ . '/../db/db_credentials.php';

// This contains fields from the category table, so the correct alias is used when doing ORDER BY
$categoryTableFields = [
    'category_level1_name' => 'c.category_level1_name'
];

// Connects to the DB
function connectToDatabase()
{
    // The global keyword imports variables from the global scope into the local scope of a function
    global $hostname, $database, $username, $password;
    $connection = mysqli_connect($hostname, $username, $password, $database);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $connection;
}

// Gets product list
function getProductList($sortColumn, $sortDirection)
{
    $connection = connectToDatabase();

    $query = "SELECT p.*, c.category_level1_name 
              FROM products p
              LEFT JOIN category_level1 c ON p.category_level1_code = c.category_level1_code";

    // Apply sorting if sort column if available
    if ($sortColumn) {
        $tableAlias = $categoryTableFields[$sortColumn] ?? 'p';
        $query .= " ORDER BY $tableAlias.$sortColumn $sortDirection";
    }

    $result = mysqli_query($connection, $query);

    $productList = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $productList[] = $row;
    }

    mysqli_close($connection);
    return $productList;
}

// Gets the category list
function getCategoryLevel1List()
{
    $connection = connectToDatabase();

    $query = "SELECT * FROM category_level1";
    $result = mysqli_query($connection, $query);

    $categoryList = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $categoryList[] = $row;
    }

    mysqli_close($connection);
    return $categoryList;
}

// Deletes the product by rec_no
function deleteProduct($recNo)
{
    $connection = connectToDatabase();

    $query = "DELETE FROM products WHERE rec_no = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $recNo); // safely binds the values
    $result = mysqli_stmt_execute($stmt);

    mysqli_close($connection);
    return $result;
}

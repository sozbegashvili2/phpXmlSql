<?php
require_once __DIR__ . '/../../db/db_functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recNo'])) {
    $recNo = $_POST['recNo'];

    if (deleteProduct($recNo)) {
        echo "Product deleted successfully";
    } else {
        echo "Error deleting product";
    }
}


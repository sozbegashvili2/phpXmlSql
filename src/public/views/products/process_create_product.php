<?php

require_once __DIR__ . '/../../db/db_functions.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Gather form data
    $currentDate = date('Y-m-d H:i:s'); // Get current date and time
    $largeImage = $_POST['largeImage'];
    $imageType = $_POST['imageType'];
    $supplier = $_POST['supplier'];
    $productTitle = $_POST['productTitle'];
    $productDescription = $_POST['productDescription'];
    $manufacturerPartnumber = $_POST['manufacturerPartnumber'];
    $categoryLevel1Code = explode(',', $_POST['categoryLevel1Code'])[0];
    $categoryLevel1Name = explode(',', $_POST['categoryLevel1Code'])[1];
    $productInventory = $_POST['productInventory'];
    $productPrice = $_POST['productPrice'];
    $listPrice = $_POST['listPrice'];
    $uom = $_POST['uom'];
    $itemNumber = $_POST['itemNumber'];
    $UNSPSC = $_POST['UNSPSC'];
    $deliveryDays = $_POST['deliveryDays'];
    $scaleStart = $_POST['scaleStart'];
    $scaleEnd = $_POST['scaleEnd'];
    $xmlFileName = $_POST['xmlFileName'];
    $buyerID = $_POST['buyerID'];
    $categoryLevel2Code = ''; // we don't have corresponding category, therefore leaving empty
    $categoryLevel2Name = ''; // we don't have corresponding category, therefore leaving empty
    $categoryLevel3Code = ''; // we don't have corresponding category, therefore leaving empty
    $categoryLevel3Name = ''; // we don't have corresponding category, therefore leaving empty
    $categoryLevel4Code = ''; // we don't have corresponding category, therefore leaving empty
    $categoryLevel4Name = ''; // we don't have corresponding category, therefore leaving empty
    $categoryLevel5Code = ''; // we don't have corresponding category, therefore leaving empty
    $categoryLevel5Name = ''; // we don't have corresponding category, therefore leaving empty

    // Upload file if image type is 'uploaded'
    if ($imageType === 'uploaded' && isset($_FILES['uploadedImage'])) {
        $uploadedImage = $_FILES['uploadedImage'];
        $uploadPath = __DIR__ . '/../../uploads/';
        $uploadedFileName = $uploadPath . basename($uploadedImage['name']);

        if (move_uploaded_file($uploadedImage['tmp_name'], $uploadedFileName)) {
            $largeImage = $_SERVER['HTTP_ORIGIN'] . '/uploads/' .$uploadedImage['name']; // Update large image URL
        } else {
            die("Error uploading file.");
        }
    }

    // Insert data into the database
    $connection = connectToDatabase();

    $query = "INSERT INTO products (largeImage, imageType, supplier, product_title, product_description, manufacturer_partnumber, category_level1_code, category_level1_name, category_level2_code, category_level2_name, category_level3_code, category_level3_name, category_level4_code, category_level4_name, category_level5_code, category_level5_name, product_inventory, product_price, list_price, uom, item_number, UNSPSC, delivery_days, scaleStart, scaleEnd, xmlFileName, buyerID, dateAdded, dateUpdated) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ssssssssssssssssiiiisiiiiisss", $largeImage, $imageType, $supplier, $productTitle, $productDescription, $manufacturerPartnumber, $categoryLevel1Code, $categoryLevel1Name, $categoryLevel2Code, $categoryLevel2Name, $categoryLevel3Code, $categoryLevel3Name, $categoryLevel4Code, $categoryLevel4Name, $categoryLevel5Code, $categoryLevel5Name, $productInventory, $productPrice, $listPrice, $uom, $itemNumber, $UNSPSC, $deliveryDays, $scaleStart, $scaleEnd, $xmlFileName, $buyerID, $currentDate, $currentDate);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: /");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}
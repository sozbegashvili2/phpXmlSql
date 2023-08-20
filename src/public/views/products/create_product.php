<?php
require_once __DIR__ . '/../../db/db_functions.php';

$categoryList = getCategoryLevel1List();
?>
<h1 class="mb-4">Create Product</h1>
<form action="views/products/process_create_product.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="categoryLevel1Code">Category Level 1:</label>
        <select class="form-control" id="categoryLevel1Code" name="categoryLevel1Code" required>
            <?php
            foreach ($categoryList as $category) {
                echo '<option value="' . $category['category_level1_code']. ',' .$category['category_level1_name'] . '">' . $category['category_level1_name'] . '</option>';
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="largeImage">Large Image (URL):</label>
        <input type="text" class="form-control" id="largeImage" name="largeImage" required>
    </div>
    <div class="form-group">
        <label for="imageType">Image Type:</label>
        <select class="form-control" id="imageType" name="imageType" required>
            <option value="url">URL</option>
            <option value="uploaded">Uploaded</option>
        </select>
    </div>
    <div class="form-group" id="uploadField" style="display: none;">
        <label for="uploadedImage">Uploaded Image:</label>
        <input type="file" class="form-control-file" id="uploadedImage" name="uploadedImage">
    </div>
    <div class="form-group" id="urlField">
        <label for="imageUrl">Image URL:</label>
        <input type="text" class="form-control" id="imageUrl" name="imageUrl">
    </div>
    <div class="form-group">
        <label for="supplier">Supplier:</label>
        <input type="text" class="form-control" id="supplier" name="supplier">
    </div>
    <div class="form-group">
        <label for="productTitle">Product Title:</label>
        <input type="text" class="form-control" id="productTitle" name="productTitle">
    </div>
    <div class="form-group">
        <label for="productDescription">Product Description:</label>
        <textarea class="form-control" id="productDescription" name="productDescription" rows="4"></textarea>
    </div>
    <div class="form-group">
        <label for="manufacturerPartnumber">Manufacturer Partnumber:</label>
        <input type="text" class="form-control" id="manufacturerPartnumber" name="manufacturerPartnumber">
    </div>
    <div class="form-group">
        <label for="productInventory">Product Inventory:</label>
        <input type="number" class="form-control" id="productInventory" name="productInventory">
    </div>
    <div class="form-group">
        <label for="productPrice">Product Price:</label>
        <input type="number" step="0.01" class="form-control" id="productPrice" name="productPrice">
    </div>
    <div class="form-group">
        <label for="listPrice">List Price:</label>
        <input type="number" step="0.01" class="form-control" id="listPrice" name="listPrice">
    </div>
    <div class="form-group">
        <label for="uom">UOM:</label>
        <input type="text" class="form-control" id="uom" name="uom" required>
    </div>
    <div class="form-group">
        <label for="itemNumber">Item Number:</label>
        <input type="text" class="form-control" id="itemNumber" name="itemNumber" required>
    </div>
    <div class="form-group">
        <label for="UNSPSC">UNSPSC:</label>
        <input type="number" class="form-control" id="UNSPSC" name="UNSPSC" required>
    </div>
    <div class="form-group">
        <label for="deliveryDays">Delivery Days:</label>
        <input type="number" class="form-control" id="deliveryDays" name="deliveryDays" required>
    </div>
    <div class="form-group">
        <label for="scaleStart">Scale Start:</label>
        <input type="number" class="form-control" id="scaleStart" name="scaleStart" required>
    </div>
    <div class="form-group">
        <label for="scaleEnd">Scale End:</label>
        <input type="number" class="form-control" id="scaleEnd" name="scaleEnd" required>
    </div>
    <div class="form-group">
        <label for="xmlFileName">XML File Name:</label>
        <input type="text" class="form-control" id="xmlFileName" name="xmlFileName" required>
    </div>
    <div class="form-group">
        <label for="buyerID">Buyer ID:</label>
        <input type="number" class="form-control" id="buyerID" name="buyerID">
    </div>
    <button type="submit" class="btn btn-primary">Create Product</button>
</form>

<script>
    $(document).ready(function() {
        // Show/hide appropriate fields based on image type selection
        $("#imageType").change(function() {
            if ($(this).val() === "url") {
                $("#urlField").show();
                $("#uploadField").hide();
            } else {
                $("#urlField").hide();
                $("#uploadField").show();
            }
        });
    });
</script>

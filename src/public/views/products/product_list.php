<?php

require_once __DIR__ . '/../../db/db_functions.php';

// Those two variable contains the column on which the sorting should be applied and the direction
$sortColumn = $_GET['sortColumn'] ?? null;
$sortDirection = $_GET['sortDirection'] ?? 'ASC';
// for some fields , we don't need sorting like urls and imageType
$excludedSortFields = ['thumbnail', 'itempic', 'largeImage', 'imageType'];

$productList = getProductList($sortColumn, $sortDirection); // Gets product list
$productFields = array_keys($productList[0]); // This will get all the product fields

?>
<h1 class="mb-4">Product List</h1>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Action</th> <!-- New column header for delete button -->
        <!-- dynamically render all the product fields -->
        <?php foreach ($productFields as $field) : ?>
            <?php
            // Determine the sort direction based on the current sort column
            $nextSortDirection = ($sortColumn === $field && $sortDirection === 'ASC') ? 'DESC' : 'ASC';
            ?>
            <?php if (in_array($field, $excludedSortFields)) : ?>
                <th><?= $field ?></th>
            <?php else : ?>
            <th>
                <a href="?sortColumn=<?= $field ?>&sortDirection=<?= $nextSortDirection ?>">
                    <?= $field ?> <?= $sortColumn === $field ? $sortDirection : '' ?>
                </a>
            </th>
        <?php endif; ?>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($productList as $product) : ?>
        <tr>
            <!-- DELETE button -->
            <td>
                <button class="btn btn-danger" onclick="deleteProduct(<?= $product['rec_no'] ?>)">Delete</button>
            </td>
            <?php foreach ($productFields as $field) : ?>
                <!-- dynamically render all the product field data in correct order -->

                <!-- If data contains url, we know its image therefore we place it in <img> tag -->
                <?php if (filter_var($product[$field], FILTER_VALIDATE_URL)) : ?>
                    <td>
                        <img src="<?= $product[$field]; ?>" alt="Product Thumbnail" class="img-thumbnail" width="100">
                    </td>
                    <!-- If data is too long, we will shorten it and place three dots '...' in the end -->
                <?php elseif (isset($product[$field]) && strlen($product[$field]) > 50) : ?>
                    <td><?=  substr($product[$field], 0, 50) . "..."; ?></td>
                    <!-- default case we just display information -->
                <?php else : ?>
                    <td><?= $product[$field] ?></td>
                <?php endif; ?>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script>
    // This function triggers AJAX call to delete the product
    function deleteProduct(recNo) {
        if (confirm("Are you sure you want to delete this product?")) {
            $.ajax({
                url: "views/products/process_delete_product.php",
                type: "POST",
                data: { recNo: recNo },
                success: function(response) {
                    // Reload the page to update the product list after deletion
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error("Error deleting product:", error);
                }
            });
        }
    }
</script>

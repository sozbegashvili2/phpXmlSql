<?php

/**
 * Please see src/public/views/templates/app_layout.php
 * everything defined here is used in app_layout.php
 * This file is responsible to determine what page title will be used and what content will be rendered
 * in the app_layout.php
 */

// the navigation links from app_layout.php set pageTitle URL parameter
//and based on this we set the $pageTitle variable which is title
$pageTitle = $_GET['pageTitle'] ?? 'Display Products'; // Defaults to Index (Display Products)

// the navigation links set the section URL parameter by which is defined what content to render in the front end
$section = $_GET['section'] ?? 'list'; // Default to 'list'

// Based on the value of $section variable, we import proper php file and set the $contentTemplate variable
// which will be used and rendered by app_layout.php
switch ($section) {
    // with the ob_start(), I am gathering all content from the require statement in the buffer, and then
    // I store that gathered content in $contentTemplate which will be used in the app_layout.php.
    // then we use ob_get_clean() to empty the buffer for future use.

    case 'list':
        ob_start(); // Start output buffering
        require_once __DIR__ . '/../views/products/product_list.php';
        $contentTemplate = ob_get_clean(); // Capture and store the output
        break;
    case 'create':
        ob_start(); // Start output buffering
        require_once __DIR__ . '/../views/products/create_product.php';
        $contentTemplate = ob_get_clean(); // Capture and store the output
        break;
    case 'task2':
        ob_start(); // Start output buffering
        require_once __DIR__ . '/../views/task2/task2.php';
        $contentTemplate = ob_get_clean(); // Capture and store the output
        break;
    default:
        // Handle invalid sections here
}
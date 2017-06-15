<?php

/* 
 * Products Controller
 */

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';
// Get the products model
require_once '../model/products-model.php';
// Get the products model
require_once '../library/functions.php';

// Get the array of categories
$categories = getCategories();
$categoriesAndIds = getCategoriesAndIds();

// Build a navigation bar using the $categories array
$navList = '<ul>';
$navList .= "<li><a href='/acme/view/index.php?action=home' title='View the Acme home page'>Home</a></li>";
foreach ($categories as $category) {
$navList .= "<li><a href='/acme/accounts/index.php?action=$category[categoryName]' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
}
$navList .= '</ul>';

//Create a $catList variable to build a dynamic drop-down select list
$catList = "<select name='categoryId'>";
$catList .= '<option value ="">Please Choose</option>';
foreach ($categoriesAndIds as $catAndId) {
    $catList .= "<option value='$catAndId[categoryId]'>$catAndId[categoryName]</option>";
}
$catList .= "</select>";
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
 if ($action == NULL){
     $action= 'product-mgmt';
 }
}
switch ($action) {
    case'product-mgmt':
        $products = getProductBasics();
        if(count($products) > 0){
        $prodList = '<table>';
        $prodList .= '<thead>';
        $prodList .= '<tr><th>Product Name</th><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $prodList .= '</thead>';
        $prodList .= '<tbody>';
        foreach ($products as $product) {
        $prodList .= "<tr><td>$product[invName]</td>";
        $prodList .= "<td><a href='/acme/products?action=mod&id=$product[invId]' title='Click to modify'>Modify</a></td>";
        $prodList .= "<td><a href='/acme/products?action=del&id=$product[invId]' title='Click to delete'>Delete</a></td></tr>";
        }
        $prodList .= '</tbody></table>';
        }     else {
        $message = '<p class="notify">Sorry, no products were returned.</p>';
}
        include '../view/product-management.php';
        break;
    case 'category':
        include '../view/add-category.php';
        break;
    case 'product':
        include '../view/add-product.php';
        break;
    case 'addcategory':
        // Filter and store the data
        $categoryName = filter_input(INPUT_POST, 'categoryName');
        // Check for missing data
        if (empty($categoryName)) {
            $message = '<p>Please provide information for the category field.</p>';
            include '../view/add-category.php';
            exit;
        }
        // Send the data to the model
        $categoryOutcome = addCategory($categoryName);
        // Check and report the result
        if ($categoryOutcome === 1) {
            header('Location:/acme/products/index.php?action=category');
            
            exit;
        } else {
            $message = "<p>Sorry but the new category $categoryName has failed to be added. Please try again.</p>";
            include '../view/product-management.php';
            exit;
        }
        break;
    case 'addproduct':
        // Filter and store the data
        $invName = filter_input(INPUT_POST, 'invName');
        $invDescription = filter_input(INPUT_POST, 'invDescription');
        $invImage = filter_input(INPUT_POST, 'invImage');
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail');
        $invPrice = filter_input(INPUT_POST, 'invPrice');
        $invStock = filter_input(INPUT_POST, 'invStock');
        $invSize = filter_input(INPUT_POST, 'invSize');
        $invWeight = filter_input(INPUT_POST, 'invWeight');
        $invLocation = filter_input(INPUT_POST, 'invLocation');
        $categoryId = filter_input(INPUT_POST, 'categoryId');
        $invVendor = filter_input(INPUT_POST, 'invVendor');
        $invStyle = filter_input(INPUT_POST, 'invStyle');
        
        if ( empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail)
                || empty($invPrice) || empty($invStock) || empty($invSize) || empty($invWeight) 
                || empty($invLocation) || empty($categoryId) || empty($invVendor) || empty($invStyle)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/add-product.php';
            exit;
        }
        
        // Send the data to the model
        $addProduct = addProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock,
                $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle);
        
        // Check and report the result
        if ($addProduct === 1) {
            $message = "<p>Thanks for adding the new product called: $invName.</p>";
            include '../view/add-product.php';
            exit;
        } else {
            $message = "<p>Sorry but the new product $invName has failed to be added. Please try again.</p>";
            include '../view/add-product.php';
            exit;
        }
        break;
    case 'mod':
        $prodId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $prodInfo = getProductInfo($prodId);
        if(count($prodInfo)<1){
            $message = 'Sorry, no product information could be found.';
        }
        include '../view/prod-update.php';
        exit;
        break;
    
}
//var_dump($categories);
//exit;
<?php
/* Products Model*/

/* Get Categories and Ids*/
function getCategoriesAndIds() {
    $db = acmeConnect();
    $sql = 'SELECT categoryName, categoryId FROM categories ORDER BY categoryName ASC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $categoriesAndIds = $stmt->fetchAll();
    $stmt->closeCursor();
    return $categoriesAndIds;
}

//Contain a function for inserting a new category to the categories table.
function addCategory($categoryname){
     $db = acmeConnect();
      $sql = 'INSERT INTO categories (categoryName)
           VALUES (:categoryname )';
   $stmt = $db->prepare($sql);
   $stmt->bindValue(':categoryname', $categoryname, PDO::PARAM_STR);
   $stmt->execute();
   $rowsChanged = $stmt->rowCount();
   $stmt->closeCursor();
   return $rowsChanged;
}

//Contain a function for inserting a new product to the inventory table.
function addProduct( $invName, $invDescription, $invImage, $invThumbnail, $invPrice,
        $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle ){
   
    // Create a function to insert a new product in the inventory table. 
$db = acmeConnect();
// The SQL statement to be used with the database
$sql = 'INSERT INTO inventory ( invName, invDescription, invImage, invThumbnail, invPrice, invStock, invSize, invWeight, invLocation, categoryId, invVendor, invStyle)
        VALUES ( :invName, :invDescription, :invImage, :invThumbnail, :invPrice, :invStock, :invSize, :invWeight, :invLocation, :categoryId, :invVendor, :invStyle)';
// The next line creates the prepared statement using the acme connection
$stmt = $db->prepare($sql);
$stmt->bindValue(':invName', $invName, PDO::PARAM_STR);
$stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
$stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
$stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
$stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
$stmt->bindValue(':invStock', $invStock, PDO::PARAM_STR);
$stmt->bindValue(':invSize', $invSize, PDO::PARAM_STR);
$stmt->bindValue(':invWeight', $invWeight, PDO::PARAM_STR);
$stmt->bindValue(':invLocation', $invLocation, PDO::PARAM_STR);
$stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_STR);
$stmt->bindValue(':invVendor', $invVendor, PDO::PARAM_STR);
$stmt->bindValue(':invStyle', $invStyle, PDO::PARAM_STR);
// The next line runs the prepared statement
$stmt->execute();
$rowsChanged = $stmt->rowCount();
$stmt->closeCursor();
return $rowsChanged; 
} 

// Get basic product information from the inventory table
function getProductBasics() {
 $db = acmeConnect();
 $sql = 'SELECT invName, invId FROM inventory ORDER BY invName ASC';
 $stmt = $db->prepare($sql);
 $stmt->execute();
 $products = $stmt->fetchAll(PDO::FETCH_NAMED);
 $stmt->closeCursor();
 return $products;
}

//Get product based on the product ID
function getProductInfo($prodId){
 $db = acmeConnect();
 $sql = 'SELECT * FROM inventory WHERE invId = :prodId';
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':prodId', $prodId, PDO::PARAM_INT);
 $stmt->execute();
 $prodInfo = $stmt->fetch(PDO::FETCH_NAMED);
 $stmt->closeCursor();
 return $prodInfo;
}
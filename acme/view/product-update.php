<?php
$catList = "<select name='categoryId' id=categoryId>";
$catList .= '<option value ="">Please Choose</option>';
foreach ($categoriesAndIds as $catAndId) {
    $catList .= "<option value='$catAndId[categoryId]'";
    if(isset($categoryId)){
    
    if($catAndId['categoryId'] === $catAndId){
      $catList .= ' selected ';
  }
}   
    $catList .= ">$catAndId[categoryName]</option>";
}
$catList .= "</select>";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Mary Reiko Elsmore">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="../css/acmestylesheet.css" type="text/css" rel="stylesheet" media="screen">  
        <title>
            <?php if(isset($prodInfo['invName'])){ echo "Modify $prodInfo[invName] ";} elseif(isset($prodName)) { echo $prodName; }?>
        </title>
    </head>
    <body>
        <div id="page-container">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?>
        </header>
        <nav>
            <?php echo $navList; ?>
        </nav>
        <main>
            
            <div>
                <h1><?php if(isset($prodInfo['invName'])){ echo "Modify $prodInfo[invName] ";} elseif(isset($prodName)) { echo $prodName; }?></h1>
                 <p>Update a product below. All fields are required!</p>
                <?php
                if (isset($message)) {
                echo $message;
                }
                ?>
                <form action="/acme/products/index.php?action=addproduct" method="post">
                    <fieldset>
                        <label>Category</label><br>
                        <?php echo $catList; ?><br>
                        <label for="invName">Product Name</label><br>
                        <input type="text" name="prodName" id="prodName" required <?php if(isset($prodName)){ echo "value='$prodName'"; } elseif(isset($prodInfo['invName'])) {echo "value='$prodInfo[invName]'"; }?>>
                        
                        <label for="invDescription">Description</label><br>
                        <textarea rows="5" name="invDescription" id="invDescription"></textarea><br>
                        <label for="invImage">Path to Image</label><br>
                        <input id="invImage" type="text" name="invImage" value="/acme/images/no-image.png"><br>
                        <label for="invThumbnail">Path to Thumbnail</label><br>
                        <input type="text" id="invThumbnail" name="invThumbnail" value="/acme/images/no-image.png" required  ><br>
                        <label for="invPrice">Price</label><br>
                        <input type="text" id="invPrice" name="invPrice" required><br>
                        <label for="invStock">Stock</label><br>
                        <input type="text" id="invStock" name="invStock" required><br>
                        <label for="invSize">Size</label><br>
                        <input type="text" id="invSize" name="invSize" required><br>
                        <label for="invWeight">Weight</label><br>
                        <input type="text" id="invWeight" name="invWeight" required><br>
                        <label for="invLocation">Location</label><br>
                        <input type="text" id="invLocation" name="invLocation" required><br>
                        <label for="invVendor">Vendor</label><br>
                        <input type="text" id="invVendor" name="invVendor" required><br>
                        <label for="invStyle">Style</label><br>
                        <input type="text" id="invStyle" name="invStyle" required><br><br>
                        <input type="hidden" name="action" value="updateProd">
                        <input type="submit" name="submit" value="Update Product">
                    </fieldset>
                </form>                       
            </div>
            
        </main>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
        </footer>
        </div>
    </body>
</html>
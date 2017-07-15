<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /acme/index.php');
 exit;
}
?>
<?php
$catList = "<select name='catType' id=catType>";
$catList .= '<option value ="">Please Choose</option>';
foreach ($categoriesAndIds as $catAndId) {
    $catList .= "<option value='$catAndId[categoryId]'";
    if(isset($catType)){
    
    if($catAndId['categoryId'] === $catType){
      $catList .= ' selected ';
  }
  
} elseif (isset($prodInfo['categoryId'])) {
  if($catAndId['categoryId'] === $prodInfo['categoryId']){
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
                        
                        <label>Product Name</label><br>
                        <input type='text' name='prodName' id="prodName" required <?php if(isset($prodName)){echo "value='$prodName'";}
                        elseif(isset($prodInfo['invName'])){echo "value='$prodInfo[invName]'"; }?>><br>
                        
                        <label>Description</label><br>
                        <textarea rows="5" id="prodDescription" name="prodDescription" required><?php if(isset($prodDescription)){echo $prodDescription; } elseif(isset($prodInfo['invDescription'])) {echo $prodInfo['invDescription']; }?></textarea><br>
                        
                        <label>Product Image</label><br>
                        <input id="prodImage" type="text" name="prodImage"  required <?php if(isset($prodImage)){echo "value='$prodImage'";}
                            elseif(isset($prodInfo['invImage'])) {echo "value='$prodInfo[invImage]'"; }?>><br>
                        
                        <label>Product Thumbnail</label><br>
                        <input type="text" id="prodThumbnail" name="prodThumbnail" required <?php if(isset($prodThumbnail)){echo "value='$prodThumbnail'";}
                            elseif(isset($prodInfo['invThumbnail'])) {echo "value='$prodInfo[invThumbnail]'"; }?>><br>
                        
                        <label>Price</label><br>
                        <input type="text" id="prodPrice" name="prodPrice" <?php if(isset($prodPrice))
                        {echo "value='$prodPrice'";}elseif(isset($prodInfo['invPrice'])) {echo "value='$prodInfo[invPrice]'"; } ?> required ><br>
                        <label>Stock</label><br>
                        
                        <input type="text" id="prodStock" name="prodStock"  <?php if(isset($prodStock))
                        {echo "value='$prodStock'";}elseif(isset($prodInfo['invStock'])) {echo "value='$prodInfo[invStock]'"; } ?> required >  <br>
                        <label>Product Size</label><br>
                        
                        <input type="text" id="prodSize" name="prodSize" <?php if(isset($prodSize))
                        {echo "value='$prodSize'";}elseif(isset($prodInfo['invSize'])) {echo "value='$prodInfo[invSize]'"; } ?> required ><br>
                        <label>Product Weight</label><br>
                        
                        <input type="text" id="prodWeight" name="prodWeight" <?php if(isset($prodWeight))
                        {echo "value='$prodWeight'";}elseif(isset($prodInfo['invWeight'])) {echo "value='$prodInfo[invWeight]'"; } ?> required ><br>
                        <label> Product Location</label><br>
                        
                        <input type="text" id="prodLocation" name="prodLocation"  <?php if(isset($prodLocation))
                        {echo "value='$prodLocation'";}elseif(isset($prodInfo['invLocation'])) {echo "value='$prodInfo[invLocation]'"; } ?> required ><br>
                        
                        <label>Vendor</label><br>
                        <input type="text" id="prodVendor" name="prodVendor" <?php if(isset($prodVendor))
                            {echo "value='$prodVendor'";}elseif(isset($prodInfo['invVendor'])) {echo "value='$prodInfo[invVendor]'"; } ?> required ><br><br>
                        
                        <label>Product Style</label><br>
                        <input type="text" id="prodStyle" name="prodStyle"  <?php if(isset($prodStyle))
                        {echo "value='$prodStyle'";}elseif(isset($prodInfo['invStyle'])) {echo "value='$prodInfo[invStyle]'"; } ?> required ><br><br>

                        
                        <input type="hidden" name="action" value="updateProd">
                        <input type="hidden" name="prodId" value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} elseif(isset($prodId)){ echo $prodId; } ?>">
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
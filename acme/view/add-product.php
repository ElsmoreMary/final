<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /acme/index.php');
 exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/head.php'; ?>  
        <title>Acme Add New Product</title>
    </head>
    <body>
        <div id="page-container">
            <header>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?>
            </header>
            <nav>
                <?php echo navigation(); ?>
            </nav>
            <main>
            <div>
              <h1>Add Product</h1>
                 <p>Add a new product below. All fields are required!</p>
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
                        <input type='text' name='invName' id="invName"<?php if(isset($invName)){echo "value='$invName'";} ?> required><br>
                        <label for="invDescription">Description</label><br>
                        <textarea rows="5" name="invDescription" id="invDescription" required><?php if(isset($invDescription)){echo "'$invDescription'";} ?></textarea><br>
                        <label for="invImage">Path to Image</label><br>
                        <input id="invImage" type="text" name="invImage" value="/acme/images/no-image.png"<?php if(isset($invImage)){echo "value='$invImage'";} ?> required><br>
                        <label for="invThumbnail">Path to Thumbnail</label><br>
                        <input type="text" id="invThumbnail" name="invThumbnail" value="/acme/images/no-image.png"<?php if(isset($invThumbnail)){echo "value='$invThumbnail'";} ?> required><br>
                        <label for="invPrice">Price</label><br>
                        <input type="text" id="invPrice" name="invPrice"<?php if(isset($invPrice)){echo "value='$invPrice'";} ?> required><br>
                        <label for="invStock">Stock</label><br>
                        <input type="text" id="invStock" name="invStock"<?php if(isset($invStock)){echo "value='$invStock'";} ?> required><br>
                        <label for="invSize">Size</label><br>
                        <input type="text" id="invSize" name="invSize"<?php if(isset($invSize)){echo "value='$invSize'";} ?> required><br>
                        <label for="invWeight">Weight</label><br>
                        <input type="text" id="invWeight" name="invWeight"<?php if(isset($invWeight)){echo "value='$invWeight'";} ?> required><br>
                        <label for="invLocation">Location</label><br>
                        <input type="text" id="invLocation" name="invLocation"<?php if(isset($invLocation)){echo "value='$invLocation'";} ?>  required><br>
                        <label for="invVendor">Vendor</label><br>
                        <input type="text" id="invVendor" name="invVendor"<?php if(isset($invVendor)){echo "value='$invVendor'";} ?> required><br>
                        <label for="invStyle">Style</label><br>
                        <input type="text" id="invStyle" name="invStyle"<?php if(isset($invStyle)){echo "value='$invStyle'";} ?> required><br><br>
                        <input class="loginbutton" type='submit' value='Add Product'><br>
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

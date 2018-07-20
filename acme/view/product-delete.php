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
        <title>
            <?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName]";} ?>
        </title>
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
                <h1><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName]";} ?></h1>
                <p>Confirm Product Deletion. The delete is permanent.</p>
                <form action="/acme/products/" method="post">
                    <fieldset>
                        <label>Name</label><br>
                        <input type='text' readonly name='prodName' id="prodName" required <?php if(isset($prodName)){echo "value='$prodName'";}
                        elseif(isset($prodInfo['invName'])){echo "value='$prodInfo[invName]'"; }?>><br>
                        
                        <label>Description</label><br>
                        <textarea rows="5" id="prodDescription" readonly name="prodDescription" required><?php if(isset($prodDescription)){echo $prodDescription; } elseif(isset($prodInfo['invDescription'])) {echo $prodInfo['invDescription']; }?></textarea><br>
                        
                        <label>&nbsp;</label>
                        <input type="submit" name="submit" value="Delete Product">
                        
                        <input type="hidden" name="action" value="deleteProd">
                        <input type="hidden" name="prodId" value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} ?>">
     
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

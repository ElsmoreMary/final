<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /acme/');
 exit;
}
if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
}?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Mary Reiko Elsmore">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="../css/acmestylesheet.css" type="text/css" rel="stylesheet" media="screen">  
        <title>Acme Product Management</title>
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
                <h1>Product Management</h1>
                <p>Welcome to the product management page. Please choose an option below.</p>
                <h3><a href="/acme/products/index.php?action=addcategory">Add a New Category </a></h3>
                <h3><a href="../products/index.php?action=addproduct">Add a New Product</a></h3>
            </div>
            
        <?php
        if (isset($message)) {
         echo $message;
        } if (isset($prodList)) {
         echo $prodList;
        }
        ?>   
        </main>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
        </footer>
        </div>
    </body>
</html>
<?php unset($_SESSION['message']);?>
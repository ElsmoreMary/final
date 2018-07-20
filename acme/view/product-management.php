<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /acme/index.php');
 exit;
}
if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
}?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/head.php'; ?>  
        <title>Acme Product Management</title>
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
            <div class="product">
              <h1>Product Management</h1>
                <p>Welcome to the product management page. Please choose an option below.</p>
                <p><a href="/acme/products/index.php?action=addcategory">Add a New Category </a></p>
                <p><a href="../products/index.php?action=addproduct">Add a New Product</a></p>
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
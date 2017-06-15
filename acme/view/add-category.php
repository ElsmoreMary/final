<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Mary Reiko Elsmore">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="../css/acmestylesheet.css" type="text/css" rel="stylesheet" media="screen">  
        <title>Add New Category</title>
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
                <h1>Add Category</h1>
                <p>Add a new category of products below.</p>
                <?php
                if (isset($message)) {
                echo $message;
                }
                ?>
                <form action="/acme/products/index.php?action=addcategory" method="post">
                    <fieldset>
                        <label for="categoryName">New Category Name</label><br>
                        <input type='text' name='categoryName' id="categoryName"><?php if(isset($categoryName)){echo "value='$categoryName'";} ?><br>
                        <input class="loginbutton" type='submit' value='Add Category'>
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
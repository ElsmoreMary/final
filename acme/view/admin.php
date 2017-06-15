<?php
if (session_id()== ''){
header('location:/acme/index.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Mary Reiko Elsmore">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="../css/acmestylesheet.css" type="text/css" rel="stylesheet" media="screen">  
        <title>Acme Admin Page</title>
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
                <?php
                    $firstname = $_SESSION['clientData']['clientFirstname'];
                    $lastname = $_SESSION['clientData']['clientLastname'];
                    $emailaddress = $_SESSION['clientData']['clientEmail'];
                    $level = $_SESSION['clientData']['clientLevel'];       
                    echo "<h1>$firstname $lastname</h1>
                        <ul>
                            <li>First name: $firstname</li>
                            <li>Last name: $lastname</li>
                            <li>Email: $emailaddress</li>
                            <li>Level: $level</li>
                        </ul>";
                    if ($level == 3){
                    echo '<a href="/acme/products/index.php?action=product-mgmt">Products</a><br>';
                    }
                ?>
            </div>
        </main>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
        </footer>
        </div>
    </body>
</html>
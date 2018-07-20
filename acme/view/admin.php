<?php
if (session_id()== ''){
header('location:/acme/index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/head.php'; ?>  
        <title>Acme Login</title>
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
                <h1>
                    <?php 
                    if (isset($upfirstName)) {
                        echo "$upfirstName"; 
                    } elseif(isset($clientData['clientFirstname'])) {
                        echo"$clientData[clientFirstname]";                    
                    }
                    ?>    
                    <?php if (isset($uplastName)) {
                        echo "$uplastName";
                    } elseif(isset($clientData['clientLastname'])) {
                        echo"$clientData[clientLastname]";                     
                    }
                    ?>
                </h1>
                <p>You are logged in.</p>
            </div>
                <?php
                    if (isset($message)) {
                    echo $message;
                    }
                    $firstname = $_SESSION['clientData']['clientFirstname'];
                    $lastname = $_SESSION['clientData']['clientLastname'];
                    $emailaddress = $_SESSION['clientData']['clientEmail'];
                    $level = $_SESSION['clientData']['clientLevel'];       
                    echo"
                        <ul>
                            <li>First name: $firstname</li>
                            <li>Last name: $lastname</li>
                            <li>Email: $emailaddress</li>
                        </ul>"; 
                ?>
                <p><a href="/acme/accounts/index.php?action=client-update">Update Account Information</a></p>
                <?php
                if ($level == 3){
                echo '<h1>Administrative Functions</h1>
                <p>Use the link below to manage products</p>
                <a href="/acme/products/index.php?action=product-mgmt">Products</a><br>';
                }
                ?>
                <div class="review-table">
                <h1>Manage Your Product Reviews</h1>
                <?php $reviews = getReviewbyClient($_SESSION['clientData']['clientId']) ?>
                <?php foreach ($reviews as $review) { ?>
                    <div>
                        <p><?php
                            echo $review['invName'];
                            echo " (Reviewed on ";
                            echo strftime("%d %B, %Y ", strtotime($review ['reviewDate']));
                            echo " ) ";
                            echo "<a href='/acme/reviews?action=editReview&id=$review[reviewId]' title='Click to Edit'>Edit</a> ";
                            echo "<a href='/acme/reviews?action=deleteReview&id=$review[reviewId]' title='Click to Delete'>Delete</a>";
                            ?></p>

                    </div>
                <?php } ?>
            </div>   
            </main>
        <footer>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
            </footer>
        </div>
    </body>
</html>

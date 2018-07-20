<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/head.php'; ?>
        <title><?php echo $prodId; ?> Products</title>
    </head>
    <body>
        <div id="page-container">
        <header id="page-header">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?>
        </header>
            
        <nav>
             <?php echo navigation(); ?>
        </nav>
 
        <main>
            <!--<h1><?php echo $products[$prodName] ?></h1>-->
            
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <?php
            if (isset($prodDetail)) {
                echo $prodDetail;
            }
            ?>
            <?php
            if (isset($thumbnails)) {
                echo $thumbnails;
            }
            ?>
            
            <h2>Customer Reviews</h2>
            <?php if (isset($_SESSION['loggedin'])) : ?>
                <?php $firstname = $_SESSION['clientData']['clientFirstname'] ?>
                <?php $lastname = $_SESSION['clientData']['clientLastname'] ?>
                <form action="/acme/reviews/index.php" method='post'>
                    <p> Screen name: <?php echo substr("$firstname", 0, 1); ?><?php echo $lastname; ?></p>
                    <label for=“reviewText”>Write your review:</label><br>
                    <textarea name="reviewText" id=“reviewText”  rows="10" cols="60" required><?php
                        if (isset($reviewText)) {
                            echo "$reviewText";
                        }
                        ?> </textarea><br>
                    <input type="submit" name="submit" value="Add Review">
                    <input type="hidden" name="action" value="addReview">
                    <input type="hidden" name="clientId" value="<?php echo $_SESSION['clientData']['clientId']; ?>">
                    <input type="hidden" name="invId" value="<?php echo $product['invId']; ?>">
                </form>

            <?php else : ?>
                <p>Please <a href="/acme/accounts/index.php?action=login">login</a></p>
            <?php endif; ?>

            <!--display previous written reviews here-->    
            <?php if (isset($_SESSION['loggedin'])) : ?>

               
            <div class="review-table" style="background: #ffff99">
                     <h2> Your product reviews </h2>
                    <?php
                    $clientId = $_SESSION['clientData']['clientId'];
                    $reviews = getReviewByClient($clientId);
                    ?>
                    <?php
                    foreach ($reviews as $review) {
                        if ($review['invId'] == $prodId) {
                            ?>
                            <p>   <p><?php echo substr("$firstname", 0, 1); ?><?php echo $lastname; ?> wrote on <?php echo strftime("%d %B, %Y ", strtotime($review ['reviewDate'])); ?></p>
                            <?php echo $review['reviewText']; ?>
                        <?php } ?>
                    <?php } else : ?>
                    <p>Please <a href="/acme/accounts/index.php?action=login">login to see your reviews.</a></p>
                <?php endif; ?>       
            </div>

        </main>
        <footer id="page-footer">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
        </footer>
        </div>
    </body>
</html>
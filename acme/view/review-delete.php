<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/head.php'; ?>  
        <title>Delete Review</title>
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
        <section>
            <h1 class="login"><?php if(isset($invReviewNameInfo['invName'])){ echo "Delete ". $invReviewNameInfo['invName'] . "Review";} ?></h1>
                <p>Confirm Review Deletion. The delete is permanent.</p>
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
                <form method="post" action="/acme/reviews/index.php">
                    <fieldset>
                        <label for="reviewtext">Review Text</label><br>
                        <textarea name="reviewtext" id="reviewtext" rows="10" cols="75" required readonly>
                            <?php
                            if (isset($reviewText)) {
                                echo $reviewText;
                            } elseif (isset($review['reviewText'])) {
                                echo $review['reviewText'];
                            }
                            ?></textarea><br>
                        <button type="submit" name="delete" id="delete" >Delete Review</button>
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="reviewId" value="<?php
                            if (isset($reviewInfo['reviewId'])) {
                                echo $reviewInfo['reviewId'];
                            } elseif (isset($reviewId)) {
                                echo $reviewId;
                            }
                            ?>">
                    </fieldset>
                </form>                    
        </section>                
        </main>
        <footer>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
            </footer>
        </div>
    </body>
</html>

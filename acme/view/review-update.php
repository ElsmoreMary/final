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
            <section class>
                <h1>Review Update</h1>
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
                <form method="post" action="/acme/reviews/index.php" id="reviewform">
                    <fieldset>
                        <label for="reviewtext">Review Text</label><br>
                        <textarea name="reviewtext" id="reviewtext" form="reviewform" rows="10" cols="75" required><?php
                            if (isset($reviewText)) {
                                echo $reviewText;
                            } elseif (isset($review['reviewText'])) {
                                echo $review['reviewText'];
                            }
                            ?></textarea><br>
                        <button type="submit" name="updateReview" id="updateReview">Update Review</button>
                        <!-- Add the action key - value pair -->
                        <input type="hidden" name="action" value="updateReview">
                        <input type="hidden" name="invid" value="<?php
                        if (isset($reviewInfo['invId'])) {
                            echo $reviewInfo['invId'];
                        } elseif (isset($invId)) {
                            echo $invId;
                        }
                        ?>">
                        <input type="hidden" name="reviewid" value="<?php
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

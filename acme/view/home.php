<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/head.php'; ?>
        <title>Acme Home Page</title>
    </head>
    <body>
        <div id="page-container">
        <header id="page-header">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?>
        </header>
            
        <nav>
             <?php echo navigation(); ?>
        </nav>
 
        <main id="page-main">
            <h1>Welcome to Acme!</h1>
            <div class="banner">
            <div class="banner-text">
                <ul class ="banner-ul">
                    <li><h2>Acme Rocket</h2></li>
                    <li>Quick lighting fuse</li>
                    <li>NHTSA approved seat belts</li>
                    <li>Mobile launch stand included</li>
                    <li><br></li>
                    <li><a href="/acme/cart/"><img id="actionbtn" alt="Add to cart button" src="/acme/images/site/iwantit.gif"></a></li>
                </ul>
            </div>
            </div>
            
            <div class="container">
                <h3>Featured Recipes</h3>
            <div class="recipes">
                <div> 
                    <img src='/acme/images/recipes/bbqsand.jpg' alt='bbqsand'/><br>
                    <a href="#">Pulled Road Runner BBQ</a>
                </div>
                <div> 
                    <img src='/acme/images/recipes/potpie.jpg' alt='potpie'/><br>
                    <a href="#">Roadrunner Pot Pie</a>
                </div>
                <div>
                    <img src='/acme/images/recipes/soup.jpg' alt='soup'/><br>
                    <a href="#">Roadrunner Soup</a>
                </div>
                <div>
                    <img src='/acme/images/recipes/taco.jpg' alt='tacos'/><br>
                    <a href="#">Roadrunner Tacos</a>
                </div>
            </div>
            
            <div class="reviews">
            <h3>Get Dinner Rocket Reviews</h3>
                    <ul>
                        <li><q>I don't know how I ever caught roadrunners before this.</q>(4/5)</li>
                        <li><q>That thing was fast!</q>(4/5)</li>
                        <li><q>Talk about fast delivery.</q>(5/5)</li>
                        <li><q>I didn't even have to pull the meat apart</q>(4.5/5)</li>
                        <li><q>I'm on my thirtieth one. I love these things!</q>(5/5)</li>
                    </ul>
            </div>
            </div>
        </main>
        <footer id="page-footer">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
        </footer>
        </div>
    </body>
</html>
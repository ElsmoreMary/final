<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Mary Reiko Elsmore">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="/acme/css/acmestylesheet.css" type="text/css" rel="stylesheet" media="screen">
        <title>Acme Home Page</title>
    </head>
    <body>
        <div id="page-container">
        <header id="page-header">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?>
        </header>
            
        <nav id="page-nav">
            <?php echo $navList; ?>
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
                    <li><a href="/acme/cart/"><img id="actionbtn" alt="Add to cart button" src="/acme/images/site/iwantit.gif"></a></li>
                </ul>
            </div>
            </div>
           
            <div class="flexbox-split">
                <div class="recipes">
                    <h3>Featured Recipes</h3>
                    <figure class="flexrecipe">
                        <img src='/acme/images/recipes/bbqsand.jpg' alt='bbqsand'/>
                        <figcaption>Pulled Road Runner BBQ</figcaption>
                    </figure>
                
                    <figure class="flexrecipe"> 
                        <img src='/acme/images/recipes/potpie.jpg' alt='potpie'/>
                        <figcaption>Roadrunner Pot Pie</figcaption>
                    </figure>
     
                    <figure class="flexrecipe">
                        <img src='/acme/images/recipes/soup.jpg' alt='soup'/>
                        <figcaption>Roadrunner Soup</figcaption>
                    </figure>

                    <figure class="flexrecipe">
                        <img src='/acme/images/recipes/taco.jpg' alt='tacos'/>
                        <figcaption>Roadrunner Tacos</figcaption>
                    </figure>
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
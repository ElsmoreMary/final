<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Mary Reiko Elsmore">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="../css/acmestylesheet.css" type="text/css" rel="stylesheet" media="screen">  
        <title>Acme Login</title>
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
                if (isset($message)) {
                    echo $message;
                }
                ?>
                
                <h1>Acme Login</h1>
                <form method="post" action="/acme/accounts/index.php">
                    <fieldset>
                        <label for="email">Email Address:</label><br>
                        <input type="email" name="email" id="email" <?php if(isset($email)){echo "value='$email'";} ?>required><br>
                        <label for="password">Password:</label><br>
                        <span class="reduced">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br>
                        <input type="password" name="password" id="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>
                        <input type="submit" name="submit" value="login">
                        <input type="hidden" name="action" value="Login">
                    </fieldset>
                </form>
                <h2>Not a member?</h2>
                <form method="post" action="../accounts/index.php?action=registration">
                        <button type="submit">Register Here</button>
                </form> 
            </div>
        </main>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
        </footer>
        </div>
    </body>
</html>
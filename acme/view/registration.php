<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Mary Reiko Elsmore">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="../css/acmestylesheet.css" type="text/css" rel="stylesheet" media="screen">  
        <title>Acme Registration</title>
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
                <h1>Acme Registration</h1>
                <?php
                    if (isset($message)) {
                     echo $message;
                    }
                ?>
                <form method="post" action="/acme/accounts/index.php">
                    <fieldset>
                        <label for="firstname">First Name:</label><br>
                        <input type="text" name="firstname" id="firstname" <?php if(isset($firstname)){echo "value='$firstname'";} ?> required><br>
                        <label for="lastname">Last Name:</label><br>
                        <input type="text" name="lastname" id="lastname" <?php if(isset($lastname)){echo "value='$lastname'";} ?> required><br>
                        <label for="email">Email Address:</label><br>
                        <input type="email" name="email" id="email" <?php if(isset($email)){echo "value='$email'";} ?>required><br>
                        <label for="password">Password:</label><br>
                        <span class="reduced">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br>
                        <input type="password" name="password" id="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>
                    <input type='submit' value='Submit'>
                    <!-- Add the action name - value pair -->
                    <input type="hidden" name="action" value="register">
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
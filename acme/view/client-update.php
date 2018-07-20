<?php
 if (session_id()== ''){
header('location:/acme/index.php');
    }
    $clientData=$_SESSION['clientData'];
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/head.php'; ?>  
        <title>Acme Update Client Information</title>
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
                <?php
                if  (isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                    unset ($_SESSION['message']);
                }
                ?>
            <h1>Update Account</h1>
                <p>Please use the field below to make any changes to your account info.</p>
            <div id="form">
                <form action="/acme/accounts/index.php?action=updateAccount" method="post">
                    <fieldset>
                        <label>First Name</label><br>
                        <input type="text" name="upfirstName" id="upfirstName" required <?php if (isset($upfirstName))
                        {echo "value='$upfirstName'";}elseif(isset($clientData['clientFirstname'])) {echo "value='$clientData[clientFirstname]'"; }?>><br>

                        <label>Last Name</label><br>
                        <input type="text" name="uplastName" id="uplastName" required
                       <?php if (isset($uplastName)) {echo "value='$uplastName'";}
                        elseif(isset($clientData['clientLastname'])) {echo "value='$clientData[clientLastname]'"; }?>><br>
                        
                        <label>Email</label><br>
                        <input type="text" name="upEmail" id="upEmail" required
                        <?php if (isset($upEmail)) {echo "value='$upEmail'";}
                        elseif(isset($clientData['clientEmail'])) {echo "value='$clientData[clientEmail]'"; }?>><br><br>
                        
                        <input type="submit" name="submit" value="Update Information">
                        <input type="hidden" name="updateId" value="<?php if (isset($clientData['clientId'])) {echo $clientData['clientId'];} elseif (isset($clientId)) {echo $clientId;} ?>">
                    </fieldset>
                </form>                
            </div>

            <div id="formtwo">
                <form action="/acme/accounts/index.php?action=updatePassword" method="post">
                    <fieldset>
                        <h1>Change Password</h1>
                        <p>Use the form field to update your password.</p>
                        <label>
                            <span><i>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</i></span><br><br>
                            <input type="password" name="updatePass" id="updatePass" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
                        <?php if (isset($updatePass)){echo "value='$updatePass'";}
                        elseif(isset($clientData['clientPassword'])) {echo "value='$clientData[clientPassword]'"; }?>><br><br>
                        </label>
                        <input type="submit" name="submit" value="Update Password">
                        <input type="hidden" name="updateId" value="<?php if(isset($clientData['clientId'])){ echo $clientData['clientId'];} elseif(isset($clientId)){ echo $clientId; } ?>"><br>
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

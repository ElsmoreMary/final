<div id="header">
    <img class="acmelogo" src="/acme/images/site/logo.gif" alt="acme site logo">

    <div class="account">
        <?php
            if(isset($_SESSION['firstname'])){
            $firstname = $_SESSION['firstname'];
            echo "<span><a href='/acme/accounts/index.php?action=admin'> &nbsp; Welcome $firstname &nbsp; </a></span>";
            }
    
            else { 
            echo"<span><a href='/acme/accounts/index.php?action=home'>&nbsp; Home &nbsp;</a></span>";
        }
        ?>
        
        <?php if(isset($_SESSION['loggedin'])){
            echo '<div id="logout"><a href="/acme/accounts/index.php?action=Logout">Logout</a></div>';
            } else {
            echo '<a href="/acme/accounts/index.php?action=login" title="Login or Register">
                  <img src="/acme/images/site/account.gif" width="20" alt="account">&nbsp; My Account &nbsp;</a>';
            }
        ?>
    </div>

</div>

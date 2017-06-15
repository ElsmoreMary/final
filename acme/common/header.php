<img src="/acme/images/site/logo.gif" width="200" alt="site logo">

<div id="account">
<?php if(isset($cookieFirstname)){
  echo "<span>Welcome $cookieFirstname</span>";
} ?>

<?php
if(isset($_SESSION['loggedin'])){
    echo '<div id="logout"><a href="/acme/accounts/index.php?action=Logout">Logout</a></div>';
    } else {
    echo '<a href="/acme/accounts/index.php?action=login" title="Login or Register"><img src="images/site/account.gif" width="20" alt="account">My Account</a>';
    }
?>
</div>

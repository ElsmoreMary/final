<?php

/*
 * Acme Controller
 */

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
// Get the functions library
require_once '../library/functions.php';
require_once '../model/products-model.php';

// Get the array of categories
$categories = getCategories();
//var_dump($categories);
//exit;

$navList = navigation();

// Build a navigation bar using the $categories array
//$navList = '<ul>';
//$navList .= "<li><a href='/acme/accounts/index.php' title='View the Acme home page'>Home</a></li>";
//foreach ($categories as $category) {
//$navList .= "<li><a href='/acme/accounts/index.php?action=$category[categoryName]' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
//}
//$navList .= '</ul>';
//echo $navList;
//exit;

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}
switch ($action) {
    case 'login':
        include '../view/login.php';
        break;
    case 'registration':
        include '../view/registration.php';
        //echo 'You are in the register case statement.';
        break;
    case 'Login':
        $email = filter_input(INPUT_POST, 'email');
        $email = checkEmail($email);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $checkPassword = checkPassword($password);
        // Check for missing data
        if (empty($email) || empty($checkPassword)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/login.php';
            exit;
        }
        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($email);
        //compare the password to hash
        $hashCheck = password_verify($password, $clientData['clientPassword']); 
        //if password ok, then display the proper page, if not display an error
        if (!$hashCheck) {
            $message = '<p class="notice">Please check your password and try again.</p>';
            include '../view/login.php';
            exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array, the array_pop function removes the last element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        // Send them to the admin view
        include '../view/admin.php';
        exit;
        default :
        include '../view/login.php';
        break;
    case 'Logout':
        session_destroy();
        header('location:/acme');
        exit;   
        break;
    case 'home':
        include '../view/home.php';
        break;
    case 'register':
        // Filter and store the data
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $email = checkEmail($email);
        $checkPassword = checkPassword($password);

       // echo "111 ".$firstname.$lastname.$email." 222";
        
// Check for existing email address in the table        
        $existingEmail = checkExistingEmail($email);

        if ($existingEmail) {
            $message = '<p class="notice">This email address already exists. Do you want to login instead?</p>';
            include '../view/login.php';
            exit;
        }
        
// Check for missing data
        if (empty($firstname) || empty($lastname) || empty($email) || empty($checkPassword)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/registration.php';
            exit;
        }

// Hash the checked password
        $password = password_hash($password, PASSWORD_DEFAULT);

// Send the data to the model
        $regOutcome = regVisitor($firstname, $lastname, $email, $password);

// Check and report the result
        if ($regOutcome === 1) {
            setcookie('firstname', $firstname, strtotime('+1 year'), '/');
            $message = "<p>Thanks for registering $firstname. Please use your email and password to login.</p>";
            include '../view/login.php';
            exit;
        } else {
            $message = "<p>Sorry $firstname, but the registration failed. Please try again.</p>";
            include '../view/registration.php';
            exit;
        }
        break;
    case 'admin':
        if (!isset($_SESSION['clientData']) or ( $_SESSION['clientData']['clientId'] == NULL)) {
            include '../view/home.php';
            break;
        }
        //Send them to the admin view
        include '../view/admin.php';
        break;
    case 'client-update':
        include '../view/client-update.php';
        break;
    case 'updateAccount':
        $updateId = filter_input(INPUT_POST, 'updateId', FILTER_SANITIZE_NUMBER_INT);
        $upfirstName = filter_input(INPUT_POST, 'upfirstName', FILTER_SANITIZE_STRING);
        $uplastName = filter_input(INPUT_POST, 'uplastName', FILTER_SANITIZE_STRING);
        $upEmail = filter_input(INPUT_POST, 'upEmail', FILTER_SANITIZE_EMAIL);
        if (empty($updateId) || empty($upfirstName) || empty($uplastName) || empty($upEmail)) {
            $message = '<p>Please complete all the information</p>';
        }
        $updata = updateAccount($updateId, $upfirstName, $uplastName, $upEmail);
        if ($updata) {
            $message = "<p>Congratulations, $upfirstName was sucessfully updated.</p>";
            $_SESSION['message'] = $message;
            $_SESSION['clientData']['clientFirstname'] = $upfirstName;
            $_SESSION['clientData']['clientLastname'] = $uplastName;
            $_SESSION['clientData']['clientEmail'] = $upEmail;
            include '../view/admin.php';
            exit;
        } else {
            $message = "<p>Error. $upfirstName was not updated.</p>";
            $_SESSION['message'] = $message;
            include '../view/admin.php';
            exit;
        }
        break;
    case 'updatePassword':
        $updateId = filter_input(INPUT_POST, 'updateId', FILTER_SANITIZE_NUMBER_INT);
        $updatePass = filter_input(INPUT_POST, 'updatePass', FILTER_SANITIZE_STRING);
        if (empty($updateId) || empty($clientPass)) {
            $message = '<p>Please complete all the information</p>';
        }
        $updatePass = password_hash($updatePass, PASSWORD_DEFAULT);
        $updata = updatePassword($updateId, $updatePass);
        if ($updata) {
            $message = "<p>Congratulations your password was sucessfully updated.</p>";
            $_SESSION['message'] = $message;
            include '../view/admin.php';
            exit;
        } else {
            $message = "<p>Error. Your password was not updated.</p>";
            $_SESSION['message'] = $message;
            include '../view/admin.php';
            exit;
        }
        break;

}
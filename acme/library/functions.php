<?php

/* 
 * Functions
 */

function checkEmail($email){
  $sanEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
  $valEmail = filter_var($sanEmail, FILTER_VALIDATE_EMAIL);
  return $valEmail;
}

// Check the password for a minimum of 8 characters,
// at least one 1 capital letter, at least 1 number and
// at least 1 special character
function checkPassword($password){
  $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{8,}$/';
  return preg_match($pattern, $password);
}

// Get categories to build nav
function navigation(){
    $categories = getcategories();
    $navList = '<ul>';
    $navList .= "<li><a href='/index.php' title='View the Acme Home Page'>Home</a></li>";
    foreach ($categories as $category) {
    $navList .= "<li><a href='/acme/accounts/index.php?action=$category[categoryName]' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
}

$navList .= '</ul>';
return $navList;
}
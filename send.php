<?php

function isValid(){
    if(
        $_POST[ 'fname]' != '' &&
        $_POST[ 'lname]' != '' &&
        $_POST[ 'email]' != '' &&
        $_POST[ 'message]' != '' 
    ){
        return true;
    }
    return false;
}

$success_output = '';
$error_output = '';


if (isValid()) {
    $success_output = "Your message was sent successfully.";
}else{
    $error_output = 'Please fill out all the required fields.';
}

$output = [
    'error' => $error_output,
    'success' => $success_output
];

echo json_encode($output);

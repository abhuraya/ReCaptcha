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
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6LddrmQqAAAAAEDaH01YmT8c4-c4CsGIqq4mQHgl';
    $recaptcha_response = $_POST('recaptchaResponse')
    $recaptcha = file_get_contents($recaptcha_url."?secre=t".
    $recaptcha_secret.'&response='. $recaptcha_response);
    $recaptcha = json_decode($recaptcha);
    if($recaptcha->seccess == true && $recaptcha->score >= 0.5 && $recaptcha->action == "contact"){
        //run email send routine
        $success_output = 'Your message was sent successfully.';
    }else{
        $error_output = 'Something went wrong Please try again later';
    }
    $success_output = "Your message was sent successfully.";
}else{
    $error_output = 'Please fill out all the required fields.';
}

$output = [
    'error' => $error_output,
    'success' => $success_output
];

echo json_encode($output);

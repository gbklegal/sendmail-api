<?php

/**
 * Template Name: sendmail API
 */

// abort direct access
defined('ABSPATH') or exit;

define('SENDMAIL_API_VERSION', '0.1.0');

require __DIR__ . '/config.php';
require __DIR__ . '/functions.php';

$sendmail_api_response = [];

// set defaults for the response
$sendmail_api_response['sendmail'] = false;



/**
 * show API version
 */
if (true === isset($_GET['version'])) {
    json_response(['version' => SENDMAIL_API_VERSION]);
    exit;
}


/**
 * only SSL
 */
if (false === is_ssl()) {
    $sendmail_api_response['error'] = [
        'code' => 403,
        'message' => 'Forbidden - SSL required'
    ];

    json_response($sendmail_api_response, 403);
    exit;
}

/**
 * only POST
 */
if (false === is_post()) {
    $sendmail_api_response['error'] = [
        'status' => 415,
        'message' => 'Unsupported Media Type - only POST requests'
    ];

    json_response($sendmail_api_response, 415);
    exit;
}


/**
 * check bearer token
 */
if (false === check_bearer_token(SENDMAIL_API_BEARER_TOKEN_HASH)) {
    $sendmail_api_response['error'] = [
        'status' => 401,
        'message' => 'Unauthorized - wrong/missing token'
    ];

    json_response($sendmail_api_response, 401);
    exit;
}


/**
 * these are the three important and required parameters
 */
$mail_to = $_POST['to'] ?? '';
$mail_subject = $_POST['subject'] ?? '';
$mail_message = $_POST['message'] ?? '';


// check the required parameters
if (
    (true === empty($mail_to)) ||
    (true === empty($mail_subject)) ||
    (true === empty($mail_message))
) {
    $sendmail_api_response['error'] = [
        'status' => 400,
        'message' => 'Bad Request - one or more parameter is missing'
    ];

    json_response($sendmail_api_response, 400);
    exit;
}


/**
 * Filter the mail content type.
 */
function wpdocs_set_html_mail_content_type() {
    return 'text/html';
}
add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );

/**
 * if all required parameters are there
 * we can know send the mail via the wp_mail
 * function from wordpress
 */
$wp_mail_sendmail = wp_mail($mail_to, $mail_subject, $mail_message);

// Reset content-type to avoid conflicts -- https://core.trac.wordpress.org/ticket/23578
remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );

// set response based on the result if the mail was semantically correct
if (true === $wp_mail_sendmail) {
    $sendmail_api_response['sendmail'] = true;

    json_response($sendmail_api_response);
    exit;
}
else {
    $sendmail_api_response['error'] = [
        'status' => 400,
        'message' => 'Bad Request - mail was not successfully accepted for delivery'
    ];

    json_response($sendmail_api_response, 400);
    exit;
}



echo 'You passed all three requirements :)';
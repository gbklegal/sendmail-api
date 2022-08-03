<?php

/**
 * Template Name: sendmail API
 */

// abort direct access
defined('ABSPATH') or exit;

define('SM_VERSION', '0.3.4');

require __DIR__ . '/config.php';
require __DIR__ . '/functions.php';

/**
 * * Each variable that is from this sendmail API
 * * uses the sendmail_api (short sm) prefix. This will prevent
 * * accidently be overwritten by a different plugin,
 * * theme or something else.
 */

/**
 * required (default) parameters
 * * some parameters are in some templates not required
 */
$sm_salutation = esc_attr( $_GET['salutation'] );
$sm_salutation_adjusted = adjust_salutation( $sm_salutation );

$sm_first_name = esc_attr( $_GET['first_name'] );
$sm_last_name = esc_attr( $_GET['last_name'] );
$sm_street = esc_attr( $_GET['street'] );
$sm_house_number = esc_attr( $_GET['house_number'] );
$sm_postcode = esc_attr( $_GET['postcode'] );
$sm_city = esc_attr( $_GET['city'] );

$sm_email = esc_attr( $_GET['email'] );
$sm_phone = esc_attr( $_GET['phone'] );
$sm_marital_status = esc_attr( $_GET['marital_status'] );

$sm_order_date = esc_attr( $_GET['order_date'] );
$sm_order_from = esc_attr( $_GET['order_from'] );

$sm_invoice_number = esc_attr( $_GET['invoice_number'] );
$sm_order_number = esc_attr( $_GET['order_number'] );
$sm_tax_year = esc_attr( $_GET['tax_year'] );
$sm_performance_period = esc_attr( $_GET['performance_period'] );
$sm_price_total = (int) esc_attr( $_GET['price_total'] );
$sm_price = (float) esc_attr( $_GET['price'] );

$sm_verification_link = esc_attr( $_GET['verification_link'] );

$sm_pdf = esc_attr( $_GET['pdf'] );
$sm_template_pdf = esc_attr( $_GET['template_pdf'] );
$sm_template = esc_attr( $_GET['template'] );
$sm_file_name = add_suffix( esc_attr( $_GET['file_name'] ?? 'document' ), 'pdf' );

/**
 * mail parameter
 */
$sm_mail_to = esc_attr( $_GET['to'] );
$sm_mail_subject = esc_attr( $_GET['subject'] );
$sm_mail_message = esc_attr( $_GET['message'] );

$sm_mail_headers = [];
$sm_mail_attachments = [];

$sm_mail_from = esc_attr( $_GET['from'] ?? 'dialog@steuermachen.de' );
$sm_mail_from_name = esc_attr( $_GET['from_name'] ?? 'steuermachen' );
$sm_mail_reply_to = esc_attr( $_GET['reply_to'] ?? $sm_mail_from );
$sm_mail_reply_to_name = esc_attr( $_GET['reply_to_name'] ?? $sm_mail_from_name );

/**
 * optional parameters
 */
$sm_date = esc_attr( $_GET['date'] ?? get_current_date() );

/**
 * predefined variables
 */
$sm_fee_description_pre = '';
$sm_fee_description = '';
$sm_fee = 0;
$sm_vat = 0;
$sm_total = 0;

$sm_pdf_margins = [];
$sm_response = [];

/**
 * utility variables
 */
$sm_query_string = $_SERVER['QUERY_STRING'];
parse_str( $sm_query_string, $sm_query_string_array );
$sm_url = home_url() . '/sendmail-api/';



/**
 * show API version
 */
if (true === isset($_GET['version'])) {
    json_response(['version' => SM_VERSION]);
    exit;
}



// == PDF START ==
if ( isset( $_GET['pdf'] ) ) {
    if ( check_api_key( $_GET['api_key'] ) ) {
        require __DIR__ . '/pdf/pdf.php';
    } else {
        $sm_response['error'] = [
            'code' => 403,
            'message' => 'Forbidden - missing API Key'
        ];

        json_response( $sm_response, 403 );
        exit;
    }
}
// == PDF END ==


// set defaults for the response
$sm_response['sendmail'] = false;


/**
 * only SSL
 */
if ( false === is_ssl() ) {
    $sm_response['error'] = [
        'code' => 403,
        'message' => 'Forbidden - SSL required'
    ];

    json_response( $sm_response, 403 );
    exit;
}


/**
 * only GET
 */
if ( false === is_get() ) {
    $sm_response['error'] = [
        'status' => 415,
        'message' => 'Unsupported Media Type - only GET requests'
    ];

    json_response( $sm_response, 415 );
    exit;
}


/**
 * check bearer token
 */
if ( false === check_bearer_token( SM_BEARER_TOKEN_HASH ) ) {
    $sm_response['error'] = [
        'status' => 401,
        'message' => 'Unauthorized - wrong/missing token'
    ];

    json_response( $sm_response, 401 );
    exit;
}


/**
 * PHP Mailer Settings
 */
add_action( 'phpmailer_init', 'sm_phpmailer_init' );
function sm_phpmailer_init( $phpmailer ) {
    global $sm_mail_from;
    global $sm_mail_from_name;
    global $sm_mail_reply_to;
    global $sm_mail_reply_to_name;

    $phpmailer->From = $sm_mail_from;
    $phpmailer->FromName = $sm_mail_from_name;
    $phpmailer->addReplyTo( $sm_mail_reply_to, $sm_mail_reply_to_name );

    // check if there's a pdf content which can be added as an attachment to the email
    global $sm_pdf_content;
    global $sm_file_name;

    if ( false === is_null( $sm_pdf_content ) )
        $phpmailer->AddStringAttachment($sm_pdf_content, $sm_file_name, 'base64', 'application/pdf');
}


/**
 * always enable html in message suppport
 */
$sm_mail_headers[] = 'Content-Type: text/html; charset=UTF-8';

/**
 * the mail template adds the message for the mail function
 * * it will overwrite the message and it does not check if
 * * something already in it
 */
if ( false === empty( $sm_template ) && false === is_null( $sm_template ) ) {
    if ( true === email_template_exists( $sm_template ) ) {
        require __DIR__ . '/templates/' . $sm_template . '.temp.php';
        $sm_mail_message = $sm_mail_content;
    }
    else {
        $sm_response['error'] = [
            'status' => 400,
            'message' => 'Bad Request - the template parameter is empty or invalid'
        ];
    
        json_response( $sm_response, 400 );
        exit;
    }
}


/**
 * check the required mail parameters
 */
if (
    ( true === empty( $sm_mail_to ) ) ||
    ( true === empty( $sm_mail_subject ) ) ||
    ( true === empty( $sm_mail_message ) )
) {
    $sm_response['error'] = [
        'status' => 400,
        'message' => 'Bad Request - one or more parameter is missing'
    ];

    json_response( $sm_response, 400 );
    exit;
}


/**
 * if all required parameters are there
 * we can know send the mail via the wp_mail
 * function from wordpress
 */
$wp_mail_sendmail = wp_mail( $sm_mail_to, $sm_mail_subject, $sm_mail_message, $sm_mail_headers, $sm_mail_attachments );


// set response based on the result if the mail was semantically correct
if ( true === $wp_mail_sendmail ) {
    $sm_response['sendmail'] = true;

    json_response( $sm_response );
}
else {
    $sm_response['error'] = [
        'status' => 400,
        'message' => 'Bad Request - mail was not successfully accepted for delivery'
    ];

    json_response($sm_response, 400);
}


exit;

echo 'You passed all three requirements :)';
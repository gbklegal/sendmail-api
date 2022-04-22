<?php

// abort direct access
defined('ABSPATH') or exit;

/**
 * How to get Bearer Token
 * 
 * @see https://gist.github.com/wildiney/b0be69ff9960642b4f7d3ec2ff3ffb0b/
 * 
 * Functions:
 * - get_authorization_header
 * - get_bearer_token
 */

/** 
 * get header authorization
 */
function get_authorization_header() {
    $headers = null;
    if (isset($_SERVER['Authorization'])) {
        $headers = trim($_SERVER["Authorization"]);
    }
    else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { // Nginx or fast CGI
        $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
    } 
    else if (function_exists('apache_request_headers')) {
        $requestHeaders = apache_request_headers();
        // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
        $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
        // print_r($requestHeaders);
        if (isset($requestHeaders['Authorization'])) {
            $headers = trim($requestHeaders['Authorization']);
        }
    }

    return $headers;
}

/**
 * get access token from header
 * 
 * @return string|null
 */
function get_bearer_token():?string {
    $headers = get_authorization_header();
    // HEADER: Get the access token from the header
    if (!empty($headers)) {
        if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
            return $matches[1];
        }
    }

    return null;
}



/**
 * UTILITES
 */


/**
 * check if the current request is a GET request
 * 
 * @return bool
 */
function is_get():bool {
    $request_method = $_SERVER['REQUEST_METHOD'];

    if ($request_method === 'GET')
        return true;

    return false;
}


/**
 * automatically sets the header for json content type
 * and returns response array into a json format
 * 
 * @param array $response
 * @param int $response_code - optional (Default: 200)
 * 
 * @return void
 */
function json_response( array $response, int $response_code = 200 ):void {
    header('Content-Type: application/json');

    http_response_code($response_code);

    echo json_encode($response);
}


/**
 * check bearer token combined with an if statement
 * with the get_bearer_token function
 * 
 * @param string|null $bearer_token_hash - optional
 * 
 * @return bool
 */
function check_bearer_token( ?string $bearer_token_hash = null ):bool {
    $hashed_bearer_token = hash('sha256', get_bearer_token());

    if ($hashed_bearer_token === $bearer_token_hash)
        return true;

    return false;
}


/**
 * check if the api key matches
 * 
 * @param string|null $api_key - optional
 * 
 * @return bool
 */
function check_api_key( ?string $api_key = null ):bool {
    // if (SM_API_KEY === $api_key)
    $hashed_api_key = hash('sha256', $api_key);

    if ($hashed_api_key === SM_API_KEY_HASH)
        return true;

    return false;
}


/**
 * @param float $price
 * @param string $currency - optional
 * 
 * @return string
 */
function format_price( $price, string $currency = '' ):string {
    if ( true === is_string( $price ) )
        return '';

    $currency = !empty( $currency ) ? ' ' . $currency : $currency;

    return number_format( $price, 2, ',', '.' ) . $currency;
}


/**
 * get preformatted current date
 * 
 * @param string $format - optional
 * 
 * @return string
 */
function get_current_date( string $format = 'd.m.Y' ):string {
    return date( $format );
}


/**
 * TODO: write a better description
 * salutation addition function
 * 
 * @param string $salutation - optional
 * 
 * @return string
 */
function salutation_addition( string $salutation = '' ):string {
    $salutation = strtolower( $salutation );

    if ($salutation === 'frau')
        return '';

    if ($salutation === 'herr')
        return 'r';

    return '/r';
}

/**
 * salutation function
 * 
 * @param string $salutation - optional
 * @param string $last_name - optional
 * 
 * @return string
 */
function salutation( string $saluation = '', string $last_name = '' ):string {
    return 'Sehr geehrte' . salutation_addition( $saluation ) . ' ' . adjust_salutation( $saluation, true ) . "{$last_name},";
}

/**
 * This will prevent the salutation 'Sonstige',
 * 'Divers' or 'Keine Angabe' to be shown.
 * 
 * @param string $salutation - optional
 * @param bool $whitespace - optional
 * 
 * @return string
 */
function adjust_salutation( string $salutation = '', bool $whitespace = false ):string {
    $salutation_lower = strtolower( $salutation );
    $salutation = ucfirst( $salutation );

    if ( true === $whitespace )
        $salutation .= ' ';

    if ( $salutation_lower === 'herr' || $salutation_lower === 'frau' )
        return $salutation;

    return '';
}


/**
 * check if the email template is in the email templates list
 * 
 * @param string $email_template
 * 
 * @return bool
 */
function email_template_exists( string $email_template = '' ):bool {
    global $sm_email_templates;

    return in_array( $email_template, $sm_email_templates );
}


/**
 * ! ONLY USE IN DEV ENV.
 * 
 * @param array $items
 * 
 * @return void
 */
function demo_page( $items ):void {
    $items = (array) $items;

    echo '<pre>';
    foreach ($items as $key => $item) {
        echo "<code>{$key}:</code>" . PHP_EOL;
        if (is_array($item))
            echo print_r($item, true);
        else
            echo $item;

        echo PHP_EOL . PHP_EOL;
    }
    echo '</pre>';
}


/**
 * utility function to not have to use the global keyword every time
 * 
 * @return array
 */
function get_mail_related_parameters():array {
    global $sm_mail_related_parameters;
    return $sm_mail_related_parameters;
}


/**
 * removes all mail related parameter from query string
 * 
 * @param string $query_string
 * @param bool $http_query_build - optional
 * 
 * @return array|string
 */
function remove_mail_related_parameters( string $query_string, bool $http_query_build = false ) {
    parse_str( $query_string, $query_string_array );

    foreach( get_mail_related_parameters() as $parameter ) {
        unset( $query_string_array[$parameter] );
    }

    if ( true === $http_query_build )
        return http_build_query( $query_string_array );

    return $query_string_array;
}


/**
 * checks if the array contains a mail related parameter
 * 
 * @param array $array
 * 
 * @return bool
 */
function contains_mail_related_parameters( array $array ):bool {
    foreach( get_mail_related_parameters() as $key )
        if ( true === array_key_exists( $key, $array ) )
            return true;

    return false;
}


/**
 * adds an suffix only when the suffix not already exists
 * 
 * @param string $file_name
 * @param string $suffix
 * 
 * @return string
 */
function add_suffix( string $file_name, string $suffix ):string {
    $extension = pathinfo( $file_name )['extension'] ?? null;

    if ( true === is_null( $extension ) || $extension !== $suffix )
        return $file_name .= '.' . $suffix;

    return $file_name;
}
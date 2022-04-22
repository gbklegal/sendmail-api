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
 */
function get_bearer_token() {
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
 * check if the current request is a POST request
 * 
 * @return bool
 */
function is_post():bool {
    $request_method = $_SERVER['REQUEST_METHOD'];

    if ($request_method === 'POST')
        return true;

    return false;
}


/**
 * check if the current request is over http
 * 
 * @return bool
 */
function is_https():bool {
    $request_scheme = $_SERVER['REQUEST_SCHEME'] ?? parse_url($_SERVER['SCRIPT_URI'])['scheme'];

    if ($request_scheme === 'https')
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
 * check bearer token combines an if statement
 * with the get_bearer_token function
 * 
 * @param string|null $bearer_token_hash
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
 * @return bool
 */
function has_access():bool {
    return check_bearer_token( SENDMAIL_API_BEARER_TOKEN_HASH );
}
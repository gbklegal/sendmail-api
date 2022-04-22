<?php

/**
 * calculation functions for safetax
 */

/**
 * calculate the 20% fee from price
 * 
 * @param float $num
 * 
 * @return float
 */
function calc_safetax_fee( $num ) {
    return (float) $num * 0.2;
}

/**
 * calculate the 19% Value-added tax from safetax price
 * 
 * @param float $num
 * 
 * @return float
 */
function calc_safetax_vat( $num ) {
    return (float) $num * 0.19;
}

/**
 * simplfy price calculation with fee and vat for safetax
 * 
 * @param float $price
 * @param bool $formatted - optional
 * @param string $currency - optional
 * 
 * @return array
 */
function calc_safetax_price( $price, bool $formatted = false, string $currency = '' ):array {
    $fee = calc_safetax_fee( $price );
    $vat = calc_safetax_vat( $fee );
    $total = $fee + $vat;

    if ( true === $formatted )
        return [
            format_price( $price, $currency ),
            format_price( $fee, $currency ),
            format_price( $vat, $currency ),
            format_price( $total, $currency )
        ];

    return [
        $price,
        $fee,
        $vat,
        $total
    ];
}


/**
 * calculation functions based on a total price
 */

/**
 * calculate the fee from the total price
 * 
 * @param float $total
 * 
 * @return float
 */
function calc_fee( $total ) {
    return (float) $total / 1.19;
}

/**
 * calculate the 19% Value-added tax from the fee
 */
function calc_vat( $fee ) {
    return (float) $fee * 0.19;
}

/**
 * simplfy price calculation with fee and vat from total
 * 
 * @param float $total
 * @param bool $formatted - optional
 * @param string $currency - optional
 * 
 * @return array
 */
function calc_fee_vat( $total, bool $formatted = false, string $currency = '' ):array {
    $fee = calc_fee( $total );
    $vat = calc_vat( $fee );

    if ( true === $formatted )
        return [
            format_price( $fee, $currency ),
            format_price( $vat, $currency ),
            format_price( $total, $currency )
        ];

    return [
        $fee,
        $vat,
        $total
    ];
}


/**
 * checks if given total price is in the total prices list
 * 
 * @param int $total_price - optional
 * 
 * @return bool
 */
function total_price_exists( int $total_price = 0 ):bool {
    global $sm_total_prices;

    return in_array( $total_price, $sm_total_prices );
}


/**
 * checks if given pdf template is in the pdf templates list
 * 
 * @param string $pdf_template - optional
 * 
 * @return bool
 */
function pdf_template_exists( string $pdf_template = '' ):bool {
    global $sm_pdf_templates;

    return in_array( $pdf_template, $sm_pdf_templates );
}
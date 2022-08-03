<?php

// Abort on direct call.
defined('ABSPATH') or exit;

// include the library via autoload
require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/functions.php';

use Spipu\Html2Pdf\Html2Pdf;

/**
 * @see 
 */
ob_start();

$sm_template_pdf_name = 'empty';

if ( pdf_template_exists( $sm_template_pdf ) ) {
    if (
        $sm_template_pdf === 'steuererklaerung' ||
        $sm_template_pdf === 'erstberatung' ||
        $sm_template_pdf === 'beratung-flat'
    ) {
        $sm_template_pdf_name = 'steuererklaerung-erstberatung';
        $sm_pdf_margins = [25, 15, 25, 15];
    }
    else if ( $sm_template_pdf === 'safetax' ) {
        $sm_pdf_margins = [20, 15, 20, 3];
        $sm_template_pdf_name = $sm_template_pdf;
    }

    $sm_template_pdf_name .= '-rechnung';
}

require __DIR__ . "/templates/$sm_template_pdf_name.temp.php";

$sm_content = ob_get_clean();


$sm_html2pdf = new Html2Pdf('P', 'A4', 'de', true, 'UTF-8', $sm_pdf_margins);

// $sm_html2pdf->setModeDebug(); // Dev only

$sm_html2pdf->setDefaultFont('Arial');
$sm_html2pdf->writeHTML($sm_content);


/**
 * if query string does not contain a mail related parameter
 * show the pdf and abort the sendmail process
 */
if ( false === contains_mail_related_parameters( $sm_query_string_array ) ) {

    $sm_html2pdf->output($sm_file_name);

    exit;
}


$sm_pdf_content = $sm_html2pdf->output($sm_file_name, 'S');

$sm_response['pdf'] = [
    'url' => $sm_url . '?' . remove_mail_related_parameters( $sm_query_string, true ),
    'file_name' => $sm_file_name
];


// DEV SECTION -- START --
// header('Content-Type: application/pdf');
// echo $pdf_output = $sm_html2pdf->output($_demo_invoice_path, 'D');
// $sm_pdf_content_s = $sm_html2pdf->output($sm_file_name, 'S'); // E | S
// $sm_pdf_content_e = $sm_html2pdf->output($sm_file_name, 'E'); // E | S
// echo $sm_pdf_content;
// D: send to the browser and force a file download with the name given by name.
// S: return the document as a string (name is ignored).
// @see https://github.com/spipu/sm_html2pdf/blob/master/doc/output.md
// DEV SECTION -- END --
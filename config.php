<?php

// abort direct access
defined('ABSPATH') or exit;

/**
 * bearer token hash
 */
define('SM_BEARER_TOKEN_HASH', '7f20769aaa89968d3478eed6bff1981faaa403500983e2c0e10b074011cc18be');

/**
 * api key hash
 */
define('SM_API_KEY_HASH', 'f8dccbbd85275fc909ec538183c3071c6afcd39d40423b605260d319ed86b69f');

/**
 * neccessary dir constants
 */
define('SM_INVOICES_DIR', __DIR__ . '/invoices');
define('SM_PDF_DIR', __DIR__ . '/pdf');
define('SM_PDF_TEMPLATES_DIR', __DIR__ . '/pdf/templates');
define('SM_TEMPLATES_DIR', __DIR__ . '/templates');


/**
 * list of all total prices
 * this prevents false prices
 */
$sm_total_prices = [
    25,
    39,
    89,
    99,
    129,
    169,
    189,
    229,
    299,
    319,
    369,
    429
];

/**
 * list of total prices with there basis
 */
$sm_total_prices_basis = [
    89 => 8000,
    99 => 16000,
    129 => 25000,
    169 => 37000,
    189 => 50000,
    229 => 80000,
    299 => 110000,
    319 => 150000,
    369 => 200000,
    429 => 250000
];

/**
 * all available pdf templates
 */
$sm_pdf_templates = [
    'safetax',
    'steuererklaerung',
    'erstberatung',
    'erstberatung-flat'
];

/**
 * all available email templates
 */
$sm_email_templates = [
    'beratung-flat',
    'email-verification',
    'safetax',
    'steuereasy',
    'steuererklaerung-anfechtung-rechnung',
    'steuererklaerung-anfechtung',
    'steuererklaerung-rechnung',
    'steuererklaerung'
];

/**
 * all email related parameters
 */
$sm_mail_related_parameters = [
    'to',
    'subject',
    'message',
    'template',
    'from',
    'from_name',
    'reply_to',
    'reply_to_name'
];


/**
 * mail attachment variables
 */
$sm_attachment_checklist = WP_CONTENT_DIR . '/uploads/2022/04/steuermachenCheckliste.pdf';
$sm_attachment_checklist_safetax = WP_CONTENT_DIR . '/uploads/2022/04/safeTaxCheckliste.pdf';
$sm_attachment_agb = WP_CONTENT_DIR . '/uploads/2021/01/AGBSteuerkanzleiGussmann012021.pdf';
$sm_attachment_agb_gdf = WP_CONTENT_DIR . '/uploads/2022/04/AGB-steuermachen-GDF-022022.pdf';
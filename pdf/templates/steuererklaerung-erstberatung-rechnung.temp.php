<?php

if ( true === str_starts_with( $sm_template_pdf, 'erstberatung' ) )
    $sm_fee_description = ', Gebühr gemäß Preisliste, § 612 II BGB';


if ( $sm_template_pdf === 'erstberatung' ) {
    $sm_fee_description_pre = 'Erstberatung';
    $sm_price_total = 25;
}
else if ( $sm_template_pdf === 'beratung-flat' ) {
    $sm_fee_description_pre = 'Beratung-Flat; digitale Belegsammlung';
    $sm_price_total = 39;
}
else if ( $sm_template_pdf === 'steuererklaerung' ) {
    $sm_fee_description = 'Einkommensteuererkl. VZ 20 ohne Einkunftserm., gem. Preisliste wie vereinbart, Grundlage: bis ' . format_price( $sm_total_prices_basis[$sm_price_total], '&euro;' );
    $sm_price_total = $sm_price_total;
}

list($sm_fee, $sm_vat, $sm_price_total) = calc_fee_vat( $sm_price_total, true );

?>

<style>
<?php include SM_PDF_DIR . '/css/default.css'; ?>
<?php include SM_PDF_DIR . '/css/steuererklaerung-erstberatung-rechnung.css'; ?>
</style>

<page>

    <div class="mb-5">
        <img id="logo" src="<?php echo SM_PDF_DIR . '/images/steuermachen-logo-remastered-medium.png'; ?>">
    </div>

    <div class="mb-7">
        <span class="size-8">steuermachen :: Kaiserstraße 23 :: 90403 Nürnberg</span>
    </div>

    <div class="mb-20">
        <table id="table-header">
            <tr>
                <td class="first">
                    <?php echo $sm_salutation_adjusted; ?><br>
                    <?php echo $sm_first_name; ?> <?php echo $sm_last_name; ?><br>
                    <?php echo $sm_street; ?> <?php echo $sm_house_number; ?><br>
                    <?php echo $sm_postcode; ?> <?php echo $sm_city; ?>
                </td>
                <td class="second size-8">
                    <div class="size-10"><br><br></div>
                    SB: RA Gussmann<br>
                    RE-Nr.: <?php echo $sm_invoice_number; ?><br>
                    Datum: <?php echo $sm_date; ?>
                </td>
            </tr>
        </table>
    </div>

    <div>
        <div class="font-bold">
            Rechnungsnummer: <?php echo $sm_invoice_number; ?><br>
            Auftragsnummer: <?php echo $sm_order_number; ?><br>
            Steuerjahr: <?php echo $sm_tax_year; ?>
        </div>
        <br>
        <br>
        <div><?php echo salutation( $sm_salutation, $sm_last_name ); ?></div>
        <br>
        <div>in vorbezeichneter Angelegenheit erlauben wir uns gemäß Vereinbarung wie folgt abzurechnen:</div>
        <br>
        <div class="font-bold">Leistungszeitraum <?php echo $sm_performance_period; ?>, RE-Nr.: <?php echo $sm_invoice_number; ?></div>
        <br>
        <table id="table-price">
            <tr>
                <td class="first"><?php echo $sm_fee_description_pre . $sm_fee_description; ?></td>
                <td class="second"></td>
                <td class="third"><?php echo $sm_fee; ?> EUR</td>
            </tr>
            <tr>
                <td class="first">19,00 % Umsatzsteuer</td>
                <td class="second"></td>
                <td class="third underline"><?php echo $sm_vat; ?> EUR</td>
            </tr>
            <tr class="font-bold">
                <td class="first">Endsumme</td>
                <td class="second"></td>
                <td class="third double-underline"><?php echo $sm_price_total; ?> EUR</td>
            </tr>
        </table>
        <br><br>
        <div>Bitte zahlen Sie den Betrag unter <span class="font-bold">Angabe der Rechnungsnummer</span> auf unsere unten angegebene Bankverbindung:</div>
        <br>
        <div class="font-bold">GDF GmbH, Sparkasse Nürnberg, IBAN: DE04 7605 0101 0012 9619 75</div>
        <br>
        <div class="size-8">Hinweis: Der Betrag ist sofort zur Zahlung fällig. Nehmen Sie diese Rechnung bitte zu Ihren Steuerunterlagen, da unter bestimmten Voraussetzungen ein steuerrechtlicher Abzug erfolgen kann. Informieren Sie dazu Ihren steuerrechtlichen Berater. Wir danken für Ihre Mandatierung.</div>
        <br><br>
        <div>Mit freundlichen Grüßen</div>
        <br><br><br><br>
        <div>
            Tobias Gussmann<br>
            Rechtsanwalt<br>
            Fachanwalt für Steuerrecht
        </div>
        <div class="test-bg">
            <img id="signature" src="<?php echo SM_PDF_DIR . '/images/tobias-gussmann-unterschrift.png'; ?>">
        </div>
    </div>

    <page_footer class="size-8">
        <table id="footer-table">
            <tr>
                <td class="first">Kanzlei Gussmann</td>
                <td>Telefon: 0911/801 90 910</td>
            </tr>
            <tr>
                <td class="first">Kaiserstraße 23</td>
                <td>Telefax: 0911/801 90 911</td>
            </tr>
            <tr>
                <td class="first">90403 Nürnberg</td>
                <td>E-Mail: dialog@steuermachen.de</td>
            </tr>
            <tr>
                <td class="first">USt-Nr. 238/223/80646</td>
                <td>www.steuermachen.de</td>
            </tr>
        </table>
    </page_footer>

</page>
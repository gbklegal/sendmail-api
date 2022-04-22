<?php

$sm_performance_period = 'Beauftragung bis Status Steuererstattung';

list( $sm_price, $sm_fee, $sm_vat, $sm_total ) = calc_safetax_price( $sm_price, true );

?>

<style>
<?php include SM_PDF_DIR . '/css/default.css'; ?>
<?php include SM_PDF_DIR . '/css/safetax-rechnung.css'; ?>
</style>

<page backleft="5mm">

    <table class="w-page" id="table-header">
        <tr>
            <td class="first">
                <img id="logo" src="<?php echo SM_PDF_DIR . '/images/steuermachen-logo-remastered-medium.png'; ?>">
            </td>

            <td>
                <div class="size-10">
                    GDF GmbH<br>
                    Kaiserstraße 23<br>
                    90403 Nürnberg<br><br>
                    Fon&nbsp;&nbsp;+49 911 801 90 910<br>
                    Fax&nbsp;&nbsp;+49 911 801 90 911
                </div>
            </td>
        </tr>
    </table>

    <div class="mb-7">
        <span class="size-8">GDF GmbH - Kaiserstraße 23 - 90403 Nürnberg</span>
    </div>

    <div class="mb-20">
        <?php echo $sm_first_name; ?> <?php echo $sm_last_name; ?><br>
        <?php echo $sm_street; ?> <?php echo $sm_house_number; ?><br>
        <?php echo $sm_postcode; ?> <?php echo $sm_city; ?>
    </div>

    <div class="mb-7 text-right">
        <span>Datum: <?php echo $sm_date; ?></span>
    </div>

    <div>
        <div class="font-bold">Kostenrechnung<br>
        - Rechnung -<br>
        Rechnungsnummer: <?php echo $sm_invoice_number; ?><br>
        Leistungszeitraum: <?php echo $sm_performance_period; ?></div>
        <br>
        <div><?php echo salutation( $sm_salutation, $sm_last_name ); ?></div>
        <br>
        <div>wir bedanken uns für den erteilten Auftrag und erlauben uns entsprechend unserer Vereinbarung wie folgt abzurechnen:</div>
        <br>
        <table id="table-price">
            <tr>
                <td class="first">safeTax; Gebühr 20% aus <?php echo $sm_price; ?> EUR gemäß Preisliste, AGB</td>
                <td class="second"><?php echo $sm_fee; ?> EUR</td>
            </tr>
            <tr>
                <td class="first">19,00 % Umsatzsteuer</td>
                <td class="second underline"><?php echo $sm_vat; ?> EUR</td>
            </tr>
            <tr>
                <td class="first">Endsumme</td>
                <td class="second double-underline"><?php echo $sm_total; ?> EUR</td>
            </tr>
        </table>
        <br>
        <div>Bitte zahlen Sie den Betrag unter <span class="font-bold">Angabe der Rechnungsnummer</span> auf unsere unten angegebene Bankverbindung:</div>
        <br>
        <div class="font-bold">GDF GmbH, Sparkasse Nürnberg, IBAN: DE04 7605 0101 0012 9619 75</div>
        <br><br>
        <div>Der Betrag ist sofort zur Zahlung fällig.</div>
        <br><br>
        <div>Mit freundlichen Grüßen</div>
        <br><br><br>
        <div>Buchhaltung<br>GDF GmbH</div>
        <br>
        <div class="size-7_5">Diese Rechnung ist ohne Unterschrift gültig, da sie automatisch generiert wurde.</div>
    </div>

    <!-- <div>
        <div class="inline-block underline">x,xx EUR</div>
        <div class="inline-block double-underline">x,xx EUR</div>
    </div> -->

    <page_footer class="text-center size-7_5">
        <hr>
        <span>Bankverbindung: Sparkasse Nürnberg - IBAN DE04 7605 0101 0012 9619 75 - BIC SSKNDE77XXX</span><br>
        <span>USt-IdNr: DE 308 255 440 - HRB Nürnberg 33156 - Geschäftsführer: Tobias Gußmann</span><br>
        <img id="logo_footer" src="<?php echo SM_PDF_DIR . '/images/gdf-gmbh_4x_cropped.jpg'; ?>">
    </page_footer>

</page>
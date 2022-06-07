<?php

/**
 * Template Details
 * 
 * Name: Steuererklärung
 * 
 * Parameters (Variables):
 * - salutation
 * - last_name
 * ! - order_number
 * ! - order_date
 * ! - order_from
 * ! - first_name
 * ! - street
 * ! - house_number
 * ! - postcode
 * ! - city
 * ! - email
 * ! - phone
 * ! - marital_status
 * ! - tax_year
 */

$sm_mail_attachments[] = $sm_attachment_checklist;
$sm_mail_attachments[] = $sm_attachment_agb;


$sm_mail_content = '<!DOCTYPE html>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">

<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
	<!--[if !mso]><!-->
	<link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	<!--<![endif]-->
	<style>
		* {
			box-sizing: border-box;
		}

		body {
			margin: 0;
			padding: 0;
		}

		a[x-apple-data-detectors] {
			color: inherit !important;
			text-decoration: inherit !important;
		}

		#MessageViewBody a {
			color: inherit;
			text-decoration: none;
		}

		p {
			line-height: inherit
		}

		@media (max-width:920px) {
			.row-content {
				width: 100% !important;
			}

			.stack .column {
				width: 100%;
				display: block;
			}
		}
	</style>
</head>

<body style="background-color: #FFFFFF; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
	<table class="nl-container" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF;">
		<tbody>
			<tr>
				<td>
					<table class="row row-1" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 900px;" width="900">
										<tbody>
											<tr>
												<td class="column" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
													<table class="image_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
														<tr>
															<td style="width:100%;padding-right:0px;padding-left:0px;">
																<div align="center" style="line-height:10px"><img src="https://d15k2d11r6t6rl.cloudfront.net/public/users/Integrators/BeeProAgency/629225_611187/image%20%2816%29_1.png" style="display: block; height: auto; border: 0; width: 450px; max-width: 100%;" width="450"></div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class="row row-2" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 900px;" width="900">
										<tbody>
											<tr>
												<td class="column" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
													<table class="text_block" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
														<tr>
															<td>
																<div style="font-family: Arial, sans-serif">
																	<div style="font-size: 14px; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2;">
																		<p style="margin: 0; mso-line-height-alt: 16.8px;">&nbsp;</p>
																		<p style="margin: 0;"><span style="background-color:#ffffff;color:#000000;"><strong><span style="font-size:22px;background-color:#ffffff;">Vielen Dank für Ihren Auftrag. </span></strong></span></p>
																		<p style="margin: 0;"><span style="background-color:#ffffff;color:#000000;"><strong><span style="font-size:22px;background-color:#ffffff;">Nur noch wenige Schritte bis zu Ihrer fertigen Steuererklärung!</span></strong></span></p>
																		<p style="margin: 0; mso-line-height-alt: 16.8px;">&nbsp;</p>
																		<p style="margin: 0; mso-line-height-alt: 16.8px;">&nbsp;</p>
																		<p style="margin: 0;">' . salutation( $sm_salutation, $sm_last_name ) . '</p>
																		<p style="margin: 0; mso-line-height-alt: 16.8px;">&nbsp;</p>
																		<p style="margin: 0;">Ihre Beauftragung ist bei uns eingegangen und wird nun schnellstmöglich bearbeitet. Wir danken Ihnen für Ihr Vertrauen!</p>
																		<p style="margin: 0; mso-line-height-alt: 16.8px;">&nbsp;</p>
																		<p style="margin: 0;">Im Anhang dieser E-Mail erhalten Sie:</p>
																		<p style="margin: 0; mso-line-height-alt: 16.8px;">&nbsp;</p>
																		<p style="margin: 0; text-align: left; margin-left: 40px;"><strong>&nbsp;&gt; Ihre Steuercheckliste</strong></p>
																		<p style="margin: 0; mso-line-height-alt: 16.8px;">&nbsp;</p>
																		<p style="margin: 0;">Bitte senden Sie Ihre relevanten Steuerunterlagen umgehend per <a href="mailto:dialog@steuermachen.de" target="_blank" title="dialog@steuermachen.de" style="text-decoration: underline; color: #ff6138;" rel="noopener">E-Mail</a>, Fax oder per Post an unsere nachfolgende Postanschrift:</p>
																		<p style="margin: 0; margin-left: 40px; mso-line-height-alt: 16.8px;">&nbsp;</p>
																		<p style="margin: 0; text-align: left; margin-left: 40px;">steuermachen<br>Kaiserstr. 23<br>90403 Nürnberg<br>Telefax: 0911 - 801 90 911</p>
																		<p style="margin: 0; mso-line-height-alt: 16.8px;">&nbsp;</p>
																		<p style="margin: 0;"><strong>Damit Ihre Erklärung noch schneller bearbeitet wird, senden Sie uns die </strong><strong>Unterlagen vorzugsweise per E-Mail. </strong></p>
																		<p style="margin: 0; mso-line-height-alt: 16.8px;">&nbsp;</p>
																		<p style="margin: 0; margin-left: 40px;"><strong>E-Mail: <a href="mailto:dialog@steuermachen.de" style="color: #ff6138;">dialog@steuermachen.de</a></strong></p>
																		<p style="margin: 0; mso-line-height-alt: 16.8px;">&nbsp;</p>
																		<p style="margin: 0;">oder laden Sie diese einfach in der steuermachen-App hoch.</p>
																		<p style="margin: 0; mso-line-height-alt: 16.8px;">&nbsp;</p>
																		<p style="margin: 0;">Die Bestellung wurde an Ihre Steuerkanzlei weitergeleitet.</p>
																		<p style="margin: 0; mso-line-height-alt: 16.8px;">&nbsp;</p>
																		<p style="margin: 0;">Ihre Rechnung zu Ihrem Auftrag senden wir Ihnen in Kürze in einer separaten E-Mail zu. Sie können diese auch jederzeit auf Ihrem Profil in der steuermachen-App aufrufen.&nbsp;</p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class="row row-3" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 900px;" width="900">
										<tbody>
											<tr>
												<td class="column" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
													<table class="text_block" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
														<tr>
															<td>
																<div style="font-family: Arial, sans-serif">
																	<div style="font-size: 14px; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2;">
																		<p style="margin: 0; font-size: 14px; mso-line-height-alt: 16.8px;">&nbsp;</p>
																		<p style="margin: 0; font-size: 14px;">Mit freundlichen Grüßen</p>
																		<p style="margin: 0; font-size: 14px; mso-line-height-alt: 16.8px;">&nbsp;</p>
																		<p style="margin: 0; font-size: 14px;">Ihr Team von steuermachen</p>
																		<p style="margin: 0; font-size: 14px;"><a href="https://steuermachen.de" target="_blank" style="text-decoration: underline; color: #ff6138;" rel="noopener">www.steuermachen.de</a></p>
																		<p style="margin: 0; font-size: 14px; mso-line-height-alt: 16.8px;">&nbsp;</p>
																		<p style="margin: 0; font-size: 14px;">GDF GmbH<br>Kaiserstraße 23<br>90403 Nürnberg<br>Fon: 0911-80190910</p>
																		<p style="margin: 0; font-size: 14px;">E-Mail: <a href="mailto:dialog@steuermachen.de" target="_self" title="dialog@steuermachen.de" style="text-decoration: underline; color: #ff6138;">dialog@steuermachen.de</a></p>
																		<p style="margin: 0; font-size: 14px;"><span style="font-size:14px;">Die GDF GmbH ist eingetragen im Handelsregister: AG Nürnberg - HRA 33156,</span></p>
																		<p style="margin: 0; font-size: 14px;"><span style="font-size:14px;">Geschäftsführer: Tobias Gussmann</span></p>
																		<p style="margin: 0; font-size: 14px; mso-line-height-alt: 16.8px;">&nbsp;</p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
													<table class="divider_block" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
														<tr>
															<td>
																<div align="center">
																	<table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																		<tr>
																			<td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 1px solid #BBBBBB;"><span>&#8202;</span></td>
																		</tr>
																	</table>
																</div>
															</td>
														</tr>
													</table>';
													// <table class="text_block" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
													// 	<tr>
													// 		<td>
													// 			<div style="font-family: sans-serif">
													// 				<div style="font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
													// 					<p style="margin: 0; mso-line-height-alt: 16.8px;">&nbsp;</p>
													// 					<p style="margin: 0;"><strong>Sie haben bei der Beauftragung folgende Angaben gemacht:</strong></p>
													// 					<p style="margin: 0; mso-line-height-alt: 16.8px;">&nbsp;</p>
													// 					<p style="margin: 0;">Bestellung bei steuermachen.de Auftrags-Nr: ' . $sm_order_number . '</p>
													// 					<p style="margin: 0;">Bestelldatum: ' . $sm_order_date . '</p>
													// 					<p style="margin: 0;">Bestellung von: ' . $sm_order_from . '</p>
													// 					<p style="margin: 0; mso-line-height-alt: 16.8px;">&nbsp;</p>
													// 					<p style="margin: 0;">Daten zur Beauftragung:</p>
													// 					<p style="margin: 0;">' . adjust_salutation( $sm_salutation, true ) . $sm_first_name . ' ' . $sm_last_name . '</p>
													// 					<p style="margin: 0; mso-line-height-alt: 16.8px;">&nbsp;</p>
													// 					<p style="margin: 0;">Adresse:</p>
													// 					<p style="margin: 0;">' . $sm_street . ' ' . $sm_house_number . '</p>
													// 					<p style="margin: 0;">' . $sm_postcode . ' ' . $sm_city . '</p>
                                                    //                     <p style="margin: 0; mso-line-height-alt: 16.8px;">&nbsp;</p>
													// 					<p style="margin: 0;">Kontaktdaten:</p>
													// 					<p style="margin: 0;">' . $sm_email . '</p>
													// 					<p style="margin: 0;">' . $sm_phone . '</p>
                                                    //                     <p style="margin: 0; mso-line-height-alt: 16.8px;">&nbsp;</p>
													// 					<p style="margin: 0;">Familienstand: ' . $sm_marital_status . '</p>
                                                    //                     <p style="margin: 0; mso-line-height-alt: 16.8px;">&nbsp;</p>
													// 					<p style="margin: 0;">Steuerjahr: ' . $sm_tax_year . '</p>
													// 					<p style="margin: 0; mso-line-height-alt: 16.8px;">&nbsp;</p>
													// 					<p style="margin: 0; mso-line-height-alt: 16.8px;">&nbsp;</p>
													// 				</div>
													// 			</div>
													// 		</td>
													// 	</tr>
													// </table>
												$sm_mail_content .= '</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class="row row-4" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #71d64a;">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; background-color: #71d64a; width: 900px;" width="900">
										<tbody>
											<tr>
												<td class="column" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
													<table class="text_block" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
														<tr>
															<td>
																<div style="font-family: sans-serif">
																	<div style="font-size: 12px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #555555; line-height: 1.2;">
																		<p style="margin: 0; text-align: center;"><a href="https://steuermachen.de/" target="_blank" style="text-decoration: underline;" rel="noopener">www.steuermachen.de</a></p>
																		<p style="margin: 0; text-align: center; mso-line-height-alt: 14.399999999999999px;">&nbsp;</p>
																		<p style="margin: 0; font-size: 14px; text-align: center;">Ihre Steuererklärung in guten Händen</p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
													<table class="social_block" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
														<tr>
															<td>
																<table class="social-table" width="108px" border="0" cellpadding="0" cellspacing="0" role="presentation" align="center" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																	<tr>
																		<td style="padding:0 2px 0 2px;"><a href="https://www.facebook.com/steuermachen.de" target="_blank"><img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/circle-color/facebook@2x.png" width="32" height="32" alt="Facebook" title="facebook" style="display: block; height: auto; border: 0;"></a></td>
																		<td style="padding:0 2px 0 2px;"><a href="https://www.linkedin.com/" target="_blank"><img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/circle-color/linkedin@2x.png" width="32" height="32" alt="Linkedin" title="linkedin" style="display: block; height: auto; border: 0;"></a></td>
																		<td style="padding:0 2px 0 2px;"><a href="https://www.instagram.com/steuermachen.de/" target="_blank"><img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/circle-color/instagram@2x.png" width="32" height="32" alt="Instagram" title="instagram" style="display: block; height: auto; border: 0;"></a></td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class="row row-5" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 900px;" width="900">
										<tbody>
											<tr>
												<td class="column" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
													<table class="text_block" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
														<tr>
															<td>
																<div style="font-family: Arial, sans-serif">
																	<div style="font-size: 14px; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2;">
																		<p style="margin: 0;"><span style="font-size:10px;color:#727272;">Der Inhalt dieser E-Mail ist ausschließlich für den bezeichneten Adressaten oder dessen Vertreter bestimmt. Sofern diese E-Mail irrtümlich an einen falschen Empfänger versendet wurde, bitten wir diesen, sich mit dem Absender in Verbindung zu setzen und die E-Mail zu vernichten. Bitte beachten Sie, dass diese E-Mail vertraulich ist und gegebenenfalls rechtlich geschützte Information enthält, so dass jede Form der unerlaubten Kopie oder der unbefugten Weitergabe oder Veröffentlichung dieser E-Mail oder ihres Inhalts nicht gestattet ist.</span><br><span style="font-size:10px;color:#727272;">steuermachen ist ein Produkt der GDF GmbH. Die GDF GmbH ist eingetragen im Handelsregister: AG Nürnberg – HRB 33156, Geschäftsführer: Tobias Gußmann</span><br><br></p>
																		<p style="margin: 0; mso-line-height-alt: 16.8px;">&nbsp;</p>
																		<p style="margin: 0;"><strong>Sie haben noch weitere Steuererklärungen welche wir für Sie machen dürfen? Dann verschenken Sie keine Zeit und Geld und beauftragen gleich die weiteren Jahre!</strong></p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table><!-- End -->
</body>

</html>';
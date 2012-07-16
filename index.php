<?php

	$periods = array(
		array( 'label' => "Jour", 'value' => 365 ),
		array( 'label' => "Semaine", 'value' => 52 ),
		array( 'label' => "2 semaines", 'value' => 26 ),
		array( 'label' => "Mois", 'value' => 12 ),
		array( 'label' => "2 mois", 'value' => 6 ),
		array( 'label' => "3 mois", 'value' => 4 ),
		array( 'label' => "6 mois", 'value' => 2 ),
		array( 'label' => "Ann&eacute;e", 'value' => 1 )
	);
	
	$i = 0;

	function make_row($field, $class = null) {
		
		global $periods, $i;
		
		$field = array_merge( array(
			'amount' => '0.00',
			'period' => '12',
			'annual_total' => '$0.00',
			'percentage' => '0.0%'
		), $field );
		
	?>
		<tr class="field <?php echo $class; ?> <?php echo ( $i++ % 2 == 0 ) ? 'even' : 'odd'; ?>">
			<td class="label">
				<?php echo $field['label']; ?> <span class="description"><?php echo $field['description']; ?></span>
			</td>
			<td class="amount">
				<input type="text" value="<?php echo $field['amount']; ?>" />
			</td>
			<td class="period">
				<select>
					<?php foreach ( $periods as $option ) : ?>
						<option value="<?php echo $option['value']; ?>"<?php if ( $field['period'] == $option['value'] ) echo ' selected="selected"'; ?>>
							<?php echo $option['label']; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</td>
			<td class="annual-total">
				<?php echo $field['annual_total']; ?>
			</td>
			<td class="percentage">
				<?php echo $field['percentage']; ?>
			</td>
		</tr>
	<?php }

	$budget = array(
		'income' => array(
			'label' => "Revenus",
			'categories' => array(
				array(
					'label' => false,
					'fields' => array(
						array( 'label' => "R&eacute;mun&eacute;ration nette d'un emploi" ),
						array( 'label' => "Revenu net d'un travail autonome" ),
						array( 'label' => "Revenu d'appoint net", 'description' => "deuxi&egrave;me emploi, revenu secondaire" ),
						array( 'label' => "Commissions" ),
						array( 'label' => "Bonus", 'description' => "bonus et primes nets re&ccedil;us dans le cadre d'un emploi" ),
						array( 'label' => "Pourboires" ),
						array( 'label' => "Prestations gouvernementales" ),
						array( 'label' => "Bourses", 'description' => "bourse d'&eacute;tude, bourse au rendement, etc." ),
						array( 'label' => "Remboursement d'imp&ocirc;t", 'description' => "retour annuel d'imp&ocirc;t suite &agrave; la production de la d&eacute;claration de revenus" ),
						array( 'label' => "Remboursement de taxes de ventes" ),
						array( 'label' => "Revenus nets de location" ),
						array( 'label' => "Revenus de placements", 'description' => "revenus d'int&eacute;r&ecirc;ts, dividendes, gains en capital, etc." ),
						array( 'label' => "Autres revenus" )
					)
				),
				array(
					'label' => "Pension ou autres prestations nettes :",
					'fields' => array(
						array( 'label' => "Rentes", 'description' => "viag&egrave;res ou &agrave; &eacute;ch&eacute;ance fixe" ),
						array( 'label' => "Revenus de fonds enregistr&eacute;s de revenu de retraite (FERR)" ),
						array( 'label' => "R&eacute;gime de pension agr&eacute;&eacute; (caisse de retraite)" ),
						array( 'label' => "Rente de retraite de la R&eacute;gie des rentes du Qu&eacute;bec (RRQ) ou du R&eacute;gime de pensions du Canada (RPC)" ),
						array( 'label' => "Prestation fiscale pour enfants" ),
						array( 'label' => "Pension alimentaire" ),
						array( 'label' => "Aide sociale", 'description' => "secours financier pour une personne en difficult&eacute;" )
					)
				)
			)
		),
		'savings' => array(
			'label' => "&Eacute;pargne",
			'categories' => array(
				array(
					'label' => false,
					'fields' => array(
						array( 'label' => "R&eacute;serve pour impr&eacute;vus" ),
						array( 'label' => "&Eacute;conomies" ),
						array( 'label' => "&Eacute;pargne retraite" ),
						array( 'label' => "&Eacute;pargne habitation" ),
						array( 'label' => "&Eacute;pargne &eacute;tudes" ),
						array( 'label' => "Placements", 'description' => "CPG, fonds communs de placement, actions en bourse, etc." ),
						array( 'label' => "&Eacute;pargne vacances" ),
						array( 'label' => "&Eacute;pargne voyage" ),
						array( 'label' => "&Eacute;pargne voiture" ),
						array( 'label' => "Autres" )
					)
				)
			)
		),
		'spendings' => array(
			'label' => "D&eacute;penses",
			'categories' => array(
				array(
					'label' => "Habitation",
					'fields' => array(
						array( 'label' => "Loyer ou versement hypoth&eacute;caire" ),
						array( 'label' => "Taxes municipales" ),
						array( 'label' => "Taxes scolaires" ),
						array( 'label' => "Taxes d'eau" ),
						array( 'label' => "&Eacute;lectricit&eacute;" ),
						array( 'label' => "Chauffage" ),
						array( 'label' => "Syst&egrave;me d'alarme" ),
						array( 'label' => "Am&eacute;nagement et entretien" ),
						array( 'label' => "Assurance habitation" ),
						array( 'label' => "Perte de revenus locatifs" )
					)
				),
				array(
					'label' => "Assurances personnelles",
					'fields' => array(
						array( 'label' => "Assurance vie" ),
						array( 'label' => "Assurance invalidit&eacute;" ),
						array( 'label' => "Assurance maladie grave" ),
						array( 'label' => "Assurance accident" )
					)
				),
				array(
					'label' => "Transport",
					'fields' => array(
						array( 'label' => "Paiement automobile", 'description' => "paiement d'un pr&ecirc;t automobile ou de la location d'un v&eacute;hicule" ),
						array( 'label' => "Transport public", 'description' => "taxi, train, m&eacute;tro, autobus, etc." ),
						array( 'label' => "D&eacute;penses auto - Essence" ),
						array( 'label' => "D&eacute;penses auto - Entretiens et r&eacute;parations" ),
						array( 'label' => "Assurance auto" ),
						array( 'label' => "Stationnement" ),
						array( 'label' => "Immatriculation et permis de conduire" )
					)
				),
				array(
					'label' => "T&eacute;l&eacute;communications",
					'fields' => array(
						array( 'label' => "T&eacute;l&eacute;phone et interurbains", 'description' => "service de base et interurbains" ),
						array( 'label' => "T&eacute;l&eacute;phone cellulaire", 'description' => "forfait mensuel ou achats de services pr&eacute;pay&eacute;s" ),
						array( 'label' => "T&eacute;l&eacute;avertisseur" ),
						array( 'label' => "T&eacute;l&eacute;vision par c&acirc;ble ou par satellite", 'description' => "abonnement &agrave; la t&eacute;l&eacute;vision par c&acirc;ble, par satellite ou &agrave; des cha&icirc;nes sp&eacute;cialis&eacute;es" ),
						array( 'label' => "Internet" )
					)
				),
				array(
					'label' => "Alimentation",
					'fields' => array(
						array( 'label' => "&Eacute;picerie" ),
						array( 'label' => "Restaurant" )
					)
				),
				array(
					'label' => "Sant&eacute;",
					'fields' => array(
						array( 'label' => "Soins de sant&eacute;", 'description' => "soins m&eacute;dicaux, param&eacute;dicaux et dentaires, achat de lunettes, etc." ),
						array( 'label' => "Pharmacie", 'description' => "achat de m&eacute;dicaments etc." )
					)
				),
				array(
					'label' => "Loisirs et &eacute;ducation",
					'fields' => array(
						array( 'label' => "Frais de scolarit&eacute;", 'description' => "livres, mat&eacute;riel scolaire, activit&eacute;s parascolaires, frais de l'institution d'enseignement, etc." ),
						array( 'label' => "Sports et loisirs", 'description' => "passe-temps, spectacles, cin&eacute;ma, location de vid&eacute;os, livres et revues, &eacute;quipement de sports, etc." ),
						array( 'label' => "Vacances", 'description' => "avion, h&ocirc;tel, restaurant, &eacute;quipement, souvenirs, camping, assurance voyage, etc." ),
						array( 'label' => "Abonnements", 'description' => "journaux, revues, club sportif, etc." )
					)
				),
				array(
					'label' => "Remboursement d'emprunts",
					'fields' => array(
						array( 'label' => "Carte de cr&eacute;dit" ),
						array( 'label' => "Marge de cr&eacute;dit" ),
						array( 'label' => "Pr&ecirc;t personnel" ),
						array( 'label' => "Pr&ecirc;t &eacute;tudiant" ),
						array( 'label' => "Emprunt", 'description' => "ami ou parent" ),
						array( 'label' => "Autres emprunts", 'description' => "meubles, consolidation de dettes, etc." )
					)
				),
				array(
					'label' => "Autres d&eacute;penses",
					'fields' => array(
						array( 'label' => "V&ecirc;tements", 'description' => "chaussures, manteaux, habits de sports, etc." ),
						array( 'label' => "Frais de garde d'enfants" ),
						array( 'label' => "D&eacute;penses li&eacute;es aux enfants", 'description' => "argent de poche, si&egrave;ge d'auto, poussette, jouets, v&eacute;lo, patins, v&ecirc;tements, cours, etc." ),
						array( 'label' => "Soins personnels", 'description' => "coiffure et esth&eacute;tique" ),
						array( 'label' => "Frais financiers", 'description' => "forfait, frais de service, etc." ),
						array( 'label' => "D&eacute;penses personnelles" ),
						array( 'label' => "Dons de charit&eacute;" ),
						array( 'label' => "Cadeaux" ),
						array( 'label' => "Tabac" ),
						array( 'label' => "Boissons alcoolis&eacute;es", 'description' => "bi&egrave;re, vin, etc." )
					)
				)
			)
		)
	);

?>

<!doctype html>
<html>

	<head>
	
		<title>Online Budget Tool</title>
		
		<link rel='stylesheet' id='default-css' href='http://firecdn.net/libs/wpbp/css/default.css?ver=3.4.1' type='text/css' media='all' />
		<link rel='stylesheet' id='budget-css' href='budget.css' type='text/css' media='all' />
		
		<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js?ver=1.7.1'></script>
		<script type='text/javascript' src='budget.js'></script>
		
	</head>
	
	<body>
	
		<div id="budget-wrap">
	
			<h1>Budget en ligne</h1>
			
			<table width="100%" cellpadding="5" cellspacing="0" border="0">
			
				<thead>
				
					<th class="empty">&nbsp;</th>
					<th>Montant</th>
					<th>P&eacute;riode</th>
					<th>Montant annuel</th>
					<th>Pourcentage</th>
					
				</thead>
				
				<?php foreach ( $budget as $section_key => $section ) : ?>
					
					<tr class="section-title">
						<td class="section-label" colspan="5"><?php echo $section['label']; ?></td>
					</tr>
					
					<tbody id="<?php echo $section_key; ?>" class="section">

						<?php foreach ( $section['categories'] as $category ) : ?>
						
							<?php if ( $category['label'] ) : ?>
								
								<tr>
									<td class="category-label" colspan="5">
										<?php echo $category['label']; ?>
									</td>
								</tr>
								
								<?php foreach ( $category['fields'] as $field ) : ?>
									
									<?php make_row( $field, 'sub' ); ?>
									
								<?php endforeach; ?>
								
							<?php else : ?>
								
								<?php foreach ( $category['fields'] as $field ) : ?>
									
									<?php make_row( $field ); ?>
									
								<?php endforeach; ?>
								
							<?php endif; ?>
							
						<?php endforeach; ?>
						
						<tr class="total">
							<td class="label">Total</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td class="annual-total">0.00</td>
							<td>&nbsp;</td>
						</tr>
						
					</tbody>
					
				<?php endforeach; ?>
				
			</table>
		
		</div>
		
	</body>
	
</html>
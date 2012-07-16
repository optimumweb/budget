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
	?>
		<tr class="field <?php echo $class; ?> <?php echo ( $i++ % 2 == 0 ) ? 'even' : 'odd'; ?>">
			<td class="label">
				<?php echo $field['label']; ?> <span class="description"><?php echo $field['description']; ?></span>
			</td>
			<td class="amount">
				<input type="text" />
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
			<td class="annual-total"></td>
			<td class="percentage"></td>
		</tr>
	<?php }

	$budget = array(
		'income' => array(
			'label' => "Revenus",
			'categories' => array(
				array(
					'label' => false,
					'fields' => array(
						array( 'label' => "R&eacute;mun&eacute;ration nette d'un emploi", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Revenu net d'un travail autonome", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Revenu d'appoint net", 'description' => "deuxi&egrave;me emploi, revenu secondaire", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Commissions", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Bonus", 'description' => "bonus et primes nets re&ccedil;us dans le cadre d'un emploi", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Pourboires", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Prestations gouvernementales", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Bourses", 'description' => "bourse d'&eacute;tude, bourse au rendement, etc.", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Remboursement d'imp&ocirc;t", 'description' => "retour annuel d'imp&ocirc;t suite &agrave; la production de la d&eacute;claration de revenus", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Remboursement de taxes de ventes", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Revenus nets de location", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Revenus de placements", 'description' => "revenus d'int&eacute;r&ecirc;ts, dividendes, gains en capital, etc.", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Autres revenus", 'description' => "", 'amount' => 0, 'period' => 12 )
					)
				),
				array(
					'label' => "Pension ou autres prestations nettes :",
					'fields' => array(
						array( 'label' => "Rentes", 'description' => "viag&egrave;res ou &agrave; &eacute;ch&eacute;ance fixe", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Revenus de fonds enregistr&eacute;s de revenu de retraite (FERR)", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "R&eacute;gime de pension agr&eacute;&eacute; (caisse de retraite)", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Rente de retraite de la R&eacute;gie des rentes du Qu&eacute;bec (RRQ) ou du R&eacute;gime de pensions du Canada (RPC)", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Prestation fiscale pour enfants", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Pension alimentaire", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Aide sociale", 'description' => "secours financier pour une personne en difficult&eacute;", 'amount' => 0, 'period' => 12 )
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
						array( 'label' => "R&eacute;serve pour impr&eacute;vus", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "&Eacute;conomies", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "&Eacute;pargne retraite", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "&Eacute;pargne habitation", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "&Eacute;pargne &eacute;tudes", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Placements", 'description' => "CPG, fonds communs de placement, actions en bourse, etc.", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "&Eacute;pargne vacances", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "&Eacute;pargne voyage", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "&Eacute;pargne voiture", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Autres", 'description' => "", 'amount' => 0, 'period' => 12 )
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
						array( 'label' => "Loyer ou versement hypoth&eacute;caire", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Taxes municipales", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Taxes scolaires", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Taxes d'eau", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "&Eacute;lectricit&eacute;", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Chauffage", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Syst&egrave;me d'alarme", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Am&eacute;nagement et entretien", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Assurance habitation", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Perte de revenus locatifs", 'description' => "", 'amount' => 0, 'period' => 12 )
					)
				),
				array(
					'label' => "Assurances personnelles",
					'fields' => array(
						array( 'label' => "Assurance vie", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Assurance invalidit&eacute;", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Assurance maladie grave", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Assurance accident", 'description' => "", 'amount' => 0, 'period' => 12 )
					)
				),
				array(
					'label' => "Transport",
					'fields' => array(
						array( 'label' => "Paiement automobile", 'description' => "paiement d'un pr&ecirc;t automobile ou de la location d'un v&eacute;hicule", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Transport public", 'description' => "taxi, train, m&eacute;tro, autobus, etc.", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "D&eacute;penses auto - Essence", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "D&eacute;penses auto - Entretiens et r&eacute;parations", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Assurance auto", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Stationnement", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Immatriculation et permis de conduire", 'description' => "", 'amount' => 0, 'period' => 12 )
					)
				),
				array(
					'label' => "T&eacute;l&eacute;communications",
					'fields' => array(
						array( 'label' => "T&eacute;l&eacute;phone et interurbains", 'description' => "service de base et interurbains", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "T&eacute;l&eacute;phone cellulaire", 'description' => "forfait mensuel ou achats de services pr&eacute;pay&eacute;s", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "T&eacute;l&eacute;avertisseur", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "T&eacute;l&eacute;vision par c&acirc;ble ou par satellite", 'description' => "abonnement &agrave; la t&eacute;l&eacute;vision par c&acirc;ble, par satellite ou &agrave; des cha&icirc;nes sp&eacute;cialis&eacute;es", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Internet", 'description' => "", 'amount' => 0, 'period' => 12 )
					)
				),
				array(
					'label' => "Alimentation",
					'fields' => array(
						array( 'label' => "&Eacute;picerie", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Restaurant", 'description' => "", 'amount' => 0, 'period' => 12 )
					)
				),
				array(
					'label' => "Sant&eacute;",
					'fields' => array(
						array( 'label' => "Soins de sant&eacute;", 'description' => "soins m&eacute;dicaux, param&eacute;dicaux et dentaires, achat de lunettes, etc.", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Pharmacie", 'description' => "achat de m&eacute;dicaments etc.", 'amount' => 0, 'period' => 12 )
					)
				),
				array(
					'label' => "Loisirs et &eacute;ducation",
					'fields' => array(
						array( 'label' => "Frais de scolarit&eacute;", 'description' => "livres, mat&eacute;riel scolaire, activit&eacute;s parascolaires, frais de l'institution d'enseignement, etc.", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Sports et loisirs", 'description' => "passe-temps, spectacles, cin&eacute;ma, location de vid&eacute;os, livres et revues, &eacute;quipement de sports, etc.", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Vacances", 'description' => "avion, h&ocirc;tel, restaurant, &eacute;quipement, souvenirs, camping, assurance voyage, etc.", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Abonnements", 'description' => "journaux, revues, club sportif, etc.", 'amount' => 0, 'period' => 12 )
					)
				),
				array(
					'label' => "Remboursement d'emprunts",
					'fields' => array(
						array( 'label' => "Carte de cr&eacute;dit", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Marge de cr&eacute;dit", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Pr&ecirc;t personnel", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Pr&ecirc;t &eacute;tudiant", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Emprunt", 'description' => "ami ou parent", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Autres emprunts", 'description' => "meubles, consolidation de dettes, etc.", 'amount' => 0, 'period' => 12 )
					)
				),
				array(
					'label' => "Autres d&eacute;penses",
					'fields' => array(
						array( 'label' => "V&ecirc;tements", 'description' => "chaussures, manteaux, habits de sports, etc.", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Frais de garde d'enfants", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "D&eacute;penses li&eacute;es aux enfants", 'description' => "argent de poche, si&egrave;ge d'auto, poussette, jouets, v&eacute;lo, patins, v&ecirc;tements, cours, etc.", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Soins personnels", 'description' => "coiffure et esth&eacute;tique", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Frais financiers", 'description' => "forfait, frais de service, etc.", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "D&eacute;penses personnelles", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Dons de charit&eacute;", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Cadeaux", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Tabac", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Boissons alcoolis&eacute;es", 'description' => "bi&egrave;re, vin, etc.", 'amount' => 0, 'period' => 12 )
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
		
	</head>
	
	<body>
	
		<div id="budget-wrap">
	
			<h1>Online Budget Tool</h1>
			
			<table width="100%" cellpadding="5" cellspacing="0" border="0">
			
				<thead>
				
					<th>Cat&eacute;gorie</th>
					<th>Montant</th>
					<th>P&eacute;riode</th>
					<th>Montant annuel</th>
					<th>Pourcentage</th>
					
				</thead>
				
				<?php foreach ( $budget as $section_key => $section ) : ?>
				
					<tbody class="<?php echo $section_key; ?>">
						
						<tr>
							<td class="section-label" colspan="5"><?php echo $section['label']; ?></td>
						</tr>
						
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
						
					</tbody>
					
				<?php endforeach; ?>
				
			</table>
		
		</div>
		
	</body>
	
</html>
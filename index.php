<?php

	$periods = array(
		array( 'label' => "Jour", 'value' => 365 ),
		array( 'label' => "Semaine", 'value' => 52 ),
		array( 'label' => "2 semaines", 'value' => 26 ),
		array( 'label' => "Mois", 'value' => 12 ),
		array( 'label' => "2 mois", 'value' => 6 ),
		array( 'label' => "3 mois", 'value' => 4 ),
		array( 'label' => "6 mois", 'value' => 2 ),
		array( 'label' => "Année", 'value' => 1 )
	);

	function make_row($field, $class = null) {
		global $periods;
	?>
		<tr class="field">
			<td class="label">
				<?php echo $field['label']; ?> <span class="description"><?php echo $field['description']; ?></span>
			</td>
			<td class="amount">
				<input type="text" /> $
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
						array( 'label' => "Rémunération nette d'un emploi", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Revenu net d’un travail autonome", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Revenu d’appoint net", 'description' => "deuxième emploi, revenu secondaire", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Commissions", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Bonus", 'description' => "bonus et primes nets reçus dans le cadre d'un emploi", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Pourboires", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Prestations gouvernementales", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Bourses", 'description' => "bourse d'étude, bourse au rendement, etc.", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Remboursement d'impôt", 'description' => "retour annuel d’impôt suite à la production de la déclaration de revenus", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Remboursement de taxes de ventes", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Revenus nets de location", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Revenus de placements", 'description' => "revenus d'intérêts, dividendes, gains en capital, etc.", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Autres revenus", 'description' => "", 'amount' => 0, 'period' => 12 )
					)
				),
				array(
					'label' => "Pension ou autres prestations nettes :",
					'fields' => array(
						array( 'label' => "Rentes", 'description' => "viagères ou à échéance fixe", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Revenus de fonds enregistrés de revenu de retraite (FERR)", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Régime de pension agréé (caisse de retraite)", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Rente de retraite de la Régie des rentes du Québec (RRQ) ou du Régime de pensions du Canada (RPC)", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Prestation fiscale pour enfants", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Pension alimentaire", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Aide sociale", 'description' => "secours financier pour une personne en difficulté", 'amount' => 0, 'period' => 12 )
					)
				)
			)
		),
		'savings' => array(
			'label' => "Épargne",
			'categories' => array(
				array(
					'label' => false,
					'fields' => array(
						array( 'label' => "Réserve pour imprévus", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Économies", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Épargne retraite", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Épargne habitation", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Épargne études", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Placements", 'description' => "CPG, fonds communs de placement, actions en bourse, etc.", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Épargne vacances", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Épargne voyage", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Épargne voiture", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Autres", 'description' => "", 'amount' => 0, 'period' => 12 )
					)
				)
			)
		),
		'spendings' => array(
			'label' => "Dépenses",
			'categories' => array(
				array(
					'label' => "Habitation",
					'fields' => array(
						array( 'label' => "Loyer ou versement hypothécaire", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Taxes municipales", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Taxes scolaires", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Taxes d'eau", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Électricité", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Chauffage", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Système d'alarme", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Aménagement et entretien", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Assurance habitation", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Perte de revenus locatifs", 'description' => "", 'amount' => 0, 'period' => 12 )
					)
				),
				array(
					'label' => "Assurances personnelles",
					'fields' => array(
						array( 'label' => "Assurance vie", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Assurance invalidité", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Assurance maladie grave", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Assurance accident", 'description' => "", 'amount' => 0, 'period' => 12 )
					)
				),
				array(
					'label' => "Transport",
					'fields' => array(
						array( 'label' => "Paiement automobile", 'description' => "paiement d’un prêt automobile ou de la location d’un véhicule", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Transport public", 'description' => "taxi, train, métro, autobus, etc.", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Dépenses auto - Essence", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Dépenses auto - Entretiens et réparations", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Assurance auto", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Stationnement", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Immatriculation et permis de conduire", 'description' => "", 'amount' => 0, 'period' => 12 )
					)
				),
				array(
					'label' => "Télécommunications",
					'fields' => array(
						array( 'label' => "Téléphone et interurbains", 'description' => "service de base et interurbains", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Téléphone cellulaire", 'description' => "forfait mensuel ou achats de services prépayés", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Téléavertisseur", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Télévision par câble ou par satellite", 'description' => "abonnement à la télévision par câble, par satellite ou à des chaînes spécialisées", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Internet", 'description' => "", 'amount' => 0, 'period' => 12 )
					)
				),
				array(
					'label' => "Alimentation",
					'fields' => array(
						array( 'label' => "Épicerie", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Restaurant", 'description' => "", 'amount' => 0, 'period' => 12 )
					)
				),
				array(
					'label' => "Santé",
					'fields' => array(
						array( 'label' => "Soins de santé", 'description' => "soins médicaux, paramédicaux et dentaires, achat de lunettes, etc.", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Pharmacie", 'description' => "achat de médicaments etc.", 'amount' => 0, 'period' => 12 )
					)
				),
				array(
					'label' => "Loisirs et éducation",
					'fields' => array(
						array( 'label' => "Frais de scolarité", 'description' => "livres, matériel scolaire, activités parascolaires, frais de l’institution d’enseignement, etc.", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Sports et loisirs", 'description' => "passe-temps, spectacles, cinéma, location de vidéos, livres et revues, équipement de sports, etc.", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Vacances", 'description' => "avion, hôtel, restaurant, équipement, souvenirs, camping, assurance voyage, etc.", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Abonnements", 'description' => "journaux, revues, club sportif, etc.", 'amount' => 0, 'period' => 12 )
					)
				),
				array(
					'label' => "Remboursement d’emprunts",
					'fields' => array(
						array( 'label' => "Carte de crédit", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Marge de crédit", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Prêt personnel", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Prêt étudiant", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Emprunt", 'description' => "ami ou parent", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Autres emprunts", 'description' => "meubles, consolidation de dettes, etc.", 'amount' => 0, 'period' => 12 )
					)
				),
				array(
					'label' => "Autres dépenses",
					'fields' => array(
						array( 'label' => "Vêtements", 'description' => "chaussures, manteaux, habits de sports, etc.", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Frais de garde d'enfants", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Dépenses liées aux enfants", 'description' => "argent de poche, siège d'auto, poussette, jouets, vélo, patins, vêtements, cours, etc.", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Soins personnels", 'description' => "coiffure et esthétique", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Frais financiers", 'description' => "forfait, frais de service, etc.", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Dépenses personnelles", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Dons de charité", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Cadeaux", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Tabac", 'description' => "", 'amount' => 0, 'period' => 12 ),
						array( 'label' => "Boissons alcoolisées", 'description' => "bière, vin, etc.", 'amount' => 0, 'period' => 12 )
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
		<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js?ver=1.7.1'></script>
		
	</head>
	
	<body>
	
		<h1>Online Budget Tool</h1>
		
		<table width="100%" cellpadding="5" cellspacing="0" border="0">
		
			<thead>
			
				<th>Catégory</th>
				<th>Montant</th>
				<th>Période</th>
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
		
	</body>
	
</html>
<?php

/**
 * Plugin Name: Budget
 * Version: 0.01
 * Author: Jonathan Roy <jroy@optimumweb.ca>
 * Author URI: http://optimumweb.ca
 *
 * Text Domain: budget
 * Domain Path: /languages/
 *
 * @package wpboilerplate
 * @author OptimumWeb
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	header("HTTP/1.1 403 Forbidden");
	exit;
}

// Define plugin constants
if ( ! defined( 'BUDGET_PATH' ) ) define( 'BUDGET_PATH', plugin_dir_path( __FILE__ ) );
if ( ! defined( 'BUDGET_URL' ) )  define( 'BUDGET_URL',  plugin_dir_url( __FILE__ ) );

// Setup localization
load_plugin_textdomain( 'budget', false, BUDGET_PATH . '/languages' );

$budget_periods = array(
	array( 'label' => __("Jour", 'budget'), 'value' => '30.417' ),
	array( 'label' => __("Semaine", 'budget'), 'value' => '4.333' ),
	array( 'label' => __("2 semaines", 'budget'), 'value' => '2.167' ),
	array( 'label' => __("Bi-mensuel", 'budget'), 'value' => '2.000' ),
	array( 'label' => __("Mois", 'budget'), 'value' => '1.000' ),
	array( 'label' => __("2 mois", 'budget'), 'value' => '0.500' ),
	array( 'label' => __("3 mois", 'budget'), 'value' => '0.333' ),
	array( 'label' => __("6 mois", 'budget'), 'value' => '0.167' ),
	array( 'label' => __("Année", 'budget'), 'value' => '0.083' )
);

$i = 0;

function make_row($field, $class = null) {

	global $budget_periods, $i;

	$field = array_merge( array(
		'amount' => '0.00',
		'period' => '1.000',
		'monthly_total' => '0.00',
		'percentage' => '0.0'
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
				<?php foreach ( $budget_periods as $option ) : ?>
					<option value="<?php echo $option['value']; ?>"<?php if ( $field['period'] == $option['value'] ) echo ' selected="selected"'; ?>>
						<?php echo $option['label']; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</td>
		<td class="monthly-total">
			<?php echo $field['monthly_total']; ?>
		</td>
		<td class="percentage">
			<?php echo $field['percentage']; ?>
		</td>
	</tr>
<?php }

$budget = array(
	'income' => array(
		'label' => __("Revenus", 'budget'),
		'categories' => array(
			array(
				'label' => false,
				'fields' => array(
					array( 'label' => __("Rémunération nette d'un emploi", 'budget') ),
					array( 'label' => __("Revenu net d'un travail autonome", 'budget') ),
					array( 'label' => __("Revenu d'appoint net", 'budget'), 'description' => __("deuxième emploi, revenu secondaire", 'budget') ),
					array( 'label' => __("Commissions", 'budget') ),
					array( 'label' => __("Bonus", 'budget'), 'description' => __("bonus et primes nets reçus dans le cadre d'un emploi", 'budget') ),
					array( 'label' => __("Pourboires", 'budget') ),
					array( 'label' => __("Prestations gouvernementales", 'budget') ),
					array( 'label' => __("Bourses", 'budget'), 'description' => __("bourse d'étude, bourse au rendement, etc.", 'budget') ),
					array( 'label' => __("Remboursement d'impôt", 'budget'), 'description' => __("retour annuel d'impôt suite à la production de la déclaration de revenus", 'budget') ),
					array( 'label' => __("Remboursement de taxes de ventes", 'budget') ),
					array( 'label' => __("Revenus nets de location", 'budget') ),
					array( 'label' => __("Revenus de placements", 'budget'), 'description' => __("revenus d'intérêts, dividendes, gains en capital, etc.", 'budget') ),
					array( 'label' => __("Autres revenus", 'budget') )
				)
			),
			array(
				'label' => __("Pension ou autres prestations nettes :", 'budget'),
				'fields' => array(
					array( 'label' => __("Rentes", 'budget'), 'description' => __("viagères ou à échéance fixe", 'budget') ),
					array( 'label' => __("Revenus de fonds enregistrés de revenu de retraite (FERR)", 'budget') ),
					array( 'label' => __("Régime de pension agréé (caisse de retraite)", 'budget') ),
					array( 'label' => __("Rente de retraite de la Régie des rentes du Québec (RRQ) ou du Régime de pensions du Canada (RPC)", 'budget') ),
					array( 'label' => __("Prestation fiscale pour enfants", 'budget') ),
					array( 'label' => __("Pension alimentaire", 'budget') ),
					array( 'label' => __("Aide sociale", 'budget'), 'description' => __("secours financier pour une personne en difficulté", 'budget') )
				)
			)
		)
	),
	'savings' => array(
		'label' => __("Épargne", 'budget'),
		'categories' => array(
			array(
				'label' => false,
				'fields' => array(
					array( 'label' => __("Réserve pour imprévus", 'budget') ),
					array( 'label' => __("Économies", 'budget') ),
					array( 'label' => __("Épargne retraite", 'budget') ),
					array( 'label' => __("Épargne habitation", 'budget') ),
					array( 'label' => __("Épargne études", 'budget') ),
					array( 'label' => __("Placements", 'budget'), 'description' => __("CPG, fonds communs de placement, actions en bourse, etc.", 'budget') ),
					array( 'label' => __("Épargne vacances", 'budget') ),
					array( 'label' => __("Épargne voyage", 'budget') ),
					array( 'label' => __("Épargne voiture", 'budget') ),
					array( 'label' => __("Autres", 'budget') )
				)
			)
		)
	),
	'spendings' => array(
		'label' => __("Dépenses", 'budget'),
		'categories' => array(
			array(
				'label' => __("Habitation", 'budget'),
				'fields' => array(
					array( 'label' => __("Loyer ou versement hypothécaire", 'budget') ),
					array( 'label' => __("Taxes municipales", 'budget') ),
					array( 'label' => __("Taxes scolaires", 'budget') ),
					array( 'label' => __("Taxes d'eau", 'budget') ),
					array( 'label' => __("Électricité", 'budget') ),
					array( 'label' => __("Chauffage", 'budget') ),
					array( 'label' => __("Système d'alarme", 'budget') ),
					array( 'label' => __("Aménagement et entretien", 'budget') ),
					array( 'label' => __("Assurance habitation", 'budget') ),
					array( 'label' => __("Perte de revenus locatifs", 'budget') )
				)
			),
			array(
				'label' => __("Assurances personnelles", 'budget'),
				'fields' => array(
					array( 'label' => __("Assurance vie", 'budget') ),
					array( 'label' => __("Assurance invalidité", 'budget') ),
					array( 'label' => __("Assurance maladie grave", 'budget') ),
					array( 'label' => __("Assurance accident", 'budget') )
				)
			),
			array(
				'label' => __("Transport", 'budget'),
				'fields' => array(
					array( 'label' => __("Paiement automobile", 'budget'), 'description' => __("paiement d'un prêt automobile ou de la location d'un véhicule", 'budget') ),
					array( 'label' => __("Transport public", 'budget'), 'description' => __("taxi, train, métro, autobus, etc.", 'budget') ),
					array( 'label' => __("Dépenses auto : essence", 'budget') ),
					array( 'label' => __("Dépenses auto : entretiens et réparations", 'budget') ),
					array( 'label' => __("Assurance auto", 'budget') ),
					array( 'label' => __("Stationnement", 'budget') ),
					array( 'label' => __("Immatriculation et permis de conduire", 'budget') )
				)
			),
			array(
				'label' => __("Télécommunications", 'budget'),
				'fields' => array(
					array( 'label' => __("Téléphone et interurbains", 'budget'), 'description' => __("service de base et interurbains", 'budget') ),
					array( 'label' => __("Téléphone cellulaire", 'budget'), 'description' => __("forfait mensuel ou achats de services prépayés", 'budget') ),
					array( 'label' => __("Téléavertisseur", 'budget') ),
					array( 'label' => __("Télévision par câble ou par satellite", 'budget'), 'description' => __("abonnement à la télévision par câble, par satellite ou à des chaînes spécialisées", 'budget') ),
					array( 'label' => __("Internet", 'budget') )
				)
			),
			array(
				'label' => __("Alimentation", 'budget'),
				'fields' => array(
					array( 'label' => __("Épicerie", 'budget') ),
					array( 'label' => __("Restaurant", 'budget') )
				)
			),
			array(
				'label' => __("Santé", 'budget'),
				'fields' => array(
					array( 'label' => __("Soins de santé", 'budget'), 'description' => __("soins médicaux, paramédicaux et dentaires, achat de lunettes, etc.", 'budget') ),
					array( 'label' => __("Pharmacie", 'budget'), 'description' => __("achat de médicaments etc.", 'budget') )
				)
			),
			array(
				'label' => __("Loisirs et éducation", 'budget'),
				'fields' => array(
					array( 'label' => __("Frais de scolarité", 'budget'), 'description' => __("livres, matériel scolaire, activités parascolaires, frais de l'institution d'enseignement, etc.", 'budget') ),
					array( 'label' => __("Sports et loisirs", 'budget'), 'description' => __("passe-temps, spectacles, cinéma, location de vidéos, livres et revues, équipement de sports, etc.", 'budget') ),
					array( 'label' => __("Vacances", 'budget'), 'description' => __("avion, hôtel, restaurant, équipement, souvenirs, camping, assurance voyage, etc.", 'budget') ),
					array( 'label' => __("Abonnements", 'budget'), 'description' => __("journaux, revues, club sportif, etc.", 'budget') )
				)
			),
			array(
				'label' => __("Remboursement d'emprunts", 'budget'),
				'fields' => array(
					array( 'label' => __("Carte de crédit", 'budget') ),
					array( 'label' => __("Marge de crédit", 'budget') ),
					array( 'label' => __("Prêt personnel", 'budget') ),
					array( 'label' => __("Prêt étudiant", 'budget') ),
					array( 'label' => __("Emprunt", 'budget'), 'description' => __("ami ou parent", 'budget') ),
					array( 'label' => __("Autres emprunts", 'budget'), 'description' => __("meubles, consolidation de dettes, etc.", 'budget') )
				)
			),
			array(
				'label' => __("Autres dépenses", 'budget'),
				'fields' => array(
					array( 'label' => __("Vêtements", 'budget'), 'description' => __("chaussures, manteaux, habits de sports, etc.", 'budget') ),
					array( 'label' => __("Frais de garde d'enfants", 'budget') ),
					array( 'label' => __("Dépenses liées aux enfants", 'budget'), 'description' => __("argent de poche, siège d'auto, poussette, jouets, vélo, patins, vêtements, cours, etc.", 'budget') ),
					array( 'label' => __("Soins personnels", 'budget'), 'description' => __("coiffure et esthétique", 'budget') ),
					array( 'label' => __("Frais financiers", 'budget'), 'description' => __("forfait, frais de service, etc.", 'budget') ),
					array( 'label' => __("Dépenses personnelles", 'budget') ),
					array( 'label' => __("Dons de charité", 'budget') ),
					array( 'label' => __("Cadeaux", 'budget') ),
					array( 'label' => __("Tabac", 'budget') ),
					array( 'label' => __("Boissons alcoolisées", 'budget'), 'description' => __("bière, vin, etc.", 'budget') )
				)
			)
		)
	)
);

function make_budget_table($atts)
{
	global $budget;

	wp_enqueue_style('budget', BUDGET_URL . 'css/budget.css');
	wp_enqueue_script('budget', BUDGET_URL . 'js/budget.js', array('jquery'));

?>
<div id="budget-wrap">

	<table id="budget-table" width="100%" cellpadding="0" cellspacing="0" border="0">

		<thead>

			<th width="50%" class="empty">&nbsp;</th>
			<th width="12.5%"><?php _e("Montant", 'budget'); ?></th>
			<th width="12.5%"><?php _e("Période", 'budget'); ?></th>
			<th width="12.5%"><?php _e("Montant mensuel", 'budget'); ?></th>
			<th width="12.5%"><?php _e("Pourcentage", 'budget'); ?></th>

		</thead>

		<?php foreach ( $budget as $section_key => $section ) : ?>

			<thead data-for="<?php echo $section_key; ?>" class="section-title">
				<tr>
					<td class="section-label"><?php echo $section['label']; ?></td>
					<td class="empty">&nbsp;</td>
					<td class="empty">&nbsp;</td>
					<td class="monthly-total">0.00</td>
					<td class="empty">&nbsp;</td>
				</tr>
			</thead>

			<tbody id="<?php echo $section_key; ?>" class="section">

				<?php foreach ( $section['categories'] as $category ) : ?>

					<?php if ( $category['label'] ) : ?>

						<tr class="category-title">
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
					<td class="label"><?php _e("Total", 'budget'); ?></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td class="monthly-total">0.00</td>
					<td>&nbsp;</td>
				</tr>

			</tbody>

			<tr class="summary">
				<td class="label"><?php _e("Montant disponible mensuellement", 'budget'); ?></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td class="monthly-available">0.00</td>
				<td>&nbsp;</td>
			</tr>

		<?php endforeach; ?>

	</table>

</div>
<?php

}
add_shortcode('budget_table', 'make_budget_table');

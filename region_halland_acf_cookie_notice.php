<?php

	/**
	 * @package Region Halland ACF Cookie Notice
	 */
	/*
	Plugin Name: Region Halland ACF Cookie Notice
	Description: ACF-fält för text till en cookie notice
	Version: 1.3.2
	Author: Roland Hydén
	License: GPL-3.0
	Text Domain: regionhalland
	*/

	// Anropa funktion om ACF är installerad & aktiverad
	add_action('acf/init', 'my_acf_add_cookie_notice_field_groups');

	// Lägg till ett formulär
	function my_acf_add_cookie_notice_field_groups() {

		// Om funktionen existerar
		if (function_exists('acf_add_local_field_group')):

			// Lägg till formulär via acf
			acf_add_local_field_group(array(
				'key' => 'group_5b3239313bbe6',
				'title' => 'Hantera text för cookies',
				'fields' => array(
					array(
						'key' => 'field_5b323d0d20e3b',
						'label' => 'Cookies',
						'name' => '',
						'type' => 'tab',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'placement' => 'top',
						'endpoint' => 0,
					),
					array(
						'key' => 'field_5b323e3a33ca1',
						'label' => '',
						'name' => 'cookie',
						'type' => 'group',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'layout' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5b323d3820e3d',
								'label' => 'Meddelande',
								'name' => 'message',
								'type' => 'textarea',
								'instructions' => 'Fyll i information om att kakor används',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => 'På den här webbplatsen använder vi cookies (kakor) för att webbplatsen ska fungera på ett bra sätt för dig. Genom att klicka vidare eller på ”Jag förstår” godkänner du att vi använder cookies.',
								'placeholder' => '',
								'maxlength' => '',
								'rows' => 3,
								'new_lines' => '',
							),
							array(
								'key' => 'field_5b323d8620e3e',
								'label' => 'Knappttext',
								'name' => 'button',
								'type' => 'text',
								'instructions' => 'Fyll i knapptext för godkännande av användning av kakor',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => 'Jag förstår',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),
						),
					)
				),
				'location' => array(
					array(
						array(
							'param' => 'options_page',
							'operator' => '==',
							'value' => 'acf-options-temainstallningar',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => 1,
				'description' => '',
			));

		endif;

	}

	// Kolla om det finns någon cookie
	function check_region_halland_cookie_notice()
	{
		// Namnet på cookien
		$cookieName = 'cookie_notice_accepted';

		// returnera true/false
		if (!isset($_COOKIE[$cookieName])) {
			return false;
		} else {
			return true;
		}
	}

	// Hämta ACF-texter för cokkie-notice
	function get_region_halland_cookie_notice()
	{
		// Hämta respektive värde från databasen
		$cookie_notice['message'] = get_field('cookie_message', 'options');
		$cookie_notice['button'] = get_field('cookie_button', 'options');
		
		// Returnera värdena som en array
		return $cookie_notice;
	}

	// Metod som anropas när pluginen aktiveras
	function region_halland_acf_cookie_notice_activate() {
		// Ingenting just nu...
	}

	// Metod som anropas när pluginen av-aktiveras
	function region_halland_acf_cookie_notice_deactivate() {
		// Ingenting just nu...
	}

	// Aktivera pluginen och anropa metod
	register_activation_hook( __FILE__, 'region_halland_acf_cookie_notice_activate');

	// Av-aktivera pluginen och anropa metod
	register_deactivation_hook( __FILE__, 'region_halland_acf_cookie_notice_deactivate');
?>
<?php
/*
Plugin Name: GBG Presentation
Plugin URI: http://cw-connectingworld.com/
Description: Global Business Group - Presentation of Groups
Version: 1.1
Author: Igor Krasilnikov
Author URI: http://cw-connectingworld.com/
License: GPL
*/



// Hooks and Filter
register_activation_hook(__FILE__,'_gbg_groups');
register_activation_hook(__FILE__,'_gbg_continent');
register_activation_hook(__FILE__,'_gbg_company_group');
register_activation_hook(__FILE__,'_gbg_country_on_continent');

// Update Check
add_action('plugins_loaded', '_gbg_update_db_check');


// Create Menu
if ( is_admin() ){

add_action('admin_menu', 'gbg_menu');

}


// Global
//----------------------------------------------------//
define( 'PLUGIN_DIR', dirname(__FILE__) );
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
require_once PLUGIN_DIR . '/include/core_presentation.php';

global $gbg_version;
$gbg_version = "1.1";

// Functions
//----------------------------------------------------//

function _gbg_continent() {
	global $wpdb;
	$table_name = $wpdb->prefix . "continents";
	
	// Checks if table with such name already exists
	if($wpdb->get_var("show tables like '$table_name'") != $table_name )
	{
		$sql = "CREATE TABLE ".$table_name." (
		id tinyint(2) NOT NULL AUTO_INCREMENT,
		name varchar(45) NOT NULL,
		continent_name varchar(45) NOT NULL,
		UNIQUE KEY id (id)
		);";
		//require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
		
		// Add data
		_gbg_continent_data();
		
		// Add Plugin Version
		add_option("gbg_version", $gbg_version);		
	}
}

function _gbg_continent_data() {
	global $wpdb;
	$table_name = $wpdb->prefix . "continents";
	
	$continents = array( 0 =>array(
							1 =>'AFRICA',
							2 =>'Africa'),
						1 =>array(
							1 =>'ASIA',
							2 =>'Asia'),
						2 =>array(
							1 =>'EUROPE',
							2 =>'Europe'),
						3 =>array(
							1 =>'NORTH_AMERICA',
							2 =>'North America'),
						4 =>array(
							1 =>'SOUTH_AMERICA',
							2 =>'South America'),
						5 =>array(
							1 =>'OCEANIA',
							2 =>'Oceania')
							);
	$n = count($continents);
	$i=0;
	for($i; $i<$n; $i++){
	
	$wpdb->query( $wpdb->prepare( "
	INSERT INTO $table_name
	( name, continent_name )
	VALUES ( %s, %s )", 
        $continents[$i][1], $continents[$i][2] ) );
	}
}


function _gbg_groups() {
	global $wpdb;
	$table_name2 = $wpdb->prefix . "groups";
	
	// Checks if table with such name already exists
	if($wpdb->get_var("show tables like '$table_name2'") != $table_name2 ) 
	{
		
		$sql = "CREATE TABLE ".$table_name2." (
		id int(10) NOT NULL AUTO_INCREMENT,
		group_name varchar(45) NOT NULL,
		country int(10) NOT NULL,
		group_focus text NOT NULL,
		group_presentation text NOT NULL,
		group_manager varchar(50) NOT NULL,
		work_mail varchar(100) NOT NULL,
		cw_mail varchar(100) NOT NULL,
		work_phone varchar(30) NOT NULL,
		mobile_phone varchar(30) NOT NULL,
		web varchar(100) NOT NULL,
		UNIQUE KEY id (id)
		);";
		dbDelta($sql);
		
	}
}

function _gbg_company_group() {
	global $wpdb;
	$table_name = $wpdb->prefix . "company_group";
	
	// Checks if table with such name already exists
	if($wpdb->get_var("show tables like '$table_name'") != $table_name ) 
	{	
		$sql = "CREATE TABLE ".$table_name." (
		company_id bigint(20) NOT NULL,
		group_id int(10) NOT NULL,
		UNIQUE KEY comp_id (company_id, group_id)
		);";
		//require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
	}
}

function _gbg_country_on_continent() {
	global $wpdb;
	$table_name = $wpdb->prefix . "country_on_continent";
	
	// Checks if table with such name already exists
	if($wpdb->get_var("show tables like '$table_name'") != $table_name )
	{
		$sql = "CREATE TABLE ".$table_name." (
		continent_id tinyint(2) NOT NULL,
		country_id int(10) NOT NULL,
		UNIQUE KEY cont_id (continent_id, country_id)
		);";
		//require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
		
		// Add data
		_gbg_country_on_continent_data();
		
		// Add Plugin Version
		add_option("gbg_version", $gbg_version);		
	}
}

function _gbg_country_on_continent_data() {
	global $wpdb;
	$table_name = $wpdb->prefix . "country_on_continent";
	$continents=array('Africa'=>array('Algeria','Angola','Benin','Botswana','Burkina','Burundi','Cameroon','Cape Verde','Central African Republic','Chad','Comoros','Congo Republic'),'Asia'=>array('Afghanistan','Armenia','Azerbaijan','Bahrain','Bangladesh','Bhutan','Brunei','Burma','Cambodia','Darussalam','China','East Timor','Gaza Strip'),'Europe'=>array('Belgium','Denmark','England','France','Germany','Greece','Italy','Russia','Spain','Sweden','Croatia','Estonia'),'North America'=>array('Anguilla','Aruba','Bahamas','Barbados','Belize','Bermuda','Canada','Cayman','Costa Rica','Islands'),'South America'=>array('Argentina','Bolivia','Chile','Colombia','Ecuador','French Guiana','Falkland','Guyana','Islas Malvinas','Islands','Paraguay','Peru','Suriname','Uruguay','Venezuela'),'Oceania'=>array('Australia','Fiji','Kiribati','Marshall','Micronesia','Nauru','Islands','New Zealand','Palau','Papua New','Samoa','Samoa US','Guinea','Western','Salomon Islands','Tonga','Tuvalu','Vanuatu'));

	foreach ($continents as $key=>$countries) {
		foreach ($countries as $country) {
		//echo $country . ' - strana<br />';
			global $wpdb;
			$country_id = $wpdb->get_row("SELECT * FROM cw_country WHERE country_name = '".$country."' ");
			$continent_id = $wpdb->get_row("SELECT * FROM cw_continents WHERE continent_name = '".$key."' ");
						
			$wpdb->query( $wpdb->prepare( "
			INSERT INTO $table_name
			( continent_id, country_id )
			VALUES ( %d, %d )", 
				$continent_id->id, $country_id->country_id ) );
			
		}
	}
}


// GBG Menu
function gbg_menu() {
add_menu_page("Global Business Group", "GBG", "promote_users", "gbg", "gbg_index_page", '', 29);
add_submenu_page("gbg", "Add Global Business Group", "Add Group", "promote_users", "add-gbg", "add_gbg_page");
add_submenu_page("gbg", "Change Global Business Group", "", "promote_users", "edit-gbg", "edit_gbg_page");
}

// GBG index page content
function gbg_index_page() {

	include('templates/gbg_index_page.php');
}

// Add GBG page content
function add_gbg_page() {
	
	include('templates/add_gbg_page.php');
}
// Edit GBG page content
function edit_gbg_page() {
	
	include('templates/add_gbg_page.php');
}

function gbg_show_pres() {
	
	add_action( 'wp_print_scripts', 'enqueue_my_scripts' );
	add_action( 'wp_print_styles', 'enqueue_my_styles' );
	
	echo " Test ";
	
}

// Update Check
function _gbg_update_db_check() {
    global $gbg_version;
    if (get_site_option('gbg_version') != $gbg_version) {
        _gbg_continent();
		_gbg_groups();
		_gbg_company_group();
		_gbg_country_on_continent();
    }
}


// ---------------------------------------------------------------------
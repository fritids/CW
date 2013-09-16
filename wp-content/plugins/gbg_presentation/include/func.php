<?php

// Smart excerpt for string

function smarty_modifier_mb_truncate(
            $string, 
            $length = 50,
            $etc = '...',
            $charset='UTF-8',
            $break_words = false,
            $middle = false) {

    if ($length == 0) return '';
 
    if (strlen($string) > $length) {
        $length -= min($length, strlen($etc));
        if (!$break_words && !$middle) {
            $string = preg_replace('/\s+?(\S+)?$/', '', 
                             mb_substr($string, 0, $length+1, $charset));
        }
        if(!$middle) {
            return mb_substr($string, 0, $length, $charset) . $etc;
        } else {
            return mb_substr($string, 0, $length/2, $charset) . 
                             $etc . 
                             mb_substr($string, -$length/2, $charset);
        }
    } else {
        return $string;
    }
}

function get_continents(){
	global $wpdb;
	
	$continents = $wpdb->get_results("SELECT id, continent_name FROM ".$wpdb->prefix."continents");
	
	return $continents;
}

// @input int continent id number
// @output array countries on this continent
function get_gbg_countries($continent_id){
	global $wpdb;
	if ($continent_id != 0 ){
	$countries = $wpdb->get_results("SELECT c.country_id AS id, c.country_name AS country
									FROM cw_country c
									LEFT JOIN cw_country_on_continent coc ON coc.country_id = c.country_id
									WHERE coc.continent_id = '". $continent_id ."'
									ORDER BY c.country_name");
	} else {
	$countries = $wpdb->get_results("SELECT c.country_id AS id, c.country_name AS country
									FROM cw_country c
									JOIN cw_country_on_continent coc ON coc.country_id = c.country_id
									ORDER BY c.country_name");
	
	}
	return $countries;
}

//add_action('wp_ajax_get_groups', 'get_groups_ajax');
//add_action('wp_ajax_nopriv_get_groups', 'get_groups_ajax');//for users that are not logged in.
function get_gbg_groups($country_id) {
	global $wpdb;
		
		$groups = $wpdb->get_results("	SELECT *
										FROM ".$wpdb->prefix."groups
										WHERE country = '".$country_id."' ");
											
	return $groups;        
}

function get_gbg_groupbyid($group_id) {
	global $wpdb;
		
		$group = $wpdb->get_row("	SELECT *
									FROM ".$wpdb->prefix."groups
									WHERE id = '".$group_id."' ");
											
	return $group;

}

function search_gbg_company($search) {
	global $wpdb;
		
		$companies = $wpdb->get_results("	SELECT *
											FROM ".$wpdb->prefix."company
											WHERE company_name LIKE '%".$search."%' ");
											
	return $companies;

}

function get_company_ingroup($group_id){
	global $wpdb;
	$companies = $wpdb->get_results("	SELECT *
										FROM ".$wpdb->prefix."company
										WHERE company_id IN (	SELECT company_id
																FROM ".$wpdb->prefix."company_group
																WHERE group_id = '".$group_id."') ");
											
	return $companies;

}
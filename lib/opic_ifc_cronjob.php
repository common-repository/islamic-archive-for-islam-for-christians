<?php

//============== Cronjob Start ======================//
// add custom interval
if(!function_exists('cron_ifc_add_hour')){
	function cron_ifc_add_hour( $schedules ) {
		// Adds once every minute to the existing schedules.
	    $schedules['everyhour'] = array(
		    'interval' => 3600,
		    'display' => __( 'Once Hour' )
	    );
	    return $schedules;
	}
	add_filter( 'cron_schedules', 'cron_ifc_add_hour' );
}
if(!function_exists('cron_ifc_add_every_day')){
	function cron_ifc_add_every_day( $schedules ) {
		// Adds once every minute to the existing schedules.
	    $schedules['everyday'] = array(
		    'interval' => 3600*24,
		    'display' => __( 'Once Ever day' )
	    );
	    return $schedules;
	}
	add_filter( 'cron_schedules', 'cron_ifc_add_every_day' );
	}
if(!function_exists('cron_ifc_add_six_hours')){
function cron_ifc_add_six_hours( $schedules ) {
	// Adds once every minute to the existing schedules.
    $schedules['everysixhours'] = array(
	    'interval' => 3600*6,
	    'display' => __( 'Once Six Hours' )
    );
    return $schedules;
}
add_filter( 'cron_schedules', 'cron_ifc_add_six_hours' );
}

if(!function_exists('cron_ifc_add_twelve_hours')){
	
function cron_ifc_add_twelve_hours( $schedules ) {
	// Adds once every minute to the existing schedules.
    $schedules['everytwelvehours'] = array(
	    'interval' => 3600*12,
	    'display' => __( 'Once Twelve Hours' )
    );
    return $schedules;
}
add_filter( 'cron_schedules', 'cron_ifc_add_twelve_hours' );
}

if(!function_exists('cron_ifc_add_two_days')){
function cron_ifc_add_two_days( $schedules ) {
	// Adds once every minute to the existing schedules.
    $schedules['everytwodays'] = array(
	    'interval' => (3600*24)*2,
	    'display' => __( 'Once Two Days' )
    );
    return $schedules;
}
add_filter( 'cron_schedules', 'cron_ifc_add_two_days' );
}
 
// create a scheduled event (if it does not exist already)
if(!function_exists('cronstarter_ifc_activation')){
function cronstarter_ifc_activation() {
	if( !wp_next_scheduled('opic_ifc_cronjob' ) ) {  
	   wp_schedule_event( time(), get_option(OPICIFC_Input_SLUG.'cronjobtime'),'opic_ifc_cronjob' );  
	}
}
// and make sure it's called whenever WordPress loads
add_action('wp', 'cronstarter_ifc_activation');
}
// unschedule event upon plugin deactivation
if(!function_exists('cronstarter_ifc_deactivate')){
function cronstarter_ifc_deactivate() {	
	// find out when the last event was scheduled
	$timestamp = wp_next_scheduled ('opic_ifc_cronjob');
	// unschedule previous event if any
	wp_unschedule_event ($timestamp,'opic_ifc_cronjob');
} 
register_deactivation_hook (__FILE__, 'cronstarter_ifc_deactivate');
}
// here's the function we'd like to call with our cron job
if(!function_exists('my_ifc_repeat_function')){
function my_ifc_repeat_function() {
	global $opic_ifc_cronjob;
	$opic_ifc_cronjob -> InsetPost();
}
}

// hook that function onto our scheduled event:
add_action ('opic_ifc_cronjob', 'my_ifc_repeat_function'); 


//============== Cronjob End ======================//
?>
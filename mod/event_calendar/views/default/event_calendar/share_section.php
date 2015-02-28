<?php
$fd = $vars['form_data'];
$event_calendar_hide_access = elgg_get_plugin_setting('hide_access', 'event_calendar');
$event_calendar_default_access = elgg_get_plugin_setting('default_access', 'event_calendar');
$body = '<fieldset>';
//$body .= '<legend>'.elgg_echo('event_calendar:permissions:header').'</legend>';
if($event_calendar_hide_access == 'yes') {
	//$event_calendar_default_access = elgg_get_plugin_setting('default_access', 'event_calendar');
	if($event_calendar_default_access) {
		$body .= elgg_view("input/hidden",array('name' => 'access_id','value'=>$event_calendar_default_access));
	} else {
		$body .= elgg_view("input/hidden",array('name' => 'access_id','value'=>ACCESS_DEFAULT));
	}
} else {
	$page_owner = elgg_get_page_owner_entity(); 	
		
	if ($page_owner instanceof ElggGroup) {
		elgg_load_library('elgg:group_operators');
		$operators = get_group_operators($page_owner);
		$user = elgg_get_logged_in_user_entity();
		//print_r(' Estas en un grupo');
		
		if (in_array($user, $operators) || elgg_is_admin_logged_in() ) {
			$body .= '<p><label>'.elgg_echo("access").'<br />';
			$body .= elgg_view("input/access",array('name' => 'access_id','value'=>$event_calendar_default_access));
			$body .= '</label></p>';
			
		} else {
			$options_values = get_write_access_array();
			unset($options_values[2]); //Delete public access if not admin or operator
			$body .= '<p><label>'.elgg_echo("access").'<br />';
			$body .= elgg_view("input/access",array('name' => 'access_id','value'=>$event_calendar_default_access, 'options_values'=> $options_values));
			$body .= '</label></p>';
		}
	} else {
		if (elgg_is_logged_in() && elgg_is_admin_logged_in()) {
			$body .= '<p><label>'.elgg_echo("access").'<br />';
			$body .= elgg_view("input/access",array('name' => 'access_id','value'=>$event_calendar_default_access));
			$body .= '</label></p>';
		} else {
			$options_values = get_write_access_array();
			unset($options_values[2]); //Delete public access if not admin or operator
			$body .= '<p><label>'.elgg_echo("access").'<br />';
			$body .= elgg_view("input/access",array('name' => 'access_id','value'=>$event_calendar_default_access, 'options_values'=> $options_values));
			$body .= '</label></p>';
			
		}
		
	}
	
	
}
if (elgg_plugin_exists('entity_admins')) {
	$body .= elgg_echo('event_calendar:share_ownership:label');
	$body .= '<br />';
	$body .= elgg_echo('event_calendar:share_ownership:description');
	$body .= elgg_view('input/entity_admins_dropdown',array('entity'=>$vars['event']));
}
$body .= '</fieldset><br />';

echo $body;

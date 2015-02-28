<?php

/**
 * Elgg custom index page
 * 
 */

if (!isloggedin()) {
	elgg_load_css('elgg.walled_garden');
	elgg_load_js('elgg.walled_garden');
	
	
	$content = elgg_view('core/walled_garden/login');
	$content .= '<h3>Firma el llamamiento:</h3>
	<p>Ganemos Sevilla espera el apoyo con su firma de 10.000 ciudadanos y ciudadanas para presentarse 
	a las elecciones municipales como una candidatura unitaria y popular.</p><p> Si aún no lo has hecho, 
	<a href="http://ganemossevilla.org/firma/"><strong>Firma nuestro llamamiento.</strong></a></p>';
	$params = array(
		'content' => $content,
		'class' => 'elgg-walledgarden-double',
		'id' => 'elgg-walledgarden-login',
	);
	$body = elgg_view_layout('walled_garden', $params);
	echo elgg_view_page('', $body, 'walled_garden');
	
} else {
	
	 
	$title = "Grupos de trabajo";
	
	$content = "<br><h1> $title </h1><br><br>";
	
	$groups = elgg_get_entities(array(
		'type' => 'group',
		'limit' => 0,
		));
	
	
	$content .= "<ul class='custom_index_container_groups'>";
	//print_r($groups);
	foreach ($groups as $group) {
		if ($group->featured_group == "yes") {
			
			$content .= "<li class='container_img_text'>";
			$content .= "<div class='container_img'>";
			$content .= elgg_view_entity_icon($group, 'large');
			$content .= "</div>";
			$content .= "<div class='container_text'>";
			$content .= "<h3>" .  '<a href=' . $group->getURL() .  "> $group->name </a>"  . "</h3>" ;
			$content .= "</div>";
			$content .= "</li>";
		}
	}
			
	$content .= " </ul>";
	
	
	
	$body = elgg_view_layout('one_sidebar', array(
		
		'content' => $content,
		'title' => $title,
		//'sidebar' => $sidebar,
	));
	
	echo elgg_view_page($title, $body);
}


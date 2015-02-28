<?php
/**
 * Elgg header logo
 */

$site = elgg_get_site_entity();
$site_name = $site->name;
$site_url = elgg_get_site_url();
$logo_url = $site_url . 'mod/gs_theme/graphics/cabecera_red.png';
?>

<h1>
	<a class="elgg-heading-site" href="<?php echo $site_url; ?>">
		 <img src="<?php echo $logo_url ?>" alt="<?php echo $site_name; ?>"> 
	</a>
</h1>

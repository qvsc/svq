<?php
/**
 * gs theme plugin
 *
 * @package gsTheme
 */

elgg_register_event_handler('init','system','gs_theme_init');

function gs_theme_init() {

	elgg_register_event_handler('pagesetup', 'system', 'gs_theme_pagesetup', 1000);

	// theme specific CSS
	elgg_extend_view('css/elgg', 'gs_theme/css');

	elgg_extend_view('page/elements/head', 'gs_theme/head');

	elgg_register_js('respond', 'mod/gs_theme/vendors/js/respond.min.js');
	elgg_load_js('respond');

	// non-members do not get visible links to RSS feeds
	if (!elgg_is_logged_in()) {
		elgg_unregister_plugin_hook_handler('output:before', 'layout', 'elgg_views_add_rss_link');
	}
	
	elgg_unregister_menu_item('topbar', 'elgg_logo');
	$logo_url = elgg_get_site_url() . "mod/gs_theme/graphics/logoeslogan.gif";
	elgg_register_menu_item('topbar', array(
            'name' => 'gs_logo',
            'href' => 'http://ganemossevilla.org',
            'text' => "<img src=\"$logo_url\" alt=\"Gs logo\" height=\"20\" />",
            'priority' => 1,
        ));


}

/**
 * Rearrange menu items
 */
function gs_theme_pagesetup() {

	elgg_unextend_view('page/elements/header', 'search/header');
	if (elgg_is_logged_in()) {
		elgg_extend_view('page/elements/sidebar', 'search/header', 0);
	}

	elgg_unregister_menu_item('topbar', 'dashboard');
	if (elgg_is_active_plugin('dashboard')) {
		elgg_register_menu_item('site', array(
			'name' => 'dashboard',
			'href' => 'dashboard',
			'text' => elgg_echo('dashboard'),
		));
	}

	if (elgg_is_logged_in()) {

		elgg_register_menu_item('topbar', array(
			'name' => 'account',
			'text' => elgg_echo('account'),
			'href' => "#",
			'priority' => 100,
			'section' => 'alt',
			'link_class' => 'elgg-topbar-dropdown',
		));

		$item = gs_theme_elgg_get_menu_item('topbar', 'usersettings');
		if ($item) {
			$item->setParentName('account');
			$item->setText(elgg_echo('settings'));
			$item->setPriority(103);
		}

		$item = gs_theme_elgg_get_menu_item('topbar', 'logout');
		if ($item) {
			$item->setParentName('account');
			$item->setText(elgg_echo('logout'));
			$item->setPriority(104);
		}

		$item = gs_theme_elgg_get_menu_item('topbar', 'administration');
		if ($item) {
			$item->setParentName('account');
			$item->setText(elgg_echo('admin'));
			$item->setPriority(101);
		}

		if (elgg_is_active_plugin('reportedcontent')) {
			$item = gs_theme_elgg_get_menu_item('footer', 'report_this');
			$success = elgg_unregister_menu_item('footer', 'report_this');

			if ($success) {
				$item->setText(elgg_view_icon('report-this'));
				$item->setPriority(500);
				$item->setSection('default');
				elgg_register_menu_item('extras', $item);
			}
		}
	}
}

/**
 * Get a menu item registered for a menu
 *
 * @param string $menu_name The name of the menu
 * @param string $item_name The unique identifier for this menu item
 *
 * @return ElggMenuItem
 */
function gs_theme_elgg_get_menu_item($menu_name, $item_name) {
	global $CONFIG;

	if (!isset($CONFIG->menus[$menu_name])) {
		return null;
	}

	foreach ($CONFIG->menus[$menu_name] as $index => $menu_object) {
		/* @var ElggMenuItem $menu_object */
		if ($menu_object->getName() == $item_name) {
			return $CONFIG->menus[$menu_name][$index];
		}
	}

	return null;
}

<?php
/**
 * Group profile summary
 *
 * Icon and profile fields
 *
 * @uses $vars['group']
 */

if (!isset($vars['entity']) || !$vars['entity']) {
	echo elgg_echo('groups:notfound');
	return true;
}

$group = $vars['entity'];
$owner = $group->getOwnerEntity();

if (!$owner) {
	// not having an owner is very bad so we throw an exception
	$msg = elgg_echo('InvalidParameterException:IdNotExistForGUID', array('group owner', $group->guid));
	throw new InvalidParameterException($msg);
}

?>
<div class="groups-profile clearfix elgg-image-block">
	<div class="elgg-image" style="width:200px">
		<div class="groups-profile-icon">
			<?php
				// we don't force icons to be square so don't set width/height
				echo elgg_view_entity_icon($group, 'large', array(
					'href' => '',
					'width' => '',
					'height' => '',
				)); 
			?>
		</div>
		<div class="groups-stats">
			<p>
			<?php
				$group = $vars['entity'];
				elgg_load_library('elgg:group_operators');
				$operators_and_owner = get_group_operators($group);
				
				
				foreach ($operators_and_owner as $user) {
					if ($user->guid == $group->owner_guid) {
						$owners[] = $user;
					} else {
						$operators[] = $user;
					}	
				}
				
				echo "<div class=\"{$even_odd}\">";
				echo elgg_echo('group:owners:list') ;
				echo '<br>';
				foreach ($owners as $owner) {
					
					echo elgg_view_entity_icon($owner, 'tiny');
					echo '  ' . elgg_view('output/url', array(
						'text' => $owner->name,
						'value' => $owner->getURL(),
						'is_trusted' => true,
					));
					echo '<br>';
				
				}
				
				if ($operators) {
					echo elgg_echo('group:operators:list') ;
					
					echo '<br>';
					foreach ($operators as $operator) {
						
						echo elgg_view_entity_icon($operator, 'tiny');
						echo '  ' . elgg_view('output/url', array(
							'text' => $operator->name,
							'value' => $operator->getURL(),
							'is_trusted' => true,
						));
						
						echo '<br>';
						
						
					}
				}
				
				echo '</div>';
			?>
			</p>
			<p>
			<?php
				echo elgg_echo('groups:members') . ": " . $group->getMembers(0, 0, TRUE);
			?>
			</p>
		</div>
	</div>

	<div class="groups-profile-fields elgg-body">
		<?php
			echo elgg_view('groups/profile/fields', $vars);
		?>
	</div>
</div>
<?php
?>

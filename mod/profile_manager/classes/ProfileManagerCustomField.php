<?php
/**
 * ProfileManagerCustomField
 *
 * @package ProfileManager
 *
 */
abstract class ProfileManagerCustomField extends ElggObject {
	
	/**
	 * initializes the default class attributes
	 *
	 * @return void
	 */
	protected function initializeAttributes() {
		parent::initializeAttributes();
		
		$this->attributes['access_id'] = ACCESS_PUBLIC;
		$this->attributes['owner_guid'] = elgg_get_site_entity()->getGUID();
		$this->attributes['container_guid'] = elgg_get_site_entity()->getGUID();
	}
	
	/**
	 * Returns an array of options to be used in input views
	 *
	 * @param boolean $add_blank_option optional boolean if there should be an extra empty option added
	 *
	 * @return string
	 */
	public function getOptions($add_blank_option = false) {
		$options = "";
		
		// get options
		if (empty($this->metadata_options)) {
			return $options;
		}
			
		$options = explode(",", $this->metadata_options);
		
		if ($this->blank_available == "yes") {
			// if field has a blank option available, always add the blank option
			$add_blank_option = true;
		}
		
		if ($this->metadata_type != "multiselect" && $add_blank_option) {
			// optionally add a blank option to the field options
			array_unshift($options, "");
		}
		
		$options = array_combine($options, $options); // add values as labels for deprecated notices
		
		return $options;
	}
	
	/**
	 * Returns the hint text
	 *
	 * @return string
	 */
	public function getHint() {
		// make title
		$hint = $this->metadata_hint;
		
		if (empty($hint)) {
			$trans_key = "profile:hint:" . $this->metadata_name;
			if ($trans_key != elgg_echo($trans_key)) {
				$hint = elgg_echo($trans_key);
			}
		}
		return $hint;
	}
}

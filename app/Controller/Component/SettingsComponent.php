<?php
App::uses('Component', 'Controller');

class SettingsComponent extends Component {
	
/**
 * initialize method
 *
 */
	function initialize(Controller $controller) {
		$settings = Cache::read('settings', 'long');
		if (!$settings) {
			$settings = ClassRegistry::init('Setting')->find('all', array(
				'fields' => array('Setting.name_key', 'Setting.name_value')
			));
			Cache::write('settings', $settings, 'long');
		}

		foreach($settings as $setting) {
			if ($setting['Setting']['name_value'] !== null) {
				Configure::write($setting['Setting']['name_key'], $setting['Setting']['name_value']);
			}
		}

		return $settings;
	}
	
}
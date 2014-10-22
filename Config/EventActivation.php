<?php
/**
 * Event Activation
 *
 * Activation class for Event plugin.
 *
 * @package  Croogo
 * @author   Thomas Rader <tom.rader@claritymediasolutions.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.claritymediasolutions.com/portfolio/croogo-event-plugin
 */
class EventActivation {

	public function beforeActivation(Controller $controller) {
		return true;
	}

	public function onActivation(Controller $controller) {

        // ACL: set ACOs with permissions
        $controller->Croogo->addAco('Event');
        $controller->Croogo->addAco('Event/Events/admin_index');
        $controller->Croogo->addAco('Event/Events/index', array('registered', 'public'));
        $controller->Croogo->addAco('Event/Events/view', array('registered', 'public'));
        $controller->Croogo->addAco('Event/Events/calendar', array('registered', 'public'));

		App::uses('CroogoPlugin', 'Extensions.Lib');
		$CroogoPlugin = new CroogoPlugin();
		$CroogoPlugin->migrate('Event');

		//Ignore the cache since the tables wont be inside the cache at this point
		//$db->cacheSources = false;

	}

	public function beforeDeactivation(Controller $controller) {
		return true;
	}

	public function onDeactivation(Controller $controller) {
		$controller->Croogo->removeAco('Event');
	}

 }

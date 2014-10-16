<?php
/**
 * Event Component
 *
 * Event component for tying events into the CMS.
 *
 * @category Component
 * @package  Croogo
 * @version  1.0
 * @author   Thomas Rader <tom.rader@claritymediasolutions.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.claritymediasolutions.com/portfolio/croogo-event-plugin
 */
class EventComponent extends Component {

/**
 * startup
 *
 * @param object $controller Controller
 * @return void
 */
    public function startup(Controller $controller) {
        CakeLog::write('debug',$controller->name);
        $controller->helpers['Event'] = array(
            'className' => 'Event.Event',
        );
    }

}

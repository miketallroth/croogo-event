<?php
/**
 * Routes
 *
 * example_routes.php will be loaded in main app/config/routes.php file.
 */
    Croogo::hookRoutes('Event');
/**
 * Behavior
 *
 * This plugin's Event behavior will be attached whenever Node model is loaded.
 * This shouldn't be necessary because we can use hookModelProperty below.
 */
    //Croogo::hookBehavior('Nodes.Node', 'Event.Event');

/**
 * hasOne relationship
 *
 * Define it conditional on the Node being of type event.
 */
    Croogo::hookModelProperty('Node', 'hasOne', array('Event' => array(
        'className' => 'Event.Event',
        'foreignKey' => 'node_id',
        'conditions' => array('Node.type' => 'event'),
    )));

/**
 * Component
 *
 * This plugin's Event component will be loaded in ALL controllers.
 */
    Croogo::hookComponent('Nodes', 'Event.Event');
/**
 * Helper
 *
 * This plugin's Event helper will be loaded via NodesController.
 */
    //Croogo::hookHelper('Nodes', 'Event.Event');
/**
 * Admin tab
 *
 * When adding/editing Content (Nodes),
 * an extra tab with title 'Event' will be shown with markup generated from the plugin's admin_tab_node element.
 *
 * Useful for adding form extra form fields if necessary.
 */
    Croogo::hookAdminTab('Nodes/admin_add', 'Event', 'event.admin_tab_node_add', array('type'=>array('event')));
    Croogo::hookAdminTab('Nodes/admin_edit', 'Event', 'event.admin_tab_node', array('type'=>array('event')));

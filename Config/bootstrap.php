<?php

/**
 * Routes
 *
 * Plugin/Event/Config/routes.php will be loaded
 */
    Croogo::hookRoutes('Event');

/**
 * Behavior
 *
 * Behavior contains the associated models so they don't get removed.
 * Use priority 1 so this behavior runs before Containable.
 */
    Croogo::hookBehavior('Node', 'Event.Event', array(
        'priority' => 1,
    ));

/**
 * hasOne relationship
 *
 * Now, Node hasOne Event. Dependent so deletes work.
 */
    Croogo::hookModelProperty('Node', 'hasOne', array('Event' => array(
        'className' => 'Event.Event',
        'foreignKey' => 'node_id',
        'dependent' => true,
    )));

/**
 * Helper
 *
 * Adjust output values prior to display.
 */
    Croogo::hookHelper('Nodes', 'Event.Event');

/**
 * Admin tab
 *
 * When adding/editing Content (Nodes),
 * an extra tab with title 'Event' will be shown with markup generated
 * from the plugin's admin_tab_node element.
 */
    Croogo::hookAdminTab('Nodes/admin_add', 'Event', 'event.admin_tab_node_add', array('type'=>array('event')));
    Croogo::hookAdminTab('Nodes/admin_edit', 'Event', 'event.admin_tab_node', array('type'=>array('event')));

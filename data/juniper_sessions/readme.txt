add these lines to config.php

/* custom - add juniper sessions */
$config['graph_types']['device']['junos_cp_sessions']['section']       = 'network';
$config['graph_types']['device']['junos_cp_sessions']['order']         = '0';
$config['graph_types']['device']['junos_cp_sessions']['descr']         = 'junos cp sessions';
$config['graph_types']['device']['junos_flow_sessions']['section']     = 'network';
$config['graph_types']['device']['junos_flow_sessions']['order']       = '0';
$config['graph_types']['device']['junos_flow_sessions']['descr']       = 'junos flow sessions';
$config['graph_types']['device']['junos_sessions_creation']['section'] = 'network';
$config['graph_types']['device']['junos_sessions_creation']['order']   = '0';
$config['graph_types']['device']['junos_sessions_creation']['descr']   = 'junos sessions creation';

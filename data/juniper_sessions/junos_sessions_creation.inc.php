<?php

$rrd_filename = rrd_name($device['hostname'], 'junos_sessions_creation');
$ds = 'sessions';
$colour_area = '9999cc';
$colour_line = 'ff0000';
$unit_text = 'junos sessions creation';
require 'includes/html/graphs/generic_simplex.inc.php';

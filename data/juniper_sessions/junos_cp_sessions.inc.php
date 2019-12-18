<?php

$rrd_filename = rrd_name($device['hostname'], 'junos_cp_sessions');
$ds = 'sessions';
$colour_area = '9999cc';
$colour_line = 'ff0000';
$unit_text = 'junos cp sessions';
require 'includes/html/graphs/generic_simplex.inc.php';

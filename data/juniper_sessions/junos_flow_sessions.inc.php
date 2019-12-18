<?php

$files = glob("/opt/librenms/rrd/".$device['hostname']."/junos_flow_sessions-id*.rrd");

foreach ($files as $file) {

    $basename = basename($file, ".rrd");
    preg_match_all("/([0-9]+)$/", $basename, $matches);
    $id = $matches[count($matches) - 1][0];

    $ds['ds']       = 'sessions';
    $ds['descr']    = 'spu '.$id;
    $ds['filename'] = rrd_name($device['hostname'], $basename);
    $rrd_list[]     = $ds;

}

$unit_text = "junos flow sessions";
$colours = 'mixed';

require 'includes/html/graphs/generic_multi.inc.php';

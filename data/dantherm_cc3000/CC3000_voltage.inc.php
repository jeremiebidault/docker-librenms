<?php

// VOLTAGE
if ($device['os'] == 'CC3000') {

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.33.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'voltage', $device, $system_status_oid, 'voltage', 'snmp', 'voltage', '1', '1', NULL, NULL, NULL, NULL, $system_status);

}
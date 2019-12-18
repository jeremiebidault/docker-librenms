<?php

// HUMIDITY
if ($device['os'] == 'CC3000') {

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.14.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'humidity', $device, $system_status_oid, 'humidity', 'snmp', 'humidity', '1', '1', NULL, NULL, NULL, NULL, $system_status);

}
<?php

// PRESSURE
if ($device['os'] == 'CC3000') {

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.16.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'pressure', $device, $system_status_oid, 'atmosphericPressure', 'snmp', 'atmosphericPressure', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.16.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'pressure', $device, $system_status_oid, 'flowPressure', 'snmp', 'flowPressure', '10', '1', NULL, NULL, NULL, NULL, $system_status);

}
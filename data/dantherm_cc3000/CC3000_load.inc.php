<?php

// LOAD
if ($device['os'] == 'CC3000') {

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.10.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'load', $device, $system_status_oid, 'fan1SpeedPercentage', 'snmp', 'fan1SpeedPercentage', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.11.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'load', $device, $system_status_oid, 'fan2SpeedPercentage', 'snmp', 'fan2SpeedPercentage', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.12.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'load', $device, $system_status_oid, 'damper1Position', 'snmp', 'damper1Position', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.13.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'load', $device, $system_status_oid, 'damper2Position', 'snmp', 'damper2Position', '1', '1', NULL, NULL, NULL, NULL, $system_status);

}
<?php

if ($device['os'] == 'CC3000') {

    // Controller On-Board temperature in Degree Celcius
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.1.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'temperature', $device, $system_status_oid, 'onBoardTempr', 'snmp', 'onBoardTempr', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    // Room Sensor or Zone 1 Sensor temperature in Degree Celcius
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.2.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'temperature', $device, $system_status_oid, 'roomTempr', 'snmp', 'roomTempr', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    // Hot Spot Sensor or Zone 2 Sensor temperature in Degree Celcius
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.3.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'temperature', $device, $system_status_oid, 'hotSpotTempr', 'snmp', 'hotSpotTempr', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    // Ambient Sensor 1 or Zone 1 Ambient Sensor. temperature in Degree Celcius
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.4.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'temperature', $device, $system_status_oid, 'outdoor1Tempr', 'snmp', 'outdoor1Tempr', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    // Ambient Sensor 2 or Zone 2 Ambient Sensor. temperature in Degree Celcius
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.5.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'temperature', $device, $system_status_oid, 'outdoor2Tempr', 'snmp', 'outdoor2Tempr', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    // Shelter Temperature. Valid for Single-Zone solution
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.6.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'temperature', $device, $system_status_oid, 'shelterTempr', 'snmp', 'shelterTempr', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    // Cobined minimum Outdoor Temeperature. Valid for Single-Zone solution
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.7.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'temperature', $device, $system_status_oid, 'outdoorCombinedTempr', 'snmp', 'outdoorCombinedTempr', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    // Internal or external DewPoint based on Humidity; in Degree Celcius
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.15.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'temperature', $device, $system_status_oid, 'dewpoint', 'snmp', 'dewpoint', '1', '1', NULL, NULL, NULL, NULL, $system_status);

}
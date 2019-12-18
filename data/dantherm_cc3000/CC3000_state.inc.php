<?php

// STATE
if ($device['os'] == 'CC3000') {

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.18.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'state', $device, $system_status_oid, 'fan1Status', 'snmp', 'fan1Status', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.19.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'state', $device, $system_status_oid, 'fan2Status', 'snmp', 'fan2Status', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.20.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'state', $device, $system_status_oid, 'damper1Status', 'snmp', 'damper1Status', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.21.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'state', $device, $system_status_oid, 'damper2Status', 'snmp', 'damper2Status', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.22.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'state', $device, $system_status_oid, 'aircond1Status', 'snmp', 'aircond1Status', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.23.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'state', $device, $system_status_oid, 'aircond2Status', 'snmp', 'aircond2Status', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.24.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'state', $device, $system_status_oid, 'heaterStatus', 'snmp', 'heaterStatus', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.25.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'state', $device, $system_status_oid, 'shelter1Status', 'snmp', 'shelter1Status', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.26.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'state', $device, $system_status_oid, 'shelter2Status', 'snmp', 'shelter2Status', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.27.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'state', $device, $system_status_oid, 'shelter1Mode', 'snmp', 'shelter1Mode', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.28.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'state', $device, $system_status_oid, 'shelter2Mode', 'snmp', 'shelter2Mode', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.31.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'state', $device, $system_status_oid, 'errorStatus', 'snmp', 'errorStatus', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.32.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'state', $device, $system_status_oid, 'maskedErrorStatus', 'snmp', 'maskedErrorStatus', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.34.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'state', $device, $system_status_oid, 'digitalInputStatus', 'snmp', 'digitalInputStatus', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.35.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'state', $device, $system_status_oid, 'alarmDriveStatus', 'snmp', 'alarmDriveStatus', '1', '1', NULL, NULL, NULL, NULL, $system_status);

}
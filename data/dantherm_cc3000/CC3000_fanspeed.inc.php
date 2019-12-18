<?php

// FANSPEED
if ($device['os'] == 'CC3000') {

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.8.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'fanspeed', $device, $system_status_oid, 'fan1RPM', 'snmp', 'fan1RPM', '1', '1', NULL, NULL, NULL, NULL, $system_status);

    //
    $system_status_oid = '.1.3.6.1.4.1.46651.1.1.9.0';
    $system_status = snmp_get($device, $system_status_oid, "-Oqv");
    discover_sensor($valid['sensor'], 'fanspeed', $device, $system_status_oid, 'fan2RPM', 'snmp', 'fan2RPM', '1', '1', NULL, NULL, NULL, NULL, $system_status);

}
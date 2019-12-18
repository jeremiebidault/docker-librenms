<?php

if ($device['os'] == 'E1210') {
        for ($i = 1; $i < 17; $i++) {
                $system_status_oid = '.1.3.6.1.4.1.8691.10.1210.10.1.1.4.'.$i;
                $system_status = snmp_get($device, $system_status_oid, "-Oqv");
                discover_sensor($valid['sensor'], 'state', $device, $system_status_oid, 'digitalInput'.$i, 'snmp', 'digital input '.$i, '1', '1', NULL, NULL, NULL, NULL, $system_status);
        }
}
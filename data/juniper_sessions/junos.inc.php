<?php

use LibreNMS\RRD\RrdDefinition;

$oid_list = 'jnxJsSPUMonitoringCurrentFlowSession.0';
$srx_sess_data = snmp_get_multi($device, $oid_list, '-OUQs', 'JUNIPER-SRX5000-SPU-MONITORING-MIB');

if (is_numeric($srx_sess_data[0]['jnxJsSPUMonitoringCurrentFlowSession'])) {
    $tags = array(
        'rrd_def' => RrdDefinition::make()->addDataset('spu_flow_sessions', 'GAUGE', 0),
    );
    $fields = array(
        'spu_flow_sessions' => $srx_sess_data[0]['jnxJsSPUMonitoringCurrentFlowSession'],
    );

    data_update($device, 'junos_jsrx_spu_sessions', $tags, $fields);

    $graphs['junos_jsrx_spu_sessions'] = true;
    echo ' Flow Sessions';
    unset($srx_sess_data);
}

$version = snmp_get($device, 'jnxVirtualChassisMemberSWVersion.0', '-Oqv', 'JUNIPER-VIRTUALCHASSIS-MIB');
if (empty($version)) {
    preg_match('/kernel JUNOS (\S+),/', $device['sysDescr'], $jun_ver);
    $version = $jun_ver[1];
}
if (empty($version)) {
    preg_match('/\[(.+)\]/', snmp_get($device, '.1.3.6.1.2.1.25.6.3.1.2.2', '-Oqv', 'HOST-RESOURCES-MIB'), $jun_ver);
    $version = $jun_ver[1];
}

if (strpos($device['sysDescr'], 'olive')) {
    $hardware = 'Olive';
    $serial   = '';
} else {
    $boxDescr = snmp_get($device, 'jnxBoxDescr.0', '-Oqv', 'JUNIPER-MIB');
    if (!empty($boxDescr) && $boxDescr != "Juniper Virtual Chassis Switch") {
        $hardware = $boxDescr;
    } else {
        $hardware = snmp_translate($device['sysObjectID'], 'Juniper-Products-MIB:JUNIPER-CHASSIS-DEFINES-MIB', 'junos');
        $hardware = 'Juniper '.rewrite_junos_hardware($hardware);
    }
    $serial   = snmp_get($device, '.1.3.6.1.4.1.2636.3.1.3.0', '-OQv', '+JUNIPER-MIB', 'junos');
}

$features       = '';

/* custom */
$data = snmp_get($device, ".1.3.6.1.4.1.2636.3.39.1.12.1.2.0", "-Oqv");
if (is_numeric($data)) {
    $tags = array(
        'rrd_def' => RrdDefinition::make()->addDataset('sessions', 'GAUGE', 0),
    );
    $fields = array(
        'sessions' => $data,
    );
    data_update($device, 'junos_cp_sessions', $tags, $fields);
    $graphs['junos_cp_sessions'] = true;
    echo ' junos cp sessions';
    unset($cp_sess_data);
}

$data = snmpwalk_array_num($device, ".1.3.6.1.4.1.2636.3.39.1.12.1.1.1.6");
foreach ($data["1.3.6.1.4.1.2636.3.39.1.12.1.1.1.6"] as $k => $v) {
    if (is_numeric($v)) {
        $tags = array(
            'rrd_def' => RrdDefinition::make()->addDataset('sessions', 'GAUGE', 0),
        );
        $fields = array(
            'sessions' => $v,
        );
        data_update($device, 'junos_flow_sessions-id'.$k, $tags, $fields);
        $graphs['junos_flow_sessions'] = true;
        echo ' junos flow sessions';
    }
}
unset($data);

$data = snmp_get($device, ".1.3.6.1.4.1.2636.3.39.1.12.1.4.1.5.0", "-Oqv");
if (is_numeric($data)) {
    $tags = array(
        'rrd_def' => RrdDefinition::make()->addDataset('sessions', 'GAUGE', 0), // "sessions" is the field name used to store data in the RRD file
    );
    $fields = array(
        'sessions' => $data, // "sessions" is the field name used to store data in the RRD file
    );
    data_update($device, 'junos_sessions_creation', $tags, $fields); // "junos_cp_sessions" is the RRD file name
    $graphs['junos_sessions_creation'] = true; // "junos_sessions_creation" is the file name used to generate graph
    echo ' junos sessions creation';
    unset($data);
}
/* custom */

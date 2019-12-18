#!/bin/bash

# create destinations folders if needed
mkdir -p /opt/librenms/includes/html/graphs/device/
mkdir -p /opt/librenms/includes/polling/os/

# junos.inc.php
if test -f "/opt/librenms/includes/polling/os/junos.inc.php"; then
    mv /opt/librenms/includes/polling/os/junos.inc.php /opt/librenms/includes/polling/os/junos.inc.php.default
    echo "/opt/librenms/includes/polling/os/junos.inc.php exist, renamed to /opt/librenms/includes/polling/os/junos.inc.php.default"
fi
cp ./junos.inc.php /opt/librenms/includes/polling/os/junos.inc.php
if test -f "/opt/librenms/includes/polling/os/junos.inc.php"; then echo "junos.inc.php uploaded"; fi

# junos_sessions_creation.inc.php
if test -f "/opt/librenms/includes/html/graphs/device/junos_sessions_creation.inc.php"; then
    mv /opt/librenms/includes/html/graphs/device/junos_sessions_creation.inc.php /opt/librenms/includes/html/graphs/device/junos_sessions_creation.inc.php.default
    echo "/opt/librenms/includes/html/graphs/device/junos_sessions_creation.inc.php exist, renamed to /opt/librenms/includes/html/graphs/device/junos_sessions_creation.inc.php.default"
fi
cp ./junos_sessions_creation.inc.php /opt/librenms/includes/html/graphs/device/junos_sessions_creation.inc.php
if test -f "/opt/librenms/includes/html/graphs/device/junos_sessions_creation.inc.php"; then echo "junos_sessions_creation.inc.php uploaded"; fi

# junos_cp_sessions
if test -f "/opt/librenms/includes/html/graphs/device/junos_cp_sessions.inc.php"; then
    mv /opt/librenms/includes/html/graphs/device/junos_cp_sessions.inc.php /opt/librenms/includes/html/graphs/device/junos_cp_sessions.inc.php.default
    echo "/opt/librenms/includes/html/graphs/device/junos_cp_sessions.inc.php exist, renamed to /opt/librenms/includes/html/graphs/device/junos_cp_sessions.inc.php.default"
fi
cp ./junos_cp_sessions.inc.php /opt/librenms/includes/html/graphs/device/junos_cp_sessions.inc.php
if test -f "/opt/librenms/includes/html/graphs/device/junos_cp_sessions.inc.php"; then echo "junos_cp_sessions uploaded"; fi

# junos_flow_sessions
if test -f "/opt/librenms/includes/html/graphs/device/junos_flow_sessions.inc.php"; then
    mv /opt/librenms/includes/html/graphs/device/junos_flow_sessions.inc.php /opt/librenms/includes/html/graphs/device/junos_flow_sessions.inc.php.default
    echo "/opt/librenms/includes/html/graphs/device/junos_flow_sessions.inc.php exist, renamed to /opt/librenms/includes/html/graphs/device/junos_flow_sessions.inc.php.default"
fi
cp ./junos_flow_sessions.inc.php /opt/librenms/includes/html/graphs/device/junos_flow_sessions.inc.php
if test -f "/opt/librenms/includes/html/graphs/device/junos_flow_sessions.inc.php"; then echo "junos_flow_sessions uploaded"; fi

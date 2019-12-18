#!/bin/bash

# create destination folders if needed
mkdir -p /opt/librenms/includes/definitions
mkdir -p /opt/librenms/includes/discovery/sensors/load
mkdir -p /opt/librenms/includes/discovery/sensors/fanspeed
mkdir -p /opt/librenms/includes/discovery/sensors/humidity
mkdir -p /opt/librenms/includes/discovery/sensors/pressure
mkdir -p /opt/librenms/includes/discovery/sensors/state
mkdir -p /opt/librenms/includes/discovery/sensors/temperature
mkdir -p /opt/librenms/includes/discovery/sensors/voltage

# yaml file
cp ./CC3000_definition.yaml /opt/librenms/includes/definitions/CC3000.yaml
if test -f "/opt/librenms/includes/definitions/CC3000.yaml"; then echo "definitions uploaded"; fi

# load data
cp ./CC3000_load.inc.php /opt/librenms/includes/discovery/sensors/load/CC3000.inc.php
if test -f "/opt/librenms/includes/discovery/sensors/load/CC3000.inc.php"; then echo "load uploaded"; fi

# fanspeed data
cp ./CC3000_fanspeed.inc.php /opt/librenms/includes/discovery/sensors/fanspeed/CC3000.inc.php
if test -f "/opt/librenms/includes/discovery/sensors/fanspeed/CC3000.inc.php"; then echo "fanspeed uploaded"; fi

# humidity data
cp ./CC3000_humidity.inc.php /opt/librenms/includes/discovery/sensors/humidity/CC3000.inc.php
if test -f "/opt/librenms/includes/discovery/sensors/humidity/CC3000.inc.php"; then echo "humidity uploaded"; fi

# pressure data
cp ./CC3000_pressure.inc.php /opt/librenms/includes/discovery/sensors/pressure/CC3000.inc.php
if test -f "/opt/librenms/includes/discovery/sensors/pressure/CC3000.inc.php"; then echo "pressure uploaded"; fi

# sensors data
cp ./CC3000_state.inc.php /opt/librenms/includes/discovery/sensors/state/CC3000.inc.php
if test -f "/opt/librenms/includes/discovery/sensors/state/CC3000.inc.php"; then echo "state uploaded"; fi

# temperature data
cp ./CC3000_temperature.inc.php /opt/librenms/includes/discovery/sensors/temperature/CC3000.inc.php
if test -f "/opt/librenms/includes/discovery/sensors/temperature/CC3000.inc.php"; then echo "temperature uploaded"; fi

# voltage data
cp ./CC3000_voltage.inc.php /opt/librenms/includes/discovery/sensors/voltage/CC3000.inc.php
if test -f "/opt/librenms/includes/discovery/sensors/voltage/CC3000.inc.php"; then echo "voltage uploaded"; fi

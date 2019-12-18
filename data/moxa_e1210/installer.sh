#!/bin/bash

# create folders if needed
mkdir -p /opt/librenms/includes/definitions
mkdir -p /opt/librenms/includes/discovery/sensors/state

# yaml file
cp ./E1210_definition.yaml /opt/librenms/includes/definitions/E1210.yaml
if test -f "/opt/librenms/includes/definitions/E1210.yaml"; then echo "definitions uploaded"; fi

# sensors data
cp ./E1210_state.inc.php /opt/librenms/includes/discovery/sensors/state/E1210.inc.php
if test -f "/opt/librenms/includes/discovery/sensors/state/E1210.inc.php"; then echo "load uploaded"; fi
<?php
## Have a look in defaults.inc.php for examples of settings you can set here. DO NOT EDIT defaults.inc.php!

### Database config
$config['db_host'] = 'mysql';
$config['db_port'] = '3306';
$config['db_user'] = 'librenms';
$config['db_pass'] = 'passwd';
$config['db_name'] = 'librenms';
$config['db_socket'] = '';

// This is the user LibreNMS will run as
//Please ensure this user is created and has the correct permissions to your install
$config['user'] = 'librenms';

### This should *only* be set if you want to *force* a particular hostname/port
### It will prevent the web interface being usable form any other hostname
$config['base_url']        = "/";

### Enable this to use rrdcached. Be sure rrd_dir is within the rrdcached dir
### and that your web server has permission to talk to rrdcached.
#$config['rrdcached']    = "unix:/var/run/rrdcached.sock";

### Default community
$config['snmp']['community'] = array("public");

### Authentication Model
$config['auth_mechanism'] = "mysql"; # default, other options: ldap, http-auth
#$config['http_auth_guest'] = "guest"; # remember to configure this user if you use http-auth

### List of RFC1918 networks to allow scanning-based discovery
#$config['nets'][] = "10.0.0.0/8";
#$config['nets'][] = "172.16.0.0/12";
#$config['nets'][] = "192.168.0.0/16";

# Update configuration
#$config['update_channel'] = 'release';  # uncomment to follow the monthly release channel
$config['update'] = 0;  # uncomment to completely disable updates

# custom misc
$config['enable_billing'] = 1; # Enable Billing
$config['title_image'] = "images/custom/logo.png";
$config['allow_duplicate_sysName'] = true;
$config['enable_syslog'] = 1;
$config['snmptraps']['eventlog'] = 'all';
$config['show_services'] = 1;

# custom collect
#$config['fping_options']['timeout']  = 2000;
#$config['fping_options']['count']    = 3;
#$config['fping_options']['interval'] = 500;
#$config['snmp']['timeout']          = 10;
#$config['snmp']['retries']          = 3;
#$config['snmp']['exec_timeout']     = 800;

# custom graph
$config['graph_types']['device']['junos_cp_sessions']['section']       = 'network';
$config['graph_types']['device']['junos_cp_sessions']['order']         = '0';
$config['graph_types']['device']['junos_cp_sessions']['descr']         = 'junos cp sessions';
$config['graph_types']['device']['junos_flow_sessions']['section']     = 'network';
$config['graph_types']['device']['junos_flow_sessions']['order']       = '0';
$config['graph_types']['device']['junos_flow_sessions']['descr']       = 'junos flow sessions';
$config['graph_types']['device']['junos_sessions_creation']['section'] = 'network';
$config['graph_types']['device']['junos_sessions_creation']['order']   = '0';
$config['graph_types']['device']['junos_sessions_creation']['descr']   = 'junos sessions creation';

# custom alert macros
$config['alert']['macros']['rule']['time_08_to_18'] = 'NOW() BETWEEN DATE_FORMAT(NOW(), "%Y-%m-%d 08:00") AND DATE_FORMAT(NOW(), "%Y-%m-%d 18:00")';
$config['alert']['macros']['rule']['time_08_to_22'] = 'NOW() BETWEEN DATE_FORMAT(NOW(), "%Y-%m-%d 08:00") AND DATE_FORMAT(NOW(), "%Y-%m-%d 22:00")';
$config['alert']['macros']['rule']['time_08_to_23'] = 'NOW() BETWEEN DATE_FORMAT(NOW(), "%Y-%m-%d 08:00") AND DATE_FORMAT(NOW(), "%Y-%m-%d 23:00")';
$config['alert']['macros']['rule']['time_18_to_22'] = 'NOW() BETWEEN DATE_FORMAT(NOW(), "%Y-%m-%d 18:00") AND DATE_FORMAT(NOW(), "%Y-%m-%d 22:00")';
$config['alert']['macros']['rule']['time_17_to_23'] = 'NOW() BETWEEN DATE_FORMAT(NOW(), "%Y-%m-%d 17:00") AND DATE_FORMAT(NOW(), "%Y-%m-%d 23:00")';
$config['alert']['macros']['rule']['time_10_to_22'] = 'NOW() BETWEEN DATE_FORMAT(NOW(), "%Y-%m-%d 10:00") AND DATE_FORMAT(NOW(), "%Y-%m-%d 22:00")';
$config['alert']['macros']['rule']['time_10_to_23'] = 'NOW() BETWEEN DATE_FORMAT(NOW(), "%Y-%m-%d 10:00") AND DATE_FORMAT(NOW(), "%Y-%m-%d 23:00")';
$config['alert']['macros']['rule']['time_11_to_22'] = 'NOW() BETWEEN DATE_FORMAT(NOW(), "%Y-%m-%d 11:00") AND DATE_FORMAT(NOW(), "%Y-%m-%d 22:00")';
$config['alert']['macros']['rule']['time_11_to_23'] = 'NOW() BETWEEN DATE_FORMAT(NOW(), "%Y-%m-%d 11:00") AND DATE_FORMAT(NOW(), "%Y-%m-%d 23:00")';
$config['alert']['macros']['rule']['time_15_to_23'] = 'NOW() BETWEEN DATE_FORMAT(NOW(), "%Y-%m-%d 15:00") AND DATE_FORMAT(NOW(), "%Y-%m-%d 23:00")';
$config['alert']['macros']['rule']['time_09_to_00'] = 'NOW() NOT BETWEEN DATE_FORMAT(NOW(), "%Y-%m-%d 00:00") AND DATE_FORMAT(NOW(), "%Y-%m-%d 09:00")';
$config['alert']['macros']['rule']['time_15_to_00'] = 'NOW() NOT BETWEEN DATE_FORMAT(NOW(), "%Y-%m-%d 00:00") AND DATE_FORMAT(NOW(), "%Y-%m-%d 15:00")';
$config['alert']['macros']['rule']['time_12_to_00'] = 'NOW() NOT BETWEEN DATE_FORMAT(NOW(), "%Y-%m-%d 00:00") AND DATE_FORMAT(NOW(), "%Y-%m-%d 12:00")';
$config['alert']['macros']['rule']['time_10_to_01'] = 'NOW() NOT BETWEEN DATE_FORMAT(NOW(), "%Y-%m-%d 01:00") AND DATE_FORMAT(NOW(), "%Y-%m-%d 10:00")';
$config['alert']['macros']['rule']['time_18_to_00'] = 'NOW() NOT BETWEEN DATE_FORMAT(NOW(), "%Y-%m-%d 00:00") AND DATE_FORMAT(NOW(), "%Y-%m-%d 18:00")';
$config['alert']['macros']['rule']['time_19_to_01'] = 'NOW() NOT BETWEEN DATE_FORMAT(NOW(), "%Y-%m-%d 01:00") AND DATE_FORMAT(NOW(), "%Y-%m-%d 19:00")';
$config['alert']['macros']['rule']['time_08_to_02'] = 'NOW() NOT BETWEEN DATE_FORMAT(NOW(), "%Y-%m-%d 02:00") AND DATE_FORMAT(NOW(), "%Y-%m-%d 08:00")';
$config['alert']['macros']['rule']['time_08_to_01'] = 'NOW() NOT BETWEEN DATE_FORMAT(NOW(), "%Y-%m-%d 01:00") AND DATE_FORMAT(NOW(), "%Y-%m-%d 08:00")';
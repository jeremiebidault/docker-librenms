#!/bin/bash

set -e

if [ "$1" = "librenms" ]; then

    if [ ! -z $TZ ]; then
        echo -e "set timezone..."
        ln -sf /usr/share/zoneinfo/$TZ /etc/localtime
        sed -i -e "s|date\.timezone =.*|date.timezone = \"$TZ\"|" /etc/php/7.2/fpm/php.ini
        sed -i -e "s|date\.timezone =.*|date.timezone = \"$TZ\"|" /etc/php/7.2/cli/php.ini
    fi
    echo -e "set db credentials..."
    if [ ! -z $DB_HOST ]; then sed -ie "s|\$config\['db_host'\] =.*|\$config['db_host'] = '$DB_HOST';|" config.php; fi
    if [ ! -z $DB_USER ]; then sed -ie "s|\$config\['db_user'\] =.*|\$config['db_user'] = '$DB_USER';|" config.php; fi
    if [ ! -z $DB_PASS ]; then sed -ie "s|\$config\['db_pass'\] =.*|\$config['db_pass'] = '$DB_PASS';|" config.php; fi
    if [ ! -z $DB_NAME ]; then sed -ie "s|\$config\['db_name'\] =.*|\$config['db_name'] = '$DB_NAME';|" config.php; fi

    echo -e "start cron..."
    service cron start
    echo -e "start php..."
    service php7.2-fpm start
    echo -e "start snmpd..."
    service snmpd start
    echo -e "start rsyslog..."
    service rsyslog start
    echo -e "start snmptrapd..."
    service snmptrapd start

    if [ ! -z $INIT_LIBRENMS ] && [ $INIT_LIBRENMS == "true" ]; then
        echo -e "set librenms folder ownership..."
        chown -R librenms:librenms /opt/librenms
        echo -e "set librenms folder permissions..."
        chmod 770 /opt/librenms
        echo -e "set librenms folder acl permissions..."
        setfacl -d -m g::rwx /opt/librenms/rrd /opt/librenms/logs /opt/librenms/bootstrap/cache/ /opt/librenms/storage/
        setfacl -R -m g::rwx /opt/librenms/rrd /opt/librenms/logs /opt/librenms/bootstrap/cache/ /opt/librenms/storage/

        echo -e "create librenms db schema..."
        /opt/librenms/build-base.php
        echo -e "create librenms admin..."
        /opt/librenms/adduser.php admin admin 10 example@domain.tld

        echo -e "set weathermap folder ownership..."
        chown -R librenms:librenms /opt/librenms/html/plugins/Weathermap/
        echo -e "set weathermap folder permissions..."
        chmod 775 /opt/librenms/html/plugins/Weathermap/configs

        echo "correct configs folder ownership..."
        chown -R www-data:www-data /opt/librenms/html/plugins/Weathermap/configs/
    fi

    echo -e "start nginx..."
    nginx -g "daemon off;"

fi

exec "@"
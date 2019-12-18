FROM ubuntu:bionic

RUN ln -sf /usr/share/zoneinfo/UTC /etc/localtime && \
    apt-get -y update && \
    apt-get -y upgrade

RUN apt-get -y install software-properties-common && \
    add-apt-repository universe && \
    apt-get -y update && \
    apt-get -y install curl \
                       composer \
                       fping \
                       git \
                       graphviz \
                       imagemagick \
                       mariadb-client \
                       mariadb-server \
                       mtr-tiny \
                       nginx-full \
                       nmap \
                       php7.2-cli \
                       php7.2-curl \
                       php7.2-fpm \
                       php7.2-gd \
                       php7.2-json \
                       php7.2-mbstring \
                       php7.2-mysql \
                       php7.2-snmp \
                       php7.2-xml \
                       php7.2-zip \
                       python-memcache \
                       python-mysqldb \
                       rrdtool \
                       snmp \
                       snmpd \
                       whois \
                       acl \
                       sudo \
                       wget \
                       php-pear && \
    useradd librenms -d /opt/librenms -M -r && \
    usermod -a -G librenms www-data && \
    cd /opt && \
    git clone https://github.com/librenms/librenms.git --branch 1.57 --single-branch && \
    chown -R librenms:librenms /opt/librenms && \
    chmod 770 /opt/librenms && \
    setfacl -d -m g::rwx /opt/librenms/rrd /opt/librenms/logs /opt/librenms/bootstrap/cache/ /opt/librenms/storage/ && \
    setfacl -R -m g::rwx /opt/librenms/rrd /opt/librenms/logs /opt/librenms/bootstrap/cache/ /opt/librenms/storage/ && \
    /opt/librenms/scripts/composer_wrapper.php install --no-dev && \
    sed -i -e "s|;date\.timezone =.*|date.timezone = \"UTC\"|" /etc/php/7.2/fpm/php.ini && \
    sed -i -e "s|;date\.timezone =.*|date.timezone = \"UTC\"|" /etc/php/7.2/cli/php.ini && \
    rm /etc/nginx/sites-enabled/default && \
    cp /opt/librenms/snmpd.conf.example /etc/snmp/snmpd.conf && \
    sed -i -e "s|RANDOMSTRINGGOESHERE|public|" /etc/snmp/snmpd.conf && \
    curl -o /usr/bin/distro https://raw.githubusercontent.com/librenms/librenms-agent/master/snmp/distro && \
    chmod +x /usr/bin/distro && \
    cp /opt/librenms/librenms.nonroot.cron /etc/cron.d/librenms && \
    cp /opt/librenms/misc/librenms.logrotate /etc/logrotate.d/librenms && \
    chown -R librenms:librenms /opt/librenms

RUN cd /opt/librenms/html/plugins && \
    git clone https://github.com/librenms-plugins/Weathermap.git && \
    chown -R librenms:librenms Weathermap/ && \
    chmod 775 /opt/librenms/html/plugins/Weathermap/configs && \
    echo "*/5 * * * * librenms /opt/librenms/html/plugins/Weathermap/map-poller.php >> /dev/null 2>&1" >> /etc/cron.d/librenms

RUN apt -y install rsyslog \
                   snmptrapd && \
    sed -ie "s|TRAPDRUN=.*|TRAPDRUN=yes|" /etc/default/snmptrapd

COPY entrypoint.sh /entrypoint.sh
COPY data /data

RUN chmod +x /entrypoint.sh && \
    cp /data/librenms.conf /etc/nginx/conf.d/librenms.conf && \
    cp /data/rsyslog.conf /etc/rsyslog.conf && \
    cp /data/snmpd.conf /etc/snmp/snmpd.conf && \
    cp /data/snmptrapd.conf /etc/snmp/snmptrapd.conf && \
    cp /opt/librenms/config.php.default /opt/librenms/config.php && \
    mkdir -p /opt/librenms/html/images/custom && \
    cp /data/logo.png /opt/librenms/html/images/custom/logo.png && \
    chown -R librenms:librenms /opt/librenms/html/images/custom && \
    cd /data/dantherm_cc3000 && chown librenms:librenms ./* && chmod +x installer.sh && ./installer.sh && \
    cd /data/juniper_sessions && chown librenms:librenms ./* && chmod +x installer.sh && ./installer.sh && \
    cd /data/moxa_e1210 && chown librenms:librenms ./* && chmod +x installer.sh && ./installer.sh && \
    cd /data/ && chown librenms:librenms Dispatcher.php && cp Dispatcher.php /opt/librenms/LibreNMS/Snmptrap/Dispatcher.php

EXPOSE 80

ENTRYPOINT ["/entrypoint.sh"]

CMD ["librenms"]

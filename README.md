# LibreNMS on docker

includes few custom modifications patch for librenms :

* dantherm CC3000
* juniper sessions
* moxa E1210
* trap dispatcher in case no mib is provided

in addition it not just installs librenms, it also includes these packages and pre config for :

* rsyslog + config
* snmpd + config
* snmptrapd + config
* weathermap + config

## build docker image

```
$ docker build -t librenms:1.57-bionic .
```

## docker run way with ipv6 support

build network

```
$ docker network create --driver bridge --subnet=172.200.6.0/24 --ipv6 --subnet=1234:1234:1234:1234::/80 librenms_librenms
```

launch mysql container

```
$ docker run \
--hostname mysql \
--name librenms_mysql \
--restart on-failure \
--network librenms_librenms \
--ip 172.200.6.30 \
--ip6 1234:1234:1234:1234::30 \
-e TZ=Europe/Paris \
-e MYSQL_ROOT_PASSWORD=passwd \
-e MYSQL_DATABASE=librenms \
-e MYSQL_USER=librenms \
-e MYSQL_PASSWORD=passwd \
-v /home/pirate/docker/volumes/librenms_mysql:/var/lib/mysql \
-d hypriot/rpi-mysql
```

launch phpmyadmin container

```
$ docker run \
--hostname phpmyadmin \
--name librenms_phpmyadmin \
--restart on-failure \
--network librenms_librenms \
--ip 172.200.6.31 \
--ip6 1234:1234:1234:1234::31 \
-p 8081:80 \
-e TZ=Europe/Paris \
-e PMA_ARBITRARY=1 \
-d ebspace/armhf-phpmyadmin
```

launch librenms container

```
$ docker run \
--hostname librenms \
--name librenms_librenms \
--restart on-failure \
--network librenms_librenms \
--ip 172.200.6.32 \
--ip6 1234:1234:1234:1234::32 \
-p 8082:80/tcp \
-p 514:514/udp \
-p 162:162/udp \
-e TZ=Europe/Paris \
-e INIT_LIBRENMS=true \
-v /home/pirate/docker/volumes/librenms_librenms/config.php:/opt/librenms/config.php \
-v /home/pirate/docker/volumes/librenms_librenms/hosts:/etc/hosts \
-v /home/pirate/docker/volumes/librenms_librenms/librenms:/etc/cron.d/librenms \
-v /home/pirate/docker/volumes/librenms_librenms/logo.png:/opt/librenms/html/images/custom/logo.png \
-v /home/pirate/docker/volumes/librenms_librenms/rrd:/opt/librenms/rrd \
-v /home/pirate/docker/volumes/librenms_librenms/configs:/opt/librenms/html/plugins/Weathermap/configs \
-v /home/pirate/docker/volumes/librenms_librenms/output:/opt/librenms/html/plugins/Weathermap/output \
-d librenms:1.57-bionic
```

launch front container

```
$ docker run \
--hostname front \
--name librenms_front \
--restart on-failure \
--network librenms_librenms \
--ip 172.200.6.33 \
--ip6 1234:1234:1234:1234::33 \
-p 8103:80 \
-e TZ=Europe/Paris \
-v /home/pirate/docker/volumes/librenms_front/nginx/html:/var/www/html \
-v /home/pirate/docker/volumes/librenms_librenms/rrd:/var/www/rrd \
-d front:0.1-bionic
```

## docker compose way with ipv6 support

build network

```
$ docker network create --driver bridge --subnet=172.200.6.0/24 --ipv6 --subnet=1234:1234:1234:1234::/80 librenms_librenms
```

go to docker-compose path

```
$ cd /path-to-docker-compose/
```

launch all your containers at the same time

```
$ docker-compose up -d
```

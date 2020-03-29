#!/bin/bash
set -e

if ! [[ -d .container/logs/apache ]]; then
    mkdir -p .container/logs/apache
fi

if ! [[ -d .container/logs/mysql ]]; then
    mkdir -p .container/logs/mysql
fi

if ! [[ -d .container/logs/php ]]; then
    mkdir -p .container/logs/php
fi

if ! [[ -d .container/database ]]; then
    mkdir .container/database
fi

docker-compose up --build

docker exec weetest_apache_con chown -R root:www-data /usr/local/apache2/logs
docker exec weetest_php_con chown -R root:www-data /usr/local/etc/logs

echo "Containers successful built"
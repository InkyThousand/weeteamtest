#!/bin/bash
set -e

docker-compose down --volumes
docker rmi weetest_apache_img weetest_php_img
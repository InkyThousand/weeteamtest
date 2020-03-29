#!/usr/bin/env bash
set -e

cd app

composer install --no-scripts

php bin/console doctrine:database:create --if-not-exists

php bin/console doctrine:schema:update --force

php bin/console assets:install
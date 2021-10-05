#!/bin/bash

cd /var/www/oxideshop


vendor/bin/oe-eshop-db_views_generate

vendor/bin/oxid config:import --env=development
vendor/bin/oxid module:fix --all

rm source/tmp/* -Rf

echo
echo --------------------------------
echo Preparation done at `date +"%H:%M:%S"`. ':-)';

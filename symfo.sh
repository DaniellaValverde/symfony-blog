#!/bin/sh

mysql -u $1 -p < coding.sql

cd symfosource
composer install
cd -

php symfosource/bin/console server:start


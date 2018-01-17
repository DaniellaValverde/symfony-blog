#!/bin/sh

mysql -u $1 -p < coding.sql

php symfosource/bin/console server:start


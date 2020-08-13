#!/bin/sh

dockerize -wait tcp://127.0.0.1:3306 -timeout 30s

mysql -u root -psecret -h 127.0.0.1 notes <init.sql

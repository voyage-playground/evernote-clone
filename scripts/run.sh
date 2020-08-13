#!/bin/sh

mysql -u root -psecret -h $DB_HOST notes <init.sql

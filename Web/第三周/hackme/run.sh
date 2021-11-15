#!/bin/bash
service apache2 start
service mysql start
mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root';flush privileges;" -uroot
mysql -e "create database test;use test;create table user_table(username char(50),password char(50)); insert into user_table values('admin','testadmin@123');" -uroot -proot
sleep 36000

#!/bin/bash
service apache2 start
service mysql start
mysql -e "use mysql;update user set password=PASSWORD('root') where User='root';update user set plugin='mysql_native_password';flush privileges;" -uroot
mysql -e "create database ctf;use ctf;create table ctf_user(username varchar(30),password varchar(30));insert into ctf_user values('admin','wdwdwfefewcxfew3qf314dSDA');" -uroot -proot
/bin/bash
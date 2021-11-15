#!/bin/bash

# 修改数据库中的 FLAG
mysql -e "CREATE DATABASE IF NOT EXISTS supersqli;USE supersqli; CREATE TABLE IF NOT EXISTS \`1919810931114514\` (\`flag\` varchar(100) NOT NULL) ENGINE=MyISAM  DEFAULT CHARSET=utf8;INSERT INTO \`1919810931114514\` VALUES ('$FLAG');" -uroot -proot

export FLAG=not_flag
FLAG=not_flag

rm -f /flag.sh

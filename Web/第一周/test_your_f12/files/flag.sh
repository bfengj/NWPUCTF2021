#!/bin/sh

sed -i "s/FLAG_HERE/$FLAG/" /var/www/html/index.php
export FLAG=not_flag
FLAG=not_flag
rm -f /flag.sh

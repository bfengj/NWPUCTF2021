#!/bin/bash

export FLAG=flag{358c8e75-dab9-4d1e-b84c-1fd91fdcb84c}

echo $FLAG > /flag
chmod 744 /flag
export FLAG=no
FLAG=no

rm -f /flag.sh

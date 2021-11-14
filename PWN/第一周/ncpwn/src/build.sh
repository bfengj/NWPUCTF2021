#!/bin/bash
docker rm -f ncpwn
docker build --tag=ncpwn . && \
docker run -p 1000:1337 --restart=on-failure --name=ncpwn --detach ncpwn


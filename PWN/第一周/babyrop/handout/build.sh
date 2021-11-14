#!/bin/bash
docker rm -f babyrop
docker build --tag=babyrop . && \
docker run -p 1000:1337 --restart=on-failure --name=babyrop --detach babyrop


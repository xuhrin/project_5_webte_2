#!/usr/bin/env bash

if [ $1 -eq 1 ]
then
    echo 'Choosing partial'
    cp ./docker/.env.part .env
else
    echo 'Choosing full'
    cp ./docker/.env.full .env
fi

#!/usr/bin/env bash
# run this file from the root directory of the project

echo "STARTING PROJECT SETUP"

# not tested in windows
if [[ "$OSTYPE" == "win32" ]]; then
    echo "Fail. This script cannot run in windows"
else
    CONTAINER_UID=$(id -u)
fi

echo "CONTAINER UID IS $CONTAINER_UID"

#assume project name is directory name
COMPOSER_PROJECT_NAME=${PWD##*/}

echo "COMPOSER PROJECT NAME IS $COMPOSER_PROJECT_NAME"

#clear existing file
echo > .env

# replace data in template
TEMPLATE=$(sed -e "s/1000/$CONTAINER_UID/" -e "s/\template\-project/$COMPOSER_PROJECT_NAME/" .env-dist)

echo "WRITING .env FILE"

#write new content
echo "$TEMPLATE" >> .env

echo ".env file written:"

cat .env

echo "STARTING DOCKER COMPOSE INSTALLATION"

docker-compose up --build

#!/bin/bash -e

# Function https://github.com/mkropat/sh-realpath
# (for poor Mac users)
_canonicalize_dir_path() {
    (cd "$1" 2>/dev/null && pwd -P)
}
_canonicalize_file_path() {
    local dir file
    dir=$(dirname -- "$1")
    file=$(basename -- "$1")
    (cd "$dir" 2>/dev/null && printf '%s/%s\n' "$(pwd -P)" "$file")
}


__DIR__="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
DOCKER_COMPOSE_DIR=$(_canonicalize_dir_path "${__DIR__}"/..)

# Window and mac user should adapt the next line
HOST_FILE=/etc/hosts

cd "$DOCKER_COMPOSE_DIR"

WEB_IP=$(
docker inspect \
     --format='{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' \
    "$(docker-compose ps -q webserver)"
)

# Set the /etc/hosts
if [ ! -f .env ]; then
    echo ".env does not exist, copy it from .env-dist!"
    exit 1
fi
# shellcheck disable=SC1091
. .env

sudo sed -i'' -e "/# web_container_IP - ${COMPOSE_PROJECT_NAME}/d" ${HOST_FILE}
sudo sed -i'' -e "/^.*${DOMAIN}.*\$/d" ${HOST_FILE}
printf "\n# web_container_IP - %s\n" "${COMPOSE_PROJECT_NAME}" | sudo tee -a  ${HOST_FILE} > /dev/null
printf "%s\t%s\n" "${WEB_IP}" "${DOMAIN}" | sudo tee -a ${HOST_FILE} > /dev/null



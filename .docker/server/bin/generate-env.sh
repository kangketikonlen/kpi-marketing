#!/bin/bash

# Check if .env file exists
if [ -f .env ]; then
    echo ".env file already exists. Aborting script."
    exit 0
fi

# Source existing .env
. ../../.env.example

# Creating variables
name=$(echo "$APP_NAME" | tr '[:upper:]' '[:lower:]')

# Create a new .env file
cat >.env <<EOF
APP_NAME=${name}
APP_ENV=production
APP_URL=${DOCKER_APP_URL}
APP_DEBUG=false

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=${name}-database
DB_PORT=3306
DB_DATABASE=${name}
DB_USERNAME=
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=database
SESSION_LIFETIME=120

DOCKER_APP_PORT=${DOCKER_APP_PORT}
DOCKER_DBMS_PORT=${DOCKER_DBMS_PORT}
DOCKER_DATABASE_PORT=${DOCKER_DATABASE_PORT}

DOCKER_DATABASE_HOST=${name}-database
DOCKER_DATABASE_NAME=${name}
DOCKER_DATABASE_USERNAME=
DOCKER_DATABASE_PASSWORD=
DOCKER_IMAGE_VERSION=0.1
TZ=Asia/Jakarta
EOF

echo "New .env file generated with random values."

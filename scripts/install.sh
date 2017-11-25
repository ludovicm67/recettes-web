#!/bin/bash

### REQUIREMENTS: ############################################################
# - php7
# - bash
# - composer (https://getcomposer.org/download/)
# - yarn (https://yarnpkg.com/en/docs/install#linux-tab)
##############################################################################

##############################################################################
# usage: ./scripts/install.sh
#   OR
# usage: ./scripts/install.sh default
#   OR
# usage: ./scripts/install.sh database username password connection host port
##############################################################################

# We copy default conf
cp .env.example .env

# Fill with informations passed in args
if [ "$#" -gt 0 ]; then
  [ -n "$4" ] && db_connection="$4"
  [ -n "$5" ] && db_host="$5"
  [ -n "$6" ] && db_port="$6"
  ([ "$#" -gt 1 ] || ! [ "$1" = "default" ]) && db_database="$1"
  [ -n "$2" ] && db_username="$2"
  [ -n "$3" ] && db_password="$3"
else
# ...or ask user for informations if nothing was specified in args
  read -p   "DB_CONNECTION[mysql]: "    db_connection
  read -p   "DB_HOST[127.0.0.1]: "      db_host
  read -p   "DB_PORT[3306]: "           db_port
  read -p   "DB_DATABASE[homestead]: "  db_database
  read -p   "DB_USERNAME[homestead]: "  db_username
  read -sp  "DB_PASSWORD[secret]: "     db_password
  echo ""
fi

# Fill missing values with default ones
[ -z "$db_connection" ] && db_connection='mysql'
[ -z "$db_host" ]       && db_host='127.0.0.1'
[ -z "$db_port" ]       && db_port='3306'
[ -z "$db_database" ]   && db_database='homestead'
[ -z "$db_username" ]   && db_username='homestead'
[ -z "$db_password" ]   && db_password='secret'

# We edit the .env file with correct parameters
sed -i -E 's/^(DB_CONNECTION=).*/\1'"$db_connection"'/' .env
sed -i -E 's/^(DB_HOST=).*/\1'"$db_host"'/' .env
sed -i -E 's/^(DB_PORT=).*/\1'"$db_port"'/' .env
sed -i -E 's/^(DB_DATABASE=).*/\1'"$db_database"'/' .env
sed -i -E 's/^(DB_USERNAME=).*/\1'"$db_username"'/' .env
sed -i -E 's/^(DB_PASSWORD=).*/\1'"$db_password"'/' .env

echo "All configuration saved in .env file"

# Install dependencies
composer install
yarn && yarn run dev

# Generate secret key and make all migrations (can take a while)
php artisan key:generate
php artisan migrate

echo "Done."

exit 0

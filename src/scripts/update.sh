#!/bin/sh

### REQUIREMENTS: ############################################################
# - php7
# - bash
# - composer (https://getcomposer.org/download/)
##############################################################################

##############################################################################
# usage: ./scripts/update.sh
##############################################################################

# get last version of the project
git pull

# update dependencies
composer install
npm install && npm run production

# make all new migrations (can take a while)
php artisan migrate

echo "Done."

exit 0

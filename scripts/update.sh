#!/bin/sh

### REQUIREMENTS: ############################################################
# - php7
# - bash
# - composer (https://getcomposer.org/download/)
# - yarn (https://yarnpkg.com/en/docs/install#linux-tab)
##############################################################################

##############################################################################
# usage: ./scripts/update.sh
##############################################################################

# get last version of the project
git pull

# update dependencies
composer install
yarn && yarn run dev

# make all new migrations (can take a while)
php artisan migrate

echo "Done."

exit 0

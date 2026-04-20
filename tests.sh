#!/usr/bin/env bash

# Use phpunit-v12.xml if PHP version is 8.3 or higher, otherwise use phpunit.xml.dist
if php -r 'exit(version_compare(PHP_VERSION, "8.3", ">=") ? 0 : 1);'; then
    ./vendor/bin/phpunit -c phpunit-v12.xml "$@"
else
    ./vendor/bin/phpunit "$@"
fi

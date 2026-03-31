#!/bin/bash

# Upgrade all module
php bin/magento setup:upgrade

# Cache flush
php bin/magento cache:flush

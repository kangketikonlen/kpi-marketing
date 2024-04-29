#!/bin/bash
date_format="%d/%m/%y %H:%M:%S"
current_date=$(date +"$date_format")

echo "[$current_date] - Running schedule"
sleep 2
/usr/bin/php /var/www/app/artisan schedule:run >> /dev/null 2>&1

echo "[$current_date] - Schedule done"

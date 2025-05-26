FROM nextcloud:latest

COPY config.php /var/www/html/config/config.php

RUN mkdir -p /var/www/html/data && \
    chown -R www-data:www-data /var/www/html && \
    echo "ServerName localhost" >> /etc/apache2/apache2.conf && \
    echo "# Nextcloud data directory" > /var/www/html/data/.ncdata && \
    chown www-data:www-data /var/www/html/data/.ncdata && \
    chmod 640 /var/www/html/data/.ncdata && \
    chmod -R 770 /var/www/html/data && \
    chmod 640 /var/www/html/config/config.php && \
    chown www-data:www-data /var/www/html/config/config.php

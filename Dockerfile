FROM nextcloud:latest

RUN apt-get update && apt-get install -y \
    default-mysql-client \
    python3-pip \
    python3-venv \
    python3-distutils \
    curl \
 && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN python3 -m pip install --upgrade pip && \
    python3 -m pip install pipx && \
    python3 -m pipx ensurepath && \
    pipx install awscli

ENV PATH="/root/.local/bin:$PATH"

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

FROM wordpress:php8.1-apache

# utilities
RUN apt-get update && \
    apt-get install -y wget unzip git libzip-dev libpng-dev libjpeg-dev && \
    rm -rf /var/lib/apt/lists/*

# Install Xdebug (stable)
ARG XDEBUG_VERSION=3.2.2
RUN wget https://xdebug.org/files/xdebug-${XDEBUG_VERSION}.tgz && \
    tar -xvzf xdebug-${XDEBUG_VERSION}.tgz && \
    cd xdebug-${XDEBUG_VERSION} && \
    phpize && ./configure && make && make install && \
    rm -rf /xdebug-${XDEBUG_VERSION}* && \
    echo "zend_extension=$(php -r 'echo ini_get(\"extension_dir\");')/xdebug.so" > /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.client_host=${XDEBUG_CLIENT_HOST:-host.docker.internal}" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.log=/var/log/xdebug.log" >> /usr/local/etc/php/conf.d/xdebug.ini

# Create log file
RUN mkdir -p /var/log && touch /var/log/xdebug.log && chown www-data:www-data /var/log/xdebug.log

# Composer (dev tooling)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# WP-CLI (optional handy)
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
    chmod +x wp-cli.phar && mv wp-cli.phar /usr/local/bin/wp

WORKDIR /var/www/html

# ensure permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

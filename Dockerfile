FROM php:8.4-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    libpq-dev \
    libicu-dev \
    libxml2-dev \
    libcurl4-openssl-dev \
    libonig-dev \
    zip \
    unzip \
    git \
    nodejs \
    npm
    #composer

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli pdo pdo_mysql pdo_pgsql zip intl xml curl mbstring bcmath exif opcache


# Install Xdebug via pecl
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Set Xdebug configuration
RUN echo "zend_extension=xdebug.so" > /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Enable Apache modules
RUN a2enmod rewrite

# Clean up
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Start Apache
CMD ["apache2-foreground"]
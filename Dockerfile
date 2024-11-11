# Utilizar la imagen base oficial de PHP 8.2 con FPM
FROM php:8.2-fpm

# Actualizar repositorios y paquetes, e instalar las dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    vim \
    libicu-dev \
    libpq-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libjpeg-dev \
    libpng-dev \
    libfreetype6-dev \
    libsqlite3-dev \
    libc-client-dev \
    libkrb5-dev \
    libssl-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    && docker-php-ext-install -j$(nproc) \
        intl \
        pdo \
        pdo_mysql \
        pdo_pgsql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip \
        opcache \
        pdo_sqlite  \
        imap \
        mysqli \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

# Instalar Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar Node.js y npm (Esto permitirá ejecutar npm install, también se puede crear un servicio aparte para esto, pero he preferido incluirlo)
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm

# Configurar y habilitar Xdebug
#COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Establecer el directorio de trabajo
WORKDIR /var/www

# Exponer el puerto para PHP-FPM
EXPOSE 8005

# Comando por defecto para ejecutar PHP-FPM
CMD ["php-fpm"]

# Crear los directorios de almacenamiento y caché necesarios y asignar permisos
RUN mkdir -p /var/www/storage \
    && mkdir -p /var/www/bootstrap/cache \
    && chmod -R 777 /var/www/storage \
    && chmod -R 777 /var/www/bootstrap/cache \
    && chown -R www-data:www-data /var/www/storage \
    && chown -R www-data:www-data /var/www/bootstrap/cache

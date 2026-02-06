FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# 2. Habilitar mod_rewrite do Apache (para rotas do Laravel funcionarem)
RUN a2enmod rewrite

# 3. Definir a pasta de trabalho
WORKDIR /var/www/html

# 4. Copiar tudo do seu projeto para dentro do container
COPY . .

# 5. Instalar Composer (Gerenciador de dependências)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 6. Rodar instalação das dependências do Laravel
RUN composer install --no-interaction --optimize-autoloader

# 7. Dar permissão para o Apache escrever nas pastas de cache/storage
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 8. Expor a porta 80
EXPOSE 80
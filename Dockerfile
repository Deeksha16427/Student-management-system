FROM php:8.1-apache

# Disable conflicting MPMs and enable prefork (required for PHP mod_php)
RUN a2dismod mpm_event mpm_worker \
    && a2enmod mpm_prefork

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Copy project files
COPY . /var/www/html/

# Fix permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]
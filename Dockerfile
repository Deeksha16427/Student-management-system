FROM php:8.2-apache

# Copy all project files to Apache's web root
COPY . /var/www/html/

# Enable Apache mod_rewrite (useful for clean URLs)
RUN a2enmod rewrite

# Install MySQL extension (if your app uses MySQL)
RUN docker-php-ext-install pdo_mysql mysqli

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80
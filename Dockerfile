FROM php:8.1-apache
RUN docker-php-ext-install mysqli
RUN a2enmod rewrite
COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
EXPOSE 8080
CMD sed -i "s/80/8080/g" /etc/apache2/ports.conf /etc/apache2/sites-enabled/000-default.conf && rm -f /etc/apache2/mods-enabled/mpm_event.* && apache2-foreground
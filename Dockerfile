FROM php:8.1-apache

RUN rm -f /etc/apache2/mods-enabled/mpm_event.load \
          /etc/apache2/mods-enabled/mpm_event.conf \
          /etc/apache2/mods-enabled/mpm_worker.load \
          /etc/apache2/mods-enabled/mpm_worker.conf

RUN docker-php-ext-install mysqli && a2enmod rewrite dir mime

RUN echo "Listen 80" >> /etc/apache2/ports.conf

COPY apache2.conf /etc/apache2/apache2.conf
COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]
FROM php:8.1-apache

RUN sed -i 's/^#\(.*mod_rewrite\)/\1/' /etc/apache2/apache2.conf \
    && a2enmod rewrite \
    && sed -i '/^LoadModule mpm_event/d' /etc/apache2/mods-enabled/*.load 2>/dev/null || true \
    && rm -f /etc/apache2/mods-enabled/mpm_event.load \
    && rm -f /etc/apache2/mods-enabled/mpm_event.conf \
    && echo "LoadModule mpm_prefork_module /usr/lib/apache2/modules/mod_mpm_prefork.so" \
       > /etc/apache2/mods-enabled/mpm_prefork.load

RUN docker-php-ext-install mysqli

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]
FROM php:5.6-apache

RUN echo 'Acquire::Check-Valid-Until "false";' > /etc/apt/apt.conf.d/99no-check-valid-until \
    && echo 'deb http://archive.debian.org/debian stretch main' > /etc/apt/sources.list \
    && echo 'deb http://archive.debian.org/debian-security stretch/updates main' >> /etc/apt/sources.list

RUN apt-get update \
    && apt-get install -y --no-install-recommends --allow-unauthenticated libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr --with-freetype-dir=/usr \
    && docker-php-ext-install mysql gd \
    && rm -rf /var/lib/apt/lists/*

COPY php-johncms.ini /usr/local/etc/php/conf.d/99-johncms.ini

RUN a2enmod rewrite \
    && sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/sites-available/000-default.conf \
    && sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

RUN { echo '        php_admin_value display_errors 0'; echo '        php_admin_value log_errors 1'; echo '        php_admin_value error_reporting 22527'; } > /tmp/php-er.txt \
    && sed -i '/AllowOverride All/r /tmp/php-er.txt' /etc/apache2/sites-available/000-default.conf \
    && rm /tmp/php-er.txt

ENV APACHE_DOCUMENT_ROOT=/var/www/html
WORKDIR /var/www/html

COPY . /var/www/html

RUN cp -a /var/www/html/incfiles /opt/johncms-incfiles

RUN mkdir -p /var/www/html/download/arctemp /var/www/html/download/files /var/www/html/download/graftemp \
    /var/www/html/download/screen /var/www/html/files/cache /var/www/html/files/forum/attach \
    /var/www/html/files/library /var/www/html/files/users/album /var/www/html/files/users/avatar \
    /var/www/html/files/users/photo /var/www/html/files/users/pm /var/www/html/gallery/foto \
    /var/www/html/gallery/temp \
    && chmod -R 777 /var/www/html/download/arctemp /var/www/html/download/files /var/www/html/download/graftemp \
    /var/www/html/download/screen /var/www/html/files /var/www/html/gallery/foto /var/www/html/gallery/temp \
    && chmod 777 /var/www/html/incfiles \
    && (chmod 666 /var/www/html/library/java/textfile.txt /var/www/html/library/java/META-INF/MANIFEST.MF 2>/dev/null || true) \
    && chown -R www-data:www-data /var/www/html

COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh
ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]

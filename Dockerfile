FROM composer

RUN apk update
RUN apk add rsync openssh
RUN touch /usr/local/etc/php/conf.d/phar.ini && echo "phar.readonly = Off;" >> /usr/local/etc/php/conf.d/phar.ini

COPY . /app

#RUN cp composer.phar /usr/local/bin/
#WORKDIR /app
#RUN composer phar
#RUN php -i


#ENTRYPOINT ["docker-php-entrypoint"]
#CMD ["/bin/sh"]

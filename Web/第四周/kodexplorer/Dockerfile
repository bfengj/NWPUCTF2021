FROM php:7.3.4-apache
COPY ./build /


RUN chmod +x /readflag&&\
    chown root /readflag&&\
    chmod u+s /readflag&&\
    chmod 700 /flag&&\
    chmod 777 -R /var/www/html && chown -R root:www-data /var/www/html &&\
    mv /html.tar.gz /var/www&&cd /var/www/html&&tar -xzvf ../html.tar.gz 

CMD /run.sh 
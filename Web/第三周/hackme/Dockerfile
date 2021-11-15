FROM 1275178869/base_image_apache_php_mysql:sjx

# 复制文件和目录
COPY ./html/ /var/www/html/
COPY ./run.sh /
COPY ./mysqld.cnf /etc/mysql/mysql.conf.d/mysqld.cnf
COPY ./flag /
COPY ./readflag /
#RUN mv /etc/apt/sources.list /etc/apt/sources.list.bak
#RUN touch /etc/apt/sources.list
RUN rm /var/www/html/index.html


#COPY files/sources.list /etc/apt/sources.list
# 创建文件夹
# 添加权限
RUN chmod +x /readflag&&\
    chown root /readflag&&\
    chmod u+s /readflag&&\
    chmod 644 /etc/mysql/mysql.conf.d/mysqld.cnf&&\
    chmod 700 /flag&&\
    chmod 777 -R /var/www/html && chown -R root:www-data /var/www/html && chmod +x /run.sh 
EXPOSE 80 
CMD /run.sh 
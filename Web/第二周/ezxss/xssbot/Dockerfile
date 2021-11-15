FROM leonsec/xssbot:v1

#WORKDIR /var/xssbot/

# 复制文件和目录
COPY ./xssbot.py /var/xssbot/
COPY ./run.sh /
# RUN sed -i "s@http://deb.debian.org@http://mirrors.aliyun.com@g" /etc/apt/sources.list
# RUN cat /etc/apt/sources.list
# RUN rm -Rf /var/lib/apt/lists/*
# RUN mv /etc/apt/sources.list /etc/apt/sources.list.bak
# RUN  echo "deb https://mirrors.tuna.tsinghua.edu.cn/ubuntu/ bionic main restricted universe multiverse" > /etc/apt/sources.list
# RUN  echo "deb https://mirrors.tuna.tsinghua.edu.cn/ubuntu/ bionic-updates main restricted universe multiverse" > /etc/apt/sources.list
# RUN  echo "deb https://mirrors.tuna.tsinghua.edu.cn/ubuntu/ bionic-backports main restricted universe multiverse" > /etc/apt/sources.list
# RUN  echo "deb https://mirrors.tuna.tsinghua.edu.cn/ubuntu/ bionic-security main restricted universe multiverse" > /etc/apt/sources.list
# 安装requests
RUN apt-get update
RUN apt-get install -y apache2 
# Install python3
RUN apt-get install -y php 
RUN apt-get install -y libapache2-mod-php 
RUN pip install requests && chmod +x /run.sh
COPY ./html/ /var/www/html/
RUN chmod 777 -R /var && chown -R root:www-data /var/www/html && chmod +x /run.sh 
RUN rm /var/www/html/index.html
EXPOSE 80 

# 运行xssbot
CMD  /run.sh 
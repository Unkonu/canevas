#Dockerfile pour apache2 - php8 - symfony
FROM debian:latest

WORKDIR /var/www

RUN apt-get update -y && apt-get upgrade -y

# Install and run apache
RUN apt-get install -y \
  apt-utils \
  dialog \
  vim \
  zip \
  unzip \
  iproute2 \
  wget

RUN apt-get install -y apache2 && apt-get clean

#ENV APACHE_RUN_USER www-data
#ENV APACHE_RUN_GROUP www-data
#ENV APACHE_LOG_DIR /var/log/apache2

# Install php 8 : https://computingforgeeks.com/how-to-install-php-on-debian-linux/
RUN apt-get install -y \
  lsb-release \
  ca-certificates \
  apt-transport-https \
  software-properties-common \
  gnupg2

RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" \
  | tee /etc/apt/sources.list.d/sury-php.list \
  && wget -qO - https://packages.sury.org/php/apt.gpg | apt-key add -

# php 8.1
RUN apt-get update -y \
  && apt-get install -y php8.1 \
  && apt-get install -y \
  php8.1-xml \
  php8.1-mysql \
  php8.1-cli \
  php8.1-common \
  php8.1-fpm \
  php8.1-curl \
  php8.1-zip

# php 7.4
# RUN apt-get update -y \
#   && apt-get install -y php7.4 \
#   && apt-get install -y \
#   php7.4-xml \
#   php7.4-mysql \
#   php7.4-cli \
#   php7.4-common \
#   php7.4-fpm \
#   php7.4-curl \
#   php7.4-zip

# Install composer : https://getcomposer.org/download/
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
  && php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"\
  && php composer-setup.php \
  && php -r "unlink('composer-setup.php');" \
  && mv composer.phar /usr/local/bin/composer

# Installation symfony
RUN echo 'deb [trusted=yes] https://repo.symfony.com/apt/ /' | tee /etc/apt/sources.list.d/symfony-cli.list \
	&& apt update -y \
	&& apt install -y symfony-cli

# Install npm
RUN apt-get install -y \
  npm

# Configuration symfony avec apache2
COPY ./apache_symfony_canevas.conf /etc/apache2/sites-available/
RUN a2ensite apache_symfony_canevas
RUN a2enmod rewrite

# BDD Symfony sur l'ip virtuel du host
# Ajouter bind-adress=172.17.0.% conf mysql et aux utilisateurs
ENV MYSQL_HOSTNAME=172.17.0.1

# Droits accés Utilisateurs / Groupes
RUN useradd unknown --home /home/unknown --create-home --groups www-data --gid www-data --shell /bin/bash

# Ports du container ouverts
EXPOSE 80

#ENTRYPOINT ["/usr/sbin/apache2", "-k", "start"]

# CMD ["/usr/sbin/apache2ctl", "start"]
CMD ["apachectl", "-D",  "FOREGROUND"]
# CMD systemctl enable apache


# https://code.visualstudio.com/docs/containers/overview
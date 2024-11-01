# Usa la imagen oficial de Ubuntu como base
FROM ubuntu:22.04

# Configura la zona horaria para Sudamérica
ENV TZ=America/Sao_Paulo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Agrega el repositorio de Ondřej Surý para PHP 8.2 y actualiza la lista de paquetes
RUN apt-get update && apt-get install -y software-properties-common \
    && add-apt-repository ppa:ondrej/php \
    && apt-get update

# Instala Apache, PHP 8.2 y las extensiones necesarias
RUN apt-get install -y \
    apache2 \
    php8.2 \
    php8.2-cli \
    libapache2-mod-php8.2 \
    php8.2-mysql \
    php8.2-xml \
    php8.2-curl \
    unzip \
    git \
    curl \
    && apt-get clean

# Habilita los módulos de Apache necesarios
RUN a2enmod php8.2
RUN a2enmod rewrite

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configura el directorio de trabajo
WORKDIR /var/www/html

# Copia los archivos de la aplicación al contenedor
COPY . /var/www/html

# Asigna los permisos correctos
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Ejecuta composer install para instalar las dependencias de PHP
RUN if [ -f composer.json ]; then composer install --no-interaction --optimize-autoloader --no-dev; fi

RUN apt-get install nano -y

# Copia el archivo de configuración de Apache y habilítalo
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Actualiza los paquetes
RUN apt-get update && apt-get upgrade -y

# Expone el puerto 8000
EXPOSE 8000

# Comando para iniciar Apache en primer plano
CMD ["apache2ctl", "-D", "FOREGROUND"]

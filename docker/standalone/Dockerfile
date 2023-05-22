FROM ubuntu:22.04

# ARG WWWGROUP=1000
ARG NODE_VERSION=18
ARG PARTIAL=1

WORKDIR /var/www/html

ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update \
    && apt-get install -y gnupg curl ca-certificates zip unzip git libcap2-bin libpng-dev python2 dnsutils librsvg2-bin \
    && curl -sS 'https://keyserver.ubuntu.com/pks/lookup?op=get&search=0x14aa40ec0831756756d7f66c4f4ea0aae5267a6c' | gpg --dearmor | tee /etc/apt/keyrings/ppa_ondrej_php.gpg > /dev/null \
    && echo "deb [signed-by=/etc/apt/keyrings/ppa_ondrej_php.gpg] https://ppa.launchpadcontent.net/ondrej/php/ubuntu jammy main" > /etc/apt/sources.list.d/ppa_ondrej_php.list \
    && apt-get update \
    && apt-get install -y php8.2-cli php8.2-dev \
       php8.2-gd php8.2-imagick \
       php8.2-curl \
       php8.2-imap php8.2-mysql php8.2-mbstring \
       php8.2-xml php8.2-zip php8.2-bcmath php8.2-soap \
       php8.2-intl php8.2-readline \
       php8.2-ldap \
       php8.2-msgpack php8.2-igbinary php8.2-swoole \
       php8.2-pcov php8.2-xdebug \
    && curl -sLS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer \
    && curl -sLS https://deb.nodesource.com/setup_$NODE_VERSION.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm \
    && apt-get update \
    && apt-get install -y mysql-client \
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN setcap "cap_net_bind_service=+ep" /usr/bin/php8.2

# COPY start-container /usr/local/bin/start-container
# COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
# COPY php.ini /etc/php/8.2/cli/conf.d/99-www-data.ini
# RUN chmod +x /usr/local/bin/start-container

RUN git clone --depth=1 https://github.com/xuhrin/project_5_webte_2
WORKDIR /var/www/html/project_5_webte_2
RUN composer install
RUN npm install && npx vite build

RUN if [ $PARTIAL ]; then cp ./docker/standalone/.env.part .env; cp ./docker/standalone/.env.full .env; fi
RUN php artisan key:generate
# RUN php artisan migrate

# RUN groupadd -g 1000 www-data
# RUN useradd -u 1000 -ms /bin/bash -g www-data www-data
RUN chown www-data:www-data -R .

EXPOSE 9000
CMD php artisan migrate && php artisan serve --host=0.0.0.0 --port=9000

# ENTRYPOINT ["start-container"]

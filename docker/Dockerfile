FROM webdevops/php-nginx:8.2-alpine

WORKDIR /app

ARG NODE_VERSION=18

ENV WWWGROUP=1000
ENV WWWUSER=1000


RUN curl -sLS https://deb.nodesource.com/setup_$NODE_VERSION.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm

COPY --chown=${WWWUSER}:${WWWGROUP} . .
RUN cd /app/storage/ \
    && mkdir -p framework/sessions framework/views framework/cache \
    && chmod 777 -R .

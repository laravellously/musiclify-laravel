FROM webdevops/php-nginx:8.2-alpine

WORKDIR /app

ENV WWWGROUP=1000
ENV WWWUSER=1000

COPY --chown=${WWWUSER}:${WWWGROUP} . .
RUN cd /app/storage/ \
    && mkdir -p framework/sessions framework/views framework/cache \
    && chmod 777 -R .

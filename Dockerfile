# Pin WordPress version for reproducible builds
FROM wordpress:6.8.1-php8.2-apache

LABEL org.opencontainers.image.title="fedex-transit" \
      org.opencontainers.image.description="FedEx Transit WordPress site for production deployment" \
      org.opencontainers.image.vendor="FedEx" \
      org.opencontainers.image.source="https://hub.docker.com/r/borix102/fedex-transit"

# Site content (themes, plugins, uploads)
COPY --chown=www-data:www-data wp-content/ /var/www/html/wp-content/

# Docker-aware config (reads credentials from environment variables)
COPY --chown=www-data:www-data wp-config.php /var/www/html/wp-config.php

RUN chown -R www-data:www-data /var/www/html/wp-content \
    && find /var/www/html/wp-content -type d -exec chmod 755 {} \; \
    && find /var/www/html/wp-content -type f -exec chmod 644 {} \;

EXPOSE 80

HEALTHCHECK --interval=30s --timeout=10s --start-period=90s --retries=3 \
  CMD curl -fsS http://127.0.0.1/ > /dev/null || exit 1

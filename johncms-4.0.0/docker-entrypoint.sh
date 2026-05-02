#!/bin/bash
set -e

DB_HOST="${MYSQL_HOST:-db}"
DB_PORT="${MYSQL_PORT:-3306}"
echo "Waiting for MySQL at ${DB_HOST}:${DB_PORT}..."

until php -r "exit(@fsockopen('$DB_HOST', $DB_PORT) ? 0 : 1);" 2>/dev/null; do
  sleep 1
done

echo "MySQL is ready."

if [ ! -f /var/www/html/incfiles/core.php ]; then
  echo "Initializing incfiles (new or empty volume)..."
  cp -a /opt/johncms-incfiles/. /var/www/html/incfiles/
  echo ">>> No db.php yet. Go to http://localhost:${APP_PORT:-8080}/install to run the initial setup."
fi
if [ ! -f /var/www/html/incfiles/db.php ]; then
  echo ">>> No db.php yet. Go to http://localhost:${APP_PORT:-8080}/install to complete the installation."
fi

for d in download/arctemp download/files download/graftemp download/screen \
  files/cache files/forum/attach files/library files/users/album files/users/avatar \
  files/users/photo files/users/pm gallery/foto gallery/temp; do
  mkdir -p "/var/www/html/$d" && chmod 777 "/var/www/html/$d"
done
chmod 777 /var/www/html/incfiles 2>/dev/null || true

exec "$@"

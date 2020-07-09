#! /bin/bash
# GPL 3 or newer

set -x
set -e

server() {
  echo ERROR STATUS DETECTED! Starting apache to be able to diagnose the status. | tee -a source/index.html
  trap "tail -f" EXIT
  apache2-foreground
}

trap server EXIT
umask 000
#running apache with the same uid as the host user so it can read/write files created by the host system
usermod -u ${CONTAINER_UID:-1000} www-data
#the directory that are still belong to the old www-data user id(33) must be updated to the new user id
chown -R www-data /var/www

sed -i "s/^ServerName.*\$/ServerName ${DOMAIN}/g" /etc/apache2/sites-enabled/000-default.conf
if grep ServerName /etc/apache2/apache2.conf;
then
    sed -i "s/^ServerName.*\$/ServerName ${DOMAIN}/g" /etc/apache2/apache2.conf
else
    echo ServerName ${DOMAIN} |tee -a /etc/apache2/apache2.conf > /dev/null
fi

# avoid routing self traffic to hosts network and avoid dns lookups made by apache
# by adding a explicits entry to hosts file
echo 127.0.0.1 ${DOMAIN} >> /etc/hosts

echo AuthType Basic >>source/.htaccess
echo AuthName \"Passwortgeschützter Bereich\" >>source/.htaccess
echo AuthUserFile /var/www/web/.htpasswd >>source/.htaccess
echo Require valid-user >>source/.htaccess

#check if db container is ready
function waitForDB(){
    while ! mysql -h ${MYSQL_HOST} -u ${MYSQL_USER} -p${MYSQL_PASSWORD} ${MYSQL_DATABASE} -e 'SHOW GLOBAL STATUS LIKE "Uptime"' --connect_timeout=2; do sleep 5; echo "DB not ready"; done
    echo 'DB connection ready'
}

cd /var/www/oxideshop

echo "<pre>" > source/index.html
if [ -f "source/index.php" ]
then
    mv source/index.php source/index.php.installing.tmp
fi

echo "allow webserver to write to some directories" | tee -a source/index.html
mkdir -p source/tmp
chmod 777 source/tmp
mkdir -p source/log
chmod 777 source/log
mkdir -p source/dd
chmod 777 source/dd
#the following line is to give access to the dd config file but that do not exists at boot time so commented it out
#chmod o+w source/dd/ddconfig.json

echo "create directory for project specific modules" | tee -a source/index.html
mkdir -p source/modules/oxps
mkdir -p source/modules/custom

echo composer install | tee -a source/index.html
sudo -u www-data composer install

#echo "allow developer to write to some directories" | tee -a source/index.html
#chmod 777 source/modules/oxps
#developers should be able to write and delete things inside the folders
#for high security shops you can remove this to find issues coused by limited access rights early
# chmod -R o+w /var/www/oxideshop/


echo "deleting setup files for security reason (you never know who copies this for a live system, and to avoid warnings in the admin area)"
rm -rf source/Setup/*

if [ -f "source/index.php" ]
then
    mv source/index.php source/index.php.installing.tmp
fi

echo waiting for DB | tee -a source/index.html
waitForDB
echo DB: connection ready | tee -a source/index.html


# bootstrap oxid database/demodata
MYSQL_CHECKDATA=`mysql -h ${MYSQL_HOST} -u ${MYSQL_USER} -p${MYSQL_PASSWORD} ${MYSQL_DATABASE} --skip-column-names -e "SHOW TABLES FROM ${MYSQL_DATABASE} LIKE 'oxconfig';"`
if [ "${MYSQL_CHECKDATA}" = "" ]
then
echo DB: importing | tee -a source/index.html
mysql -u $MYSQL_USER -h db -p$MYSQL_PASSWORD $MYSQL_DATABASE < "/var/www/oxideshop/vendor/oxid-esales/oxideshop-ce/source/Setup/Sql/database_schema.sql"
mysql -u $MYSQL_USER -h db -p$MYSQL_PASSWORD $MYSQL_DATABASE < "/var/www/oxideshop/vendor/oxid-esales/oxideshop-ce/source/Setup/Sql/initial_data.sql"
    echo "DB: database initialized without demodata" |tee -a  source/index.html
fi

#temp disable some checks to make view generation will work
#and console too
sed -i vendor/oxid-esales/oxideshop-unified-namespace-generator/generated/OxidEsales/Eshop/Application/Model/Shop.php -e"s/[{]/{protected function isShopValid(){return true;}/";
mysql -u $MYSQL_USER -h db -p$MYSQL_PASSWORD $MYSQL_DATABASE -e "DELETE FROM oxconfig WHERE oxvarname='sBackTag'";

echo DB: initial data ready, running core migrations | tee -a source/index.html
vendor/bin/oe-eshop-db_migrate migrations:migrate EE
echo "core migration done"

echo DB: core migration done generating views |tee -a source/index.html
vendor/bin/oe-eshop-db_views_generate
echo DB: initial views generated |tee -a source/index.html

echo DB: initial data ready, running project migrations |tee -a source/index.html
vendor/bin/oe-eshop-db_migrate migrations:migrate PR
echo "DB: core migration done" |tee -a source/index.html

echo Views: generating db views |tee -a source/index.html
vendor/bin/oe-eshop-db_views_generate
echo Views: initial views generated|tee -a source/index.html

echo Config: import running |tee -a source/index.html
vendor/bin/oxid config:import --env development
echo "Config: config import done" |tee -a source/index.html

echo Views: regenerating |tee -a source/index.html
php vendor/bin/oe-eshop-db_views_regenerate
echo Views: regenerated |tee -a source/index.html

echo Xdebug for linux |tee -a source/index.html
bash /usr/local/bin/host.sh
echo xdebug.remote_port=${XDEBUG_PORT:-9000} >> /usr/local/etc/php/conf.d/20-xdebug-setting.ini

echo xdebug: setting done |tee -a source/index.html

if [ -f "source/index.php.installing.tmp" ]
then
    mv source/index.php.installing.tmp source/index.php
fi
echo setup done |tee -a source/index.html


apache2-foreground

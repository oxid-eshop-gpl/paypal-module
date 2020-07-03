# template-project

# OXID

This is a shop template based on oxid B2B edition
[OXID E-Commerce Solutions](https://www.oxid-esales.com)


# Local development environment

This is based on docker and docker-compose.

## Automated Setup for Linux and Mac

In the docker-compose directory, run `script/setup.sh` and wait until your container is running.

## Set up env manually

In the docker-compose directory, copy .env-dist to .env, and adapt the
following values:
* CONTAINER_UID: with your current uid (result of `id -u` command)
* OXID_PORT: eg. 8
* SSL_OXID_PORT: eg. 443

*Notes:*
* The `OXID_PORT` and the `SSL_OXID_PORT` should be available on your local machine.


## Launch the docker containers

Then run `docker-compose up --build -d` to (re)build the images and launch them.

*Notes:*
* If you want to see php logs use `docker-compose logs php` (or `docker-compose logs -f php`).

### Windows users only

#### Docker via WSL
Works directly without magic just enter all commands like normal via wsl.
This tutorial works fine if you whant to use this in general
=>  https://nickjanetakis.com/blog/setting-up-docker-for-windows-and-wsl-to-work-flawlessly
Works fine with every kind of docker containers

#### Docker without WSL

The php needs to be installed locally in the system and available for CLI.

run command: `php winInstaller.php`
The installation process is automatic

## See the shop online

The shop is accessible under the url `https://localhost:${SSL_OXID_PORT}`, where
`{SSL_OXID_PORT}` is the port you configured in your `.env` file.

## Use the shop under its own domain

If you configured the `DOMAIN` variable into something different than
`localhost`, you may want your shop to be accessible under the domain name
you choose. 

#### Linux
You need to call the `scripts/update-hosts-file.sh` script.
This will save the ip into the `/etc/hosts` file.

#### Windows
In .env file set up the `WINDOWS_PROXY_IP` variable - just use a random, unused IP address. Then run 
`scripts/update-hosts-windows.bat` as an administrator. This will map IPs and ports in Windows proxy.  

Alternatively, you can manually set up the proxy using the built-in `netsh` tool. See details: 
`https://stackoverflow.com/questions/8652948/using-port-number-in-windows-host-file/36646749#36646749`

## Connect to the containers

On `php` container:
```bash
docker-compose exec php bash

```
On `mysql` container:
```bash
docker-compose exec db bash
```

## View container logs

View the php logs:
```bash
docker-compose logs php
```

View the database log:
```
On `mysql` container:
```bash
docker-compose logs db
```


You can replace `docker-compose logs` by `docker-compose logs -f ` in order
to see new logs (this command does not end).


## View mailhog online
There is a mailhog container. You can access mailhog by going to the
following url: `http://localhost:8025` (or
`http://localhost:${MAILHOG_UI_PORT}` if you use another port)

## Rebuild containers
Sometimes an rebuild is neccessary if containers are broken

```bash
docker-compose build --force-rm --no-cache --pull
```

## Inspiration

-   <https://github.com/OXID-eSales/docker>
-   <https://github.com/OXIDFabian/OXID_Docker_Stackv2>


# Migrations

## Running migrations - CLI

```bash
$ vendor/bin/oe-eshop-db_migrate migrations:migrate
$ vendor/bin/oxid db:update
$ vendor/bin/oxid cache:clear
```
This command will create shop views by current eShop version, edition and configuration. It is a good practice to run it right after migrations command.

## Generate a migration for a single project suite

```bash
$ vendor/bin/oe-eshop-db_migrate migrations:generate
```

This command will generate new migration. Migration class will be generated
to specific directory according MIGRATION_SUITE variable (default: PR).  In
this case it will be generated in `source/migration/project_data/`
directory.

If you want to use `information_schema` table, you will need to add `use
OxidEsales\EshopCommunity\Core\DatabaseProvider;` in the created migration
file and `require_once(__DIR__ . '/../../bootstrap.php');` inside the `up`
function.

All migration query should be called with `$this->addSql($query, $param)`
call from the `up` function.


# Code standard

This project has a custom code style ruleset based on the PSR2 standard for PHP files

# Running several shop in parallel

You can run several instances of your containers on your machine. For
example you can have a instance to develop your ticket, another one to
review branches which are in merge requests and a third one to test the
master branch.

For that you have to checkout the repository in different directories and
create different `.env` file for each one:
* the public ports should be all different
* if you're using shop domain name, those should different too
* at least, the most important, the `COMPOSE_PROJECT_NAME` should also differ


# xDebug setup
1. Build the containers `docker-compose build`
1. Run containers `docker-compose up -d`
1. Add configurations to PHPStorm:
    * Top menu Run > Edit configurations 
    * Add new configuration > remote debugging  
    * Name and the server name should match the ${DOMAIN}
    * Add a server with th ${DOMAIN} name
    * Set the mappings: root should be `/var/www/oxideshop`
    * IDE session key: `PHPSTORM`

## Windows users only
In order to have the IP address automatically set for xdebug in xdebug.ini, you can use the following script. The php needs to be installed locally in the system and available for CLI.

To update the IP and also start all docker containers, run command: `php winInstaller.php`


# Testing

## Unit tests
run tests in php container:

`./vendor/bin/runtests`
 
## Acceptance tests
run tests in php container:

`./vendor/bin/runtests-codeception`
 
optionally, preview tests in real time:

- download and run VNC Viewer: https://www.realvnc.com/en/connect/download/viewer/
- connect to address: localhost:5900
- if asks for a password, type: `secret`
- run tests in php container


# Starting fresh

## Frech database

Beware that your mysql database is persistent between the `docker-compose
up` and `docker-compose down` calls. If you want to make a fresh start, you
can delete your database, when your containers are down, by calling `sudo rm
-rf data/`.


## Fresh packages

If you want to force the reload all php packages, you should run the
following commands from the php container (`docker-compose exec php bash`):
```bash
rm -rf vendor
rm -rf source/modules/b2b/
rm -rf source/modules/ddoe/
rm -rf source/modules/oe/
rm -rf source/modules/oxcom/
rm -rf source/modules/oxps/genericimporter/
rm -rf source/modules/oxps/modulesconfig/
composer install
```


# Adminer
Database tool Adminer can be accessed by going to `localhost:8080` (or
`localhost:${ADMINER_HOST_PORT}`)

# Installing EE Demodata
```bash
vendor/bin/reset-shop
mysql -u $MYSQL_USER -h db -p$MYSQL_PASSWORD $MYSQL_DATABASE < "/var/www/oxideshop/vendor/oxid-esales/oxideshop-ce/source/Setup/Sql/database_schema.sql"
vendor/bin/oe-eshop-db_migrate migrations:migrate CE
vendor/bin/oe-eshop-db_migrate migrations:migrate PE
vendor/bin/oe-eshop-db_migrate migrations:migrate EE
mysql -u $MYSQL_USER -h db -p$MYSQL_PASSWORD $MYSQL_DATABASE < "/var/www/oxideshop/vendor/oxid-esales/oxideshop-demodata-ee/src/demodata.sql"
vendor/bin/oe-eshop-db_views_regenerate
vendor/bin/oxid config:import --env=development
```
and activate the wave theme and visual cms module in admin
#!/bin/bash

if [[ $1 == "" ]]; then
    echo
    echo '  ╔════════════════════════════════════════╗'
    echo '  ║ locally.sh: Local Deployment Helper    ║'
    echo '  ╟──────────────────────────────────────┬─╢'
    echo '  ║ Type: ./deploy/locally.sh help       │▲║'
    echo '  ║ to learn about available commands.   │░║'
    echo '  ║               20210226               │▼║'
    echo '  ╚══════════════════════════════════════╧═╝'
fi

cd /vagrant/deploy/

# Run once. Machines only!
if [[ $1 == "runonce" || $1 == "firstbuild" ]];
  then
    echo
    echo Runonce. Will be launched by the machine on first boot.
    echo Humans, please use "build" or "refresh", unless you know what you"'"re doing

    mkdir -p ~/compiledir/
    chmod -R 777 ~/compiledir/
    chown vagrant:vagrant ~/compiledir/ -R

    sudo rm ~/compiledir/* -rf
fi

if [[ $1 == "init-grunt" ]]; then
  sudo apt install fontforge ttfautohint
  sudo npm install -g grunt-cli@1.3.2 --force

  sudo chmod -R 777 ~/.npm/
  sudo chown vagrant:vagrant ~/.npm/ -R
fi

if [[ $1 == "refresh"  ||  $1 == "resetdb" ]]; then
      echo
      echo '  ╔════════════════════════════════════════╗'
      echo '  ║ This task requires interaction!        ║'
      echo '  ╟──────────────────────────────────────┬─╢'
      echo '  ║ All packages from external sources   │▲║'
      echo '  ║ can be overwritten. Do not overwrite │░║'
      echo '  ║ packages from local repositories!    │▼║'
      echo '  ╚══════════════════════════════════════╧═╝'
      echo
fi

if [[ $1 == "firstbuild" || $1 == "hardreset" ]]; then
    echo Reset-helper
    echo
    echo Clearing caches
    sudo rm ~/compiledir/* -rf

    #  Prepare the OXID eShop using OXID console for fix commands and migrations. This call is supposed to run with a broken module chain.
    ansible-playbook ansible/playbook-oxid-hardreset.yml -i ansible/inventories/hosts.yml -l development
fi

if [[ $1 == "firstbuild" || $1 == "refresh" ]]; then
    echo 'Composer may require user-interaction! Please stand by.'
    ansible-playbook ansible/playbook-build-oxid.yml -i ansible/inventories/hosts.yml -l development

    # Force activation of fcpayone as one of it's core classes is needed by an extension that would be registering when running migrations
    /var/www/oxideshop/vendor/bin/oxid module:activate fcpayone
fi

if [[ $1 == "quick" ]]; then
    ansible-playbook ansible/playbook-build-oxid.yml -i ansible/inventories/hosts.yml -l development --skip-tags "oxiddbmigrations,handlecomposer"
fi

if [[ $1 == "resetdb" ]];
  then
    sudo rm ~/compiledir/* -rf
    echo
    echo Resetting database . . .
    mysql -uroot -poxid -Nse 'show tables' oxid | while read table; do mysql -e "drop table $table" oxid; done
    mysql -uroot -poxid -Nse 'show tables' oxid | while read table; do mysql -e "drop view $table" oxid; done
    echo
    echo Overwriting existing database . . .
    mysql -uroot -poxid oxid < /vagrant/sql/2021-oxid62-sonepar-dev.sql

    cd /var/www/oxideshop/
    vendor/bin/oxid module:activate fcpayone

    # Take off
    bash /vagrant/deploy/locally.sh takeoff
    exit
fi

if [[ $1 == "migrate" || $1 == "takeoff" ]]; then
    sudo rm ~/compiledir/* -rf
    ansible-playbook ansible/playbook-build-oxid.yml -i ansible/inventories/hosts.yml -l development --skip-tags "handlecomposer"
fi

if [[ $1 == "upgrade" ]]; then
    ansible-playbook ansible/playbook-upgrade-oxid.yml -i ansible/inventories/hosts.yml -l development --skip-tags "handlecomposer"
fi

## Help page
if [[ $1 == "help" ]]; then
    echo
    echo Ansible Playbook Launcher for Local Tasks
    echo 'Usage: ./deploy/locally.sh [mode]'
    echo
    echo Options:
    echo
    echo '  firstbuild'
    echo '      Mandatory call before starting work. Watch out for Composer asking questions!'
    echo '  upgrade'
    echo '      Temporarily added upgrade helper option. Still requires manual steps!'
    echo '  takeoff'
    echo '      Re-register modules, migrate the database, import configs. Does not refresh the compilation. Perfect for rapid branch-hopping.'
    echo '      Default fallback action.'
    echo '  quick'
    echo '      Quick deployment, no database updates. No Composer handling.'
    echo '  resetdb'
    echo '      Destroys the existing database and launches a full recovery including migrations. Recommended when trying out new migrations or after data modification.'
    echo '  refresh'
    echo '      Performas a full local deployment: Launch Composer (requires interaction!), re-register modules, migrate the database, import configs.'
    echo '  help'
    echo '      You are already here.'
    echo
    exit
fi


# Fallback
if [[ $1 == "" ]];
  then
    echo
    echo 'No mode selected, assuming TAKEOFF'
    cd /vagrant/
    bash ./deploy/locally.sh takeoff
    exit
fi

echo
echo --------------------------------
echo Preparation done at `date +"%H:%M:%S"`. ':-)';

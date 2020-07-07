
# Local deployment testing - without docker aka the dirty way

In order to test deployment from your own computer, you can run from the root of the project:
```bash
 CI_PROJECT_DIR=`pwd` ANSIBLE_CONFIG=deploy/ansible.cfg ansible-playbook \
    --inventory deploy/ansible/inventories/hosts.ini \
    --verbose --limit integration \
    deploy/ansible/playbook.yml
```

Of course this will work only if:
* you have access to integration (your public key is on integration server)
* ansible is locally available
* `npm` and `grunt` executables are available

*Note*: this will modify `oxideshop/source/.htaccess`

# Local deployment and compiling test in docker

```bash
docker-compose -f docker-compose-ansible.yml run \
               -v $(dirname $SSH_AUTH_SOCK):$(dirname $SSH_AUTH_SOCK) \
               -e SSH_AUTH_SOCK=$SSH_AUTH_SOCK \
               -e CI_PROJECT_DIR=/var/www/ \
               -e npm_config_cache=/var/import/.cache/npm \
               -e COMPOSER_HOME=/var/import/.cache/composer \
               ansibleclient ansible-playbook --inventory=inventories/hosts.ini playbook.yml

```
